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

/* layout.twig */
class __TwigTemplate_8936fb7a59571d3b48af375a52053f8d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'main' => [$this, 'block_main'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>Events</title>
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css\" integrity=\"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"/evento/css/styles.css\">

</head>
<body>
<header>
    <div class=\"topnav\">
        <a class=\"logo\" href=\"/evento\">Evento</a>
        <div class=\"navbar\" id=\"mylinks\">
            <div class=\"header-right\">
                <a href=\"/evento\">Home</a>
                <a href=\"#\">Contact</a>
                <a class=\"active\" href=\"/evento/events\">Events</a>
                <div class=\"login\">
                    ";
        // line 22
        if (($context["logged"] ?? null)) {
            // line 23
            echo "                        <a class=\"profile\" href=\"menu\"></a>
                    ";
        } else {
            // line 25
            echo "                        <a href=\"login\">Login</a>
                    ";
        }
        // line 27
        echo "                </div>
            </div>
        </div>
        <a class=\"icon\" href=\"#\"></a>
    </div>
</header>
<main>
    ";
        // line 34
        $this->displayBlock('main', $context, $blocks);
        // line 38
        echo "</main>
<footer></footer>
<script src=\"/evento/js/hamburger.js\"></script>
</body>
</html>";
    }

    // line 34
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 35
        echo "

    ";
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 35,  90 => 34,  82 => 38,  80 => 34,  71 => 27,  67 => 25,  63 => 23,  61 => 22,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "layout.twig", "/var/www/resources/templates/layout.twig");
    }
}
