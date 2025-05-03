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

/* includes/sidebar.html.twig */
class __TwigTemplate_111b20040a68101a456915e3764822bd extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "includes/sidebar.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "includes/sidebar.html.twig"));

        // line 1
        yield "<aside class=\"main-sidebar sidebar-dark-primary elevation-4\">
    <!-- Brand Logo -->
    <a href=\"";
        // line 3
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mission_index");
        yield "\" class=\"brand-link\">
        <span class=\"brand-text font-weight-light\">FreelanceConnect</span>
    </a>

    <!-- Sidebar -->
    <div class=\"sidebar\">
        <!-- Sidebar Menu -->
        <nav class=\"mt-2\">
            <ul class=\"nav nav-pills nav-sidebar flex-column\" data-widget=\"treeview\" role=\"menu\">
                <li class=\"nav-header\">GESTION</li>
                <li class=\"nav-item\">
                    <a href=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mission_index");
        yield "\" class=\"nav-link\">
                        <i class=\"nav-icon fas fa-tasks\"></i>
                        <p>Missions</p>
                    </a>
                </li>
                <li class=\"nav-item\">
                    <a href=\"";
        // line 20
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_candidature_index");
        yield "\" class=\"nav-link\">
                        <i class=\"nav-icon fas fa-file-alt\"></i>
                        <p>Candidatures</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "includes/sidebar.html.twig";
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
        return array (  75 => 20,  66 => 14,  52 => 3,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<aside class=\"main-sidebar sidebar-dark-primary elevation-4\">
    <!-- Brand Logo -->
    <a href=\"{{ path('app_mission_index') }}\" class=\"brand-link\">
        <span class=\"brand-text font-weight-light\">FreelanceConnect</span>
    </a>

    <!-- Sidebar -->
    <div class=\"sidebar\">
        <!-- Sidebar Menu -->
        <nav class=\"mt-2\">
            <ul class=\"nav nav-pills nav-sidebar flex-column\" data-widget=\"treeview\" role=\"menu\">
                <li class=\"nav-header\">GESTION</li>
                <li class=\"nav-item\">
                    <a href=\"{{ path('app_mission_index') }}\" class=\"nav-link\">
                        <i class=\"nav-icon fas fa-tasks\"></i>
                        <p>Missions</p>
                    </a>
                </li>
                <li class=\"nav-item\">
                    <a href=\"{{ path('app_candidature_index') }}\" class=\"nav-link\">
                        <i class=\"nav-icon fas fa-file-alt\"></i>
                        <p>Candidatures</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>", "includes/sidebar.html.twig", "C:\\ProjetsSymfony\\my-project\\templates\\includes\\sidebar.html.twig");
    }
}
