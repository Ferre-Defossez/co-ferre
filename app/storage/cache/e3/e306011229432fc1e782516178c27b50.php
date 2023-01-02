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

/* login.twig */
class __TwigTemplate_c72a5b39991652524a9df8c01312ccfa extends Template
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
        $this->parent = $this->loadTemplate("layout.twig", "login.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <form class=\"loginForm\" action=\"login\" method=\"post\" >
        <fieldset>

            <h2>Login</h2>

            <dl class=\"clearfix\">
                <dt><label for=\"name\">Username</label><span class=\"message error\"> ";
        // line 10
        echo twig_escape_filter($this->env, ($context["msgName"] ?? null), "html", null, true);
        echo "</span></dt>

                <dd class=\"text\">
                    <input type=\"text\" id=\"name\" name=\"name\" value=\"";
        // line 13
        echo twig_escape_filter($this->env, ($context["username"] ?? null), "html", null, true);
        echo "\" class=\"input-text\" />

                </dd>
                <dt><label for=\"pass\">Password</label><span class=\"message error\"> ";
        // line 16
        echo twig_escape_filter($this->env, ($context["msgPass"] ?? null), "html", null, true);
        echo "</span></dt>
                <dd class=\"text\">
                    <input type=\"password\" id=\"pass\" name=\"pass\" value=\"\" class=\"input-text\" />

                </dd>

                <dt class=\"full clearfix\" id=\"lastrow\">
                    <input type=\"hidden\" name=\"moduleAction\" value=\"login\" />
                    <input type=\"submit\" id=\"btnSubmit\" name=\"btnSubmit\" value=\"login\" />
                </dt>
            </dl>
        </fieldset>
    </form>

    <div class=\"underText\">
        <p class=\"text-left\"><a href=\"registrate\">Nog geen account? Registreer hier</a></p>
        ";
        // line 32
        if ((twig_trim_filter(($context["nameLastLogin"] ?? null)) == "")) {
            // line 33
            echo "            <p class=\"text-left\">Er werd op dit toestel nog niet ingelogd op deze website.</p>
        ";
        } else {
            // line 35
            echo "            <p class=\"text-left\">Laatste login door ";
            echo twig_escape_filter($this->env, ($context["nameLastLogin"] ?? null), "html", null, true);
            echo " op ";
            echo twig_escape_filter($this->env, ($context["dayLastLogin"] ?? null), "html", null, true);
            echo " om ";
            echo twig_escape_filter($this->env, ($context["hourLastLogin"] ?? null), "html", null, true);
            echo "</p>
        ";
        }
        // line 37
        echo "    </div>

";
    }

    public function getTemplateName()
    {
        return "login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 37,  95 => 35,  91 => 33,  89 => 32,  70 => 16,  64 => 13,  58 => 10,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "login.twig", "/var/www/resources/templates/login.twig");
    }
}
