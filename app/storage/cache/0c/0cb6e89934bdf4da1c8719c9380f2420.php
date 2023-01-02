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

/* 404.twig */
class __TwigTemplate_f6db57cbed4849ffd01e216a36380919 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<!--https://codepen.io/1832Manaswini/pen/Vwezyjx-->
<html lang=\"en\" >
<head>
    <meta charset=\"UTF-8\">
    <title>Error 404</title>
    <link rel=\"stylesheet\" href=\"../../evento/css/404.css\">

</head>
<body>
<!-- partial:index.partial.html -->
<div class=\"container\">
    <h1 class=\"first-four\">4</h1>
    <div class=\"cog-wheel1\">
        <div class=\"cog1\">
            <div class=\"top\"></div>
            <div class=\"down\"></div>
            <div class=\"left-top\"></div>
            <div class=\"left-down\"></div>
            <div class=\"right-top\"></div>
            <div class=\"right-down\"></div>
            <div class=\"left\"></div>
            <div class=\"right\"></div>
        </div>
    </div>

    <div class=\"cog-wheel2\">
        <div class=\"cog2\">
            <div class=\"top\"></div>
            <div class=\"down\"></div>
            <div class=\"left-top\"></div>
            <div class=\"left-down\"></div>
            <div class=\"right-top\"></div>
            <div class=\"right-down\"></div>
            <div class=\"left\"></div>
            <div class=\"right\"></div>
        </div>
    </div>
    <h1 class=\"second-four\">4</h1>
    <p class=\"wrong-para\">Uh Oh! pagina niet gevonden !</p>
</div>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.1/gsap.min.js'></script><script  src=\"../../evento/js/404.js\"></script>

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "404.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "404.twig", "/var/www/resources/templates/404.twig");
    }
}
