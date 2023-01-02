<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* menu.twig */
class __TwigTemplate_10951c0e4bfbcdafe65fc732a82fb220 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'main' => [$this, 'block_main'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout.twig", "menu.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <div class=\"sectionCards\">
        <div class=\"rowsC\">
            <div class=\"card\" style=\"width: 18rem;\" id=\"card1\">
                <img class=\"card-img-top\" src=\"img/add2.png\" alt=\"plus symbol\">
                <div class=\"card-body\" id=\"body1\">
                    <a href=\"newEvent.php\" class=\"btn btn-light\">Create a new event</a>
                </div>
            </div>
            <div class=\"card\" style=\"width: 18rem;\" id=\"card1\">
                <img class=\"card-img-top\" src=\"img/overview.png\" alt=\"women who reviews cards\">
                <div class=\"card-body\" id=\"body1\">
                    <a href=\"overview.php\" class=\"btn btn-light\">View your events</a>
                </div>
            </div>
        </div>
        <div class=\"rowsC\">
            <div class=\"card\" style=\"width: 18rem;\" id=\"card1\">
                <img class=\"card-img-top\" src=\"img/profileImg.svg\" alt=\"Card image cap\">
                <div class=\"card-body\" id=\"body1\">
                    <a href=\"#\" class=\"btn btn-light\">Profile</a>
                </div>
            </div>
            <div class=\"card\" style=\"width: 18rem;\" id=\"card1\">
                <img class=\"card-img-top\" src=\"img/logout.png\" alt=\"logout symbol\">
                <div class=\"card-body\" id=\"body1\">
                    <a href=\"logout.php\" class=\"btn btn-light\">Log out</a>
                </div>
            </div>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "menu.twig", "/var/www/resources/templates/menu.twig");
    }
}
