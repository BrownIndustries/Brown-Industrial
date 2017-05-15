<?php

namespace AppServer;

use League\Flysystem\FileNotFoundException;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;
use League\Route\Http\Exception;

class Helpers
{

  public static function env($key, $default = null)
  {
    $val = getenv($key);
    return $val ? $val : $default;
  }

  public static function token_valid($jwt)
  {
    try {
      if(empty($jwt)) throw new Exception("Emtpy JWT");
      $decoded = \JWT::decode($jwt, self::env('auth_realm_key'), array('HS256'));
      return $decoded;
    }catch (Exception $e){
      return false;
    }
  }

  public static function get_content($key = 'index', $edit = false)
  {
    $adapter = new Local(CONTENT_DIR);
    $filesystem = new Filesystem($adapter);
    $edit_file = "edit-$key.json";
    $file = "$key.json";

    $file_to_get = $edit ? $edit_file : $file;
    $content_str = '';
    try {
      $content_str = $filesystem->read($file_to_get);
    } catch (FileNotFoundException $e) {
      if ($edit) {
        $filesystem->copy($file, $edit_file);
        $content_str = $filesystem->read($edit_file);
      }
      else {
        throw new FileNotFoundException(CONTENT_DIR . "/" . $file_to_get);
      }
    }
    return json_decode($content_str, true);
  }

  public static function resolve_template($uri)
  {
    if ($uri === '/')
      $url = "index.html";
    else $url = "{$uri}.html";
    return $url;
  }

  public static function resolve_edit_url($uri)
  {
    if ($uri === "/edit")
      $uri = '/';
    else {
      $uri = str_replace('/edit', '', $uri);
    }
    return $uri;
  }

  public static function prepare_content($arr, $add_meta = true)
  {
    $content_loop = function ($old_array, $parent_key = false) use($add_meta, &$content_loop){
      $new_array = [];
      foreach ($old_array as $key => $item) {
        if (is_array($item)) {
          $new_array[$key] = $content_loop($item, $key);
        }
        else {
          if($parent_key)
          $final_key = $parent_key."[".$key."]";
          else
            $final_key = $key;
          $content = $add_meta ? "<meta data-content-key='$final_key'>$item" : $item ;
          $new_array[$final_key] = $content;
        }
      }
      return $new_array;
    };
    $new_array = $content_loop($arr);
    return $new_array;
  }

  public static function save_content($key = 'index', $data)
  {
    return self::convert_json("/edit-$key.json", $data);
  }

  public static function publish_content($key = 'index')
  {
    $adapter = new Local(CONTENT_DIR);
    $filesystem = new Filesystem($adapter);
    $data = $filesystem->read("/edit-$key.json");
    return self::convert_json("/$key.json", $data);
  }

  public static function convert_json($path, $data)
  {
    if(json_decode($data) === NULL ) throw new Exception('Invalid JSON');
    $adapter = new Local(CONTENT_DIR);
    $filesystem = new Filesystem($adapter);
    return $filesystem->put($path, $data);
  }
}
