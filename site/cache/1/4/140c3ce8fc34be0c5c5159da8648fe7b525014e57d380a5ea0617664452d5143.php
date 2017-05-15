<?php

/* index.html */
class __TwigTemplate_140c3ce8fc34be0c5c5159da8648fe7b525014e57d380a5ea0617664452d5143 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head lang=\"en\">
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["asset_path"]) ? $context["asset_path"] : null), "html", null, true);
        echo "/styles.css\" rel=\"stylesheet\">
    <title>";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</title>
</head>
<body>
";
        // line 12
        echo "<div class=\"wrapper\">
    <section class=\"logo\">

        <a href=\"/\" class=\"logo-link\"><img src=\"";
        // line 15
        echo (isset($context["asset_path"]) ? $context["asset_path"] : null);
        echo "/logo.png\" data-fadein></a>

        <div class=\"hero\" data-fadein>
            <h1 class=\"hero-header\">
                ";
        // line 19
        echo (isset($context["heroHeader"]) ? $context["heroHeader"] : null);
        echo "
                <div class=\"border-bottom\"></div>
            </h1>
            <p class=\"hero-text\" data-fadein>
                ";
        // line 23
        echo (isset($context["heroText"]) ? $context["heroText"] : null);
        echo "
            </p>
        </div>
    </section>
    <section class=\"info\">
        <div class=\"service-action-wrapper\" data-fadein>
            <div class=\"services\">
                <h1>";
        // line 30
        echo (isset($context["servicesHeader"]) ? $context["servicesHeader"] : null);
        echo "</h1>
                <div class=\"columns\">
                    ";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["services"]) ? $context["services"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 33
            echo "                    <p>";
            echo $context["item"];
            echo "</p>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "                </div>
            </div>
            <div class=\"actions\">
                <a class=\"button pure bold block-mobile\" href=\"";
        // line 38
        echo (isset($context["contactButtonLink"]) ? $context["contactButtonLink"] : null);
        echo "\">
                    <span class=\"label\">";
        // line 39
        echo (isset($context["contactButtonText"]) ? $context["contactButtonText"] : null);
        echo "</span>
                    <span class=\"icon icon-arrow\"></span>
                </a>
                <a class=\"button pure bold block-mobile\" href=\"";
        // line 42
        echo (isset($context["brochureButtonLink"]) ? $context["brochureButtonLink"] : null);
        echo "\">
                    <span class=\"label\">";
        // line 43
        echo (isset($context["brochureButtonText"]) ? $context["brochureButtonText"] : null);
        echo "</span>
                    <span class=\"icon icon-brochure\"></span>
                </a>
            </div>
            <div class=\"address\">
                <address>
                    <p>";
        // line 49
        echo (isset($context["addressLine"]) ? $context["addressLine"] : null);
        echo "</p>

                    <p>";
        // line 51
        echo (isset($context["citySt"]) ? $context["citySt"] : null);
        echo "</p>

                    <p>";
        // line 53
        echo (isset($context["phoneNumber"]) ? $context["phoneNumber"] : null);
        echo "</p>
                </address>
            </div>
        </div>
    </section>
</div>
<script src=\"";
        // line 59
        echo (isset($context["asset_path"]) ? $context["asset_path"] : null);
        echo "/script.js\"></script>
</body>
";
        // line 62
        echo "</html>
";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 62,  131 => 59,  122 => 53,  117 => 51,  112 => 49,  103 => 43,  99 => 42,  93 => 39,  89 => 38,  84 => 35,  75 => 33,  71 => 32,  66 => 30,  56 => 23,  49 => 19,  42 => 15,  37 => 12,  31 => 8,  27 => 7,  19 => 1,);
    }
}
