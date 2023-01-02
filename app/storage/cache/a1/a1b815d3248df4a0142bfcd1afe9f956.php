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

/* event.twig */
class __TwigTemplate_837620e385f4c23850721ff62f1f5cf5 extends Template
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
        $this->parent = $this->loadTemplate("layout.twig", "event.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <title>";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["event"] ?? null), "name", [], "any", false, false, false, 4), "html", null, true);
        echo "</title>
    <div class=\".col-8\">
    <h1> ";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["event"] ?? null), "name", [], "any", false, false, false, 6), "html", null, true);
        echo "</h1>
        <p>";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["event"] ?? null), "description", [], "any", false, false, false, 7), "html", null, true);
        echo "</p>
    </div>
    <div class=\".col-8\">
        <form action=\"";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["event"] ?? null), "id", [], "any", false, false, false, 10), "html", null, true);
        echo "\" method=\"post\">
            <fieldset>
                <h2>aanmelden</h2>
                <dl class=\"clearfix\">
                    <dt><label for=\"dog-names\">kies tijd slot:</label>
                    </dt>
                    <select name=\"slot\" id=\"slot_id\">
                        ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["slots"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["slot"]) {
            // line 18
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["slot"], "id", [], "any", false, false, false, 18), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["slot"], "name", [], "any", false, false, false, 18), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["slot"], "time_start", [], "any", false, false, false, 18), "d/m/Y h:i:s"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["slot"], "time_end", [], "any", false, false, false, 18), "d/m/Y h:i:s"), "html", null, true);
            echo " )</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['slot'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "                    </select>
                    <label for=\"name\">Name:</label>
                    <input type=\"text\" name=\"name\" id=\"name\" value=\"\">
                    <label for=\"email\">email:</label>
                    <input type=\"email\" name=\"email\" id=\"email\">
                    <label for=\"count\">hoeveel personen:</label>
                    <input type=\"count\" name=\"count\" id=\"count\">
                    <input type=\"submit\" value=\"aanmelden\">
                </dl>
            </fieldset>
        </form>
    </div>
    <div class=\".col-8\">
        <p><bold>";
        // line 33
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["event"] ?? null), "date", [], "any", false, false, false, 33), "html", null, true);
        echo "</bold></p>
        <p>";
        // line 34
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["event"] ?? null), "address", [], "any", false, false, false, 34), "html", null, true);
        echo "</p>
        <p>";
        // line 35
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["event"] ?? null), "start", [], "any", false, false, false, 35), "d/m/Y"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["event"] ?? null), "end", [], "any", false, false, false, 35), "d/m/Y"), "html", null, true);
        echo " ) </p>
    </div>
    <!--The div element for the map -->
    <div id=\"map\"></div>
    <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        var uluru = {lat: ";
        // line 43
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["event"] ?? null), "lat", [], "any", false, false, false, 43), "html", null, true);
        echo ", lng: ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["event"] ?? null), "lng", [], "any", false, false, false, 43), "html", null, true);
        echo "};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 4, center: uluru});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});
      }
    <script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly\"defer></script>

";
    }

    public function getTemplateName()
    {
        return "event.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 43,  118 => 35,  114 => 34,  110 => 33,  95 => 20,  80 => 18,  76 => 17,  66 => 10,  60 => 7,  56 => 6,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "event.twig", "/var/www/resources/templates/event.twig");
    }
}
