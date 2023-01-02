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

/* registrate.twig */
class __TwigTemplate_ba19ce4db7c761d2e759660e6b1ab16d extends Template
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
        $this->parent = $this->loadTemplate("layout.twig", "registrate.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <form class=\"registrateForm\" action=\"registrate.php\" method=\"post\" >
        <fieldset>

            <h2>Registrate</h2>

            <dl class=\"clearfix\">
                <dt><label for=\"name\">Username</label><span class=\"message error\"> ";
        // line 10
        echo twig_escape_filter($this->env, ($context["msgName"] ?? null), "html", null, true);
        echo "</span></dt>
                <dd class=\"text\">
                    <input type=\"text\" id=\"name\" name=\"name\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, ($context["username"] ?? null), "html", null, true);
        echo "\" class=\"input-text\" />
                </dd>

                <dt><label for=\"email\">E-mailadres</label><span class=\"message error\"> ";
        // line 15
        echo twig_escape_filter($this->env, ($context["msgEmail"] ?? null), "html", null, true);
        echo "</span></dt>
                <dd class=\"text\">
                    <input type=\"text\" id=\"email\" name=\"email\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, ($context["email"] ?? null), "html", null, true);
        echo "\" class=\"input-text\" />
                </dd>

                <dt><label for=\"pass\">Password</label><span class=\"message error\"> ";
        // line 20
        echo twig_escape_filter($this->env, ($context["msgPass"] ?? null), "html", null, true);
        echo "</span></dt>
                <dd class=\"text\">
                    <input type=\"password\" id=\"pass\" name=\"pass\" value=\"\" class=\"input-text\" />
                </dd>

                <dt><label for=\"pass2\">Password repeat</label><span class=\"message error\"> ";
        // line 25
        echo twig_escape_filter($this->env, ($context["msgPass2"] ?? null), "html", null, true);
        echo "</span></dt>
                <dd class=\"text\">
                    <input type=\"password\" id=\"pass2\" name=\"pass\" value=\"\" class=\"input-text\" />
                </dd>

                <dt class=\"full clearfix\" id=\"lastrow\">
                    <input type=\"hidden\" name=\"moduleAction\" value=\"registrate\" />
                    <input type=\"submit\" id=\"btnSubmit\" name=\"btnSubmit\" value=\"registrate\" />
                </dt>

            </dl>

        </fieldset>
    </form>
";
    }

    public function getTemplateName()
    {
        return "registrate.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 25,  80 => 20,  74 => 17,  69 => 15,  63 => 12,  58 => 10,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "registrate.twig", "/var/www/resources/templates/registrate.twig");
    }
}
