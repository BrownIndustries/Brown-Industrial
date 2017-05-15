<?php

/* edit.html */
class __TwigTemplate_e2183b9214e5d01eea71b2c1db14e4f0a1c5ba3f48e0515afc2bcbb5ec93e522 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("header.html", "edit.html", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "header.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "<div class=\"sidebar\" ng-class=\"{shown:show_sidebar}\">
    <div class=\"inner\" ng-controller=\"formController\">
        <h1 class=\"text-center sidebar-header\">Site Content</h1>
        <button ng-click=\"saveContent()\" class=\"save-action\">Save</button>
        <button class=\"pull-right publish-action\" ng-if=\"canPublish\" type=\"button\" ng-click=\"publishContent()\">
            Publish
        </button>
        <form sf-schema=\"formSchema\" sf-form=\"form\" sf-model=\"formData\" >

        </form>
        <div class=\"credit\">
            Built By <a href=\"http://farmingtonwebdesign.net\" title=\"Farmignton Web Design\">FWD</a>
        </div>
    </div>
</div>
<div class=\"iframed-content\">
    <toast></toast>
    <iframe id=\"iframe-content-page\" src=\"";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["content_url"]) ? $context["content_url"] : null), "html", null, true);
        echo "\" seamless frameborder=\"none\" connectIframe></iframe>
</div>
";
    }

    // line 23
    public function block_script($context, array $blocks = array())
    {
        // line 24
        echo "window.formData = ";
        echo (isset($context["json_content"]) ? $context["json_content"] : null);
        echo ";
window.schema = ";
        // line 25
        echo (isset($context["json_schema"]) ? $context["json_schema"] : null);
        echo ";
";
    }

    public function getTemplateName()
    {
        return "edit.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 25,  61 => 24,  58 => 23,  51 => 20,  32 => 3,  29 => 2,  11 => 1,);
    }
}
