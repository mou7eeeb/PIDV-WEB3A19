<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* includes/header.html.twig */
class __TwigTemplate_d8804cdead089fced92c07a6a1e8fc91 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "includes/header.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "includes/header.html.twig"));

        // line 2
        yield "<header id=\"header\" class=\"header fixed-top\">
  <div class=\"container-fluid container-xl d-flex align-items-center justify-content-between\">
    <a href=\"";
        // line 4
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"logo d-flex align-items-center\">
      <img src=\"";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("FlexStart/assets/img/logo.png"), "html", null, true);
        yield "\" alt=\"\">
      <span>FlexStart</span>
    </a>

    <nav id=\"navbar\" class=\"navbar\">
      <ul>
        <li><a class=\"nav-link scrollto ";
        // line 11
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 11, $this->source); })()), "request", [], "any", false, false, false, 11), "get", ["_route"], "method", false, false, false, 11) == "app_home")) {
            yield "active";
        }
        yield "\" href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Accueil</a></li>
        <li><a class=\"nav-link scrollto\" href=\"";
        // line 12
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_about");
        yield "\">À propos</a></li>
        <li><a class=\"nav-link scrollto\" href=\"";
        // line 13
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_services");
        yield "\">Services</a></li>
        <li><a class=\"nav-link scrollto ";
        // line 14
        if ((is_string($_v0 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "request", [], "any", false, false, false, 14), "get", ["_route"], "method", false, false, false, 14)) && is_string($_v1 = "app_mission_") && str_starts_with($_v0, $_v1))) {
            yield "active";
        }
        yield "\" href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mission_index");
        yield "\">Missions</a></li>
        <li><a class=\"nav-link scrollto\" href=\"";
        // line 15
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_contact");
        yield "\">Contact</a></li>
        <li><a class=\"getstarted scrollto\" href=\"";
        // line 16
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_candidature_new");
        yield "\">Postuler</a></li>
        ";
        // line 17
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
            // line 18
            yield "          <li><a class=\"nav-link\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashboard");
            yield "\"><i class=\"bi bi-gear\"></i> Administration</a></li>
        ";
        }
        // line 20
        yield "      </ul>
      <i class=\"bi bi-list mobile-nav-toggle\"></i>
    </nav>
  </div>
</header>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "includes/header.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  105 => 20,  99 => 18,  97 => 17,  93 => 16,  89 => 15,  81 => 14,  77 => 13,  73 => 12,  65 => 11,  56 => 5,  52 => 4,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/includes/header.html.twig #}
<header id=\"header\" class=\"header fixed-top\">
  <div class=\"container-fluid container-xl d-flex align-items-center justify-content-between\">
    <a href=\"{{ path('app_home') }}\" class=\"logo d-flex align-items-center\">
      <img src=\"{{ asset('FlexStart/assets/img/logo.png') }}\" alt=\"\">
      <span>FlexStart</span>
    </a>

    <nav id=\"navbar\" class=\"navbar\">
      <ul>
        <li><a class=\"nav-link scrollto {% if app.request.get('_route') == 'app_home' %}active{% endif %}\" href=\"{{ path('app_home') }}\">Accueil</a></li>
        <li><a class=\"nav-link scrollto\" href=\"{{ path('app_about') }}\">À propos</a></li>
        <li><a class=\"nav-link scrollto\" href=\"{{ path('app_services') }}\">Services</a></li>
        <li><a class=\"nav-link scrollto {% if app.request.get('_route') starts with 'app_mission_' %}active{% endif %}\" href=\"{{ path('app_mission_index') }}\">Missions</a></li>
        <li><a class=\"nav-link scrollto\" href=\"{{ path('app_contact') }}\">Contact</a></li>
        <li><a class=\"getstarted scrollto\" href=\"{{ path('app_candidature_new') }}\">Postuler</a></li>
        {% if is_granted('ROLE_ADMIN') %}
          <li><a class=\"nav-link\" href=\"{{ path('app_admin_dashboard') }}\"><i class=\"bi bi-gear\"></i> Administration</a></li>
        {% endif %}
      </ul>
      <i class=\"bi bi-list mobile-nav-toggle\"></i>
    </nav>
  </div>
</header>", "includes/header.html.twig", "C:\\ProjetsSymfony\\my-project\\templates\\includes\\header.html.twig");
    }
}
