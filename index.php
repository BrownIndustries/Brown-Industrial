<?php
/**
 * Index- entry point for app.
 */
require __DIR__ . '/vendor/autoload.php';


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppServer\Helpers;
use AppServer\TwigCMS;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

if (Helpers::env('env') == 'dev') {
  ini_set('display_errors', 1);
  define('DEBUG', true);
}

define("PROJECT_ROOT_DIR", __DIR__);
define("TEMPLATE_DIR", __DIR__ . "/" . Helpers::env('site_dir_name', 'site'));
define("TEMPLATE_CACHE_DIR", __DIR__ . "/" . Helpers::env('site_cache_dir_name', 'site/cache'));
define("CONTENT_DIR", __DIR__ . "/" . Helpers::env('content_dir_name', 'content'));

$loader = new Twig_Loader_Filesystem(TEMPLATE_DIR);
$template_engine = new Twig_Environment($loader, array(
  'cache' => TEMPLATE_CACHE_DIR,
  'debug' => defined('DEBUG')
));

$request = Request::createFromGlobals();
$container = new League\Container\Container();
$container->singleton('Symfony\Component\HttpFoundation\Request', $request);
$router = new League\Route\RouteCollection(
  $container
);

//Matchers
$router->addPatternMatcher('editMatcher', '/edit.*');
$router->addPatternMatcher('pageMatcher', '/.*');
//controllers

$router->addRoute("POST", "/action/save", function (Request $request, Response $response, array $args) {
  if (Helpers::token_valid($request->query->get('token', ''))) {
    $request_body = file_get_contents('php://input');
    Helpers::save_content('index', $request_body);
  }
  else {
    $response->setContent('Authentication Failed');
    $response->setStatusCode(401);
  }
  return $response;
});

$router->addRoute("POST", "/action/publish", function (Request $request, Response $response, array $args) {
  if (Helpers::token_valid($request->query->get('token', ''))) {
    Helpers::publish_content('index');
  }
  else {
    $response->setContent('Authentication Failed');
    $response->setStatusCode(401);
  }
  return $response;
});

//Edit Page controller
$router->addRoute("GET", "{uri_route:editMatcher}", function (Request $request, Response $response, array $args) use ($loader, $template_engine) {
  $loader->addPath(PROJECT_ROOT_DIR . "/app/server/templates");
  $template_engine->addExtension(new TwigCMS());
  if (Helpers::token_valid($request->query->get('token', ''))) {
    $template = $template_engine->loadTemplate("edit.html");
    $content_url = Helpers::resolve_edit_url($args['uri_route']) . "?edit=true";
    $content = Helpers::get_content('index', true);
    $schema = Helpers::get_content('schema');
    $json = json_encode($content);
    $rendered = $template->render(array("json_schema" => json_encode($schema), "json_content" => $json, "content" => $content, 'asset_path' => "/app/client", 'content_url' => $content_url));
  }
  else {
    $template = $template_engine->loadTemplate("login.html");
    $rendered = $template->render(array('asset_path' => "/app/client"));
  }
  $response->setContent($rendered);
  return $response;
});

//Display Page controller
$router->addRoute("GET", "{uri_route:pageMatcher}", function (Request $request, Response $response, array $args) use ($template_engine) {
  $url = Helpers::resolve_template($args['uri_route']);
  $template = $template_engine->loadTemplate($url);
  $add_meta = $request->query->get('edit', false);
  $content = Helpers::get_content('index', $add_meta);
  $content = array_merge($content, array('asset_path' => Helpers::env('site_dir_name')));
  $rendered = $template->render($content);
  $response->setContent($rendered);
  return $response;
});


$dispatcher = $router->getDispatcher();
$response = $dispatcher->dispatch($request->getMethod(), $request->getPathInfo());
$response->send();
