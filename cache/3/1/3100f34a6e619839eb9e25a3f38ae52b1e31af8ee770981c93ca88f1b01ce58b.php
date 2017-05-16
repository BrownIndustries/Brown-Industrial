<?php

/* login.html */
class __TwigTemplate_3100f34a6e619839eb9e25a3f38ae52b1e31af8ee770981c93ca88f1b01ce58b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("header.html", "login.html", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
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

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"container table\">

    <div class=\"login\" ng-controller=\"loginController\">
        <div ng-show=\"token\">You already have a login token. Go ahead and <a
                href=\"/edit?token=";
        // line 8
        echo "{{token}}";
        echo "\">Click Here</a></div>
        <h1>Please Login</h1>
        <toast></toast>
        <div class=\"form\" ng-form=\"loginForm\">
            <div class=\"input-group\">
                <label>
                    User Name:
                </label>
                <input type=\"text\" name=\"username\" ng-model=\"username\" required>
            </div>
            <div class=\"input-group\">
                <label>
                    Password:
                </label>
                <input type=\"password\" name=\"password\" ng-model=\"password\" required>
            </div>
            <div class=\"input-group\">
                <button ng-click=\"login()\" class=\"save-action\">Login & Edit</button>
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 8,  31 => 4,  28 => 3,  11 => 1,);
    }
}
