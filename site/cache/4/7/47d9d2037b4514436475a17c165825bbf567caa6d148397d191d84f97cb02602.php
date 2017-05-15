<?php

/* header.html */
class __TwigTemplate_47d9d2037b4514436475a17c165825bbf567caa6d148397d191d84f97cb02602 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\" ng-app=\"editor\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>Website Editor</title>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
    <!-- bower:css -->
    <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["asset_path"]) ? $context["asset_path"] : null), "html", null, true);
        echo "/vendor/ngtoast/dist/ngToast.css\" rel='stylesheet' type='text/css'>
    <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["asset_path"]) ? $context["asset_path"] : null), "html", null, true);
        echo "/vendor/ngtoast/dist/ngToast-animations.css\" rel='stylesheet' type='text/css'>
    <!-- endbower -->
    <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["asset_path"]) ? $context["asset_path"] : null), "html", null, true);
        echo "/styles.css\">
</head>
<body>
    ";
        // line 15
        $this->displayBlock('content', $context, $blocks);
        // line 17
        echo "    <!-- bower:js -->
    <script type=\"text/javascript\" src=\"";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["asset_path"]) ? $context["asset_path"] : null), "html", null, true);
        echo "/vendor/tv4/tv4.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 19
        echo twig_escape_filter($this->env, (isset($context["asset_path"]) ? $context["asset_path"] : null), "html", null, true);
        echo "/vendor/objectpath/lib/ObjectPath.js\"></script>
    <script src=\"";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["asset_path"]) ? $context["asset_path"] : null), "html", null, true);
        echo "/vendor/angular/angular.js\"></script>
    <script src=\"";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["asset_path"]) ? $context["asset_path"] : null), "html", null, true);
        echo "/vendor/angular-animate/angular-animate.js\"></script>
    <script src=\"";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["asset_path"]) ? $context["asset_path"] : null), "html", null, true);
        echo "/vendor/angular-sanitize/angular-sanitize.js\"></script>
    <script src=\"";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["asset_path"]) ? $context["asset_path"] : null), "html", null, true);
        echo "/vendor/ngtoast/dist/ngToast.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["asset_path"]) ? $context["asset_path"] : null), "html", null, true);
        echo "/vendor/angular-schema-form/dist/schema-form.min.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["asset_path"]) ? $context["asset_path"] : null), "html", null, true);
        echo "/vendor/angular-schema-form/dist/bootstrap-decorator.min.js\"></script>
    <!-- endbower -->
    <script src=\"https://code.jquery.com/jquery-1.11.2.min.js\" type=\"text/javascript\"></script>
    <script src=\"https://js.authrocket.com/v1/authrocket.js\" type=\"text/javascript\"></script>
    <script>
        AuthRocket.setInstanceUrl(\"https://one-page-cms.e1.loginrocket.com/v1\");
        ";
        // line 31
        $this->displayBlock('script', $context, $blocks);
        // line 33
        echo "    </script>
    <script src=\"";
        // line 34
        echo twig_escape_filter($this->env, (isset($context["asset_path"]) ? $context["asset_path"] : null), "html", null, true);
        echo "/app/index.js\"></script>

</body>
</html>
";
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
        // line 16
        echo "    ";
    }

    // line 31
    public function block_script($context, array $blocks = array())
    {
        // line 32
        echo "        ";
    }

    public function getTemplateName()
    {
        return "header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 32,  109 => 31,  105 => 16,  102 => 15,  93 => 34,  90 => 33,  88 => 31,  79 => 25,  75 => 24,  71 => 23,  67 => 22,  63 => 21,  59 => 20,  55 => 19,  51 => 18,  48 => 17,  46 => 15,  40 => 12,  35 => 10,  31 => 9,  21 => 1,);
    }
}
