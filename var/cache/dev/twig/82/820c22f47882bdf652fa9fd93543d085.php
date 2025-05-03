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

/* mission/show.html.twig */
class __TwigTemplate_016a788d0bf1f13a678ce51c6d04aac0 extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mission/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mission/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "mission/show.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Détails de la mission - ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 3, $this->source); })()), "titre", [], "any", false, false, false, 3), "html", null, true);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        yield "<style>
    .mission-card {
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    .card-header {
        background-color: #4154f1;
        color: white;
    }
    .info-label {
        font-weight: 600;
        color: #4154f1;
    }
    .badge-custom {
        background-color: #f0f7ff;
        color: #4154f1;
        padding: 5px 10px;
        border-radius: 20px;
        margin-right: 5px;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 30
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 31
        yield "<div class=\"container py-4\">
    <div class=\"card mission-card\">
        <div class=\"card-header d-flex justify-content-between align-items-center\">
            <h2 class=\"mb-0\">";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 34, $this->source); })()), "titre", [], "any", false, false, false, 34), "html", null, true);
        yield "</h2>
            <a href=\"";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mission_pdf", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 35, $this->source); })()), "id", [], "any", false, false, false, 35)]), "html", null, true);
        yield "\" class=\"btn btn-light\">
                <i class=\"fas fa-file-pdf mr-1\"></i> Exporter en PDF
            </a>
        </div>

        <div class=\"card-body\">
            <div class=\"row\">
                <div class=\"col-md-6\">
                    <div class=\"mb-4\">
                        <h5 class=\"info-label\"><i class=\"fas fa-info-circle mr-2\"></i>Description</h5>
                        <p class=\"pl-4\">";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 45, $this->source); })()), "description", [], "any", false, false, false, 45), "html", null, true);
        yield "</p>
                    </div>

                    <div class=\"mb-4\">
                        <h5 class=\"info-label\"><i class=\"fas fa-question-circle mr-2\"></i>Questions</h5>
                        <p class=\"pl-4\">";
        // line 50
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["mission"] ?? null), "questions", [], "any", true, true, false, 50) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 50, $this->source); })()), "questions", [], "any", false, false, false, 50)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 50, $this->source); })()), "questions", [], "any", false, false, false, 50), "html", null, true)) : ("Aucune question spécifique"));
        yield "</p>
                    </div>

                    <div class=\"mb-4\">
                        <h5 class=\"info-label\"><i class=\"fas fa-building mr-2\"></i>Entreprise</h5>
                        <p class=\"pl-4\">";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 55, $this->source); })()), "nomEntreprise", [], "any", false, false, false, 55), "html", null, true);
        yield "</p>
                    </div>
                </div>

                <div class=\"col-md-6\">
                    <div class=\"mb-4\">
                        <h5 class=\"info-label\"><i class=\"fas fa-chart-line mr-2\"></i>Détails techniques</h5>
                        <ul class=\"list-group list-group-flush\">
                            <li class=\"list-group-item d-flex justify-content-between align-items-center\">
                                <span><i class=\"fas fa-clock mr-2\"></i>Durée</span>
                                <span class=\"badge badge-primary\">";
        // line 65
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 65, $this->source); })()), "duree", [], "any", false, false, false, 65), "html", null, true);
        yield " jours</span>
                            </li>
                            <li class=\"list-group-item d-flex justify-content-between align-items-center\">
                                <span><i class=\"fas fa-euro-sign mr-2\"></i>Budget</span>
                                <span class=\"badge badge-success\">";
        // line 69
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 69, $this->source); })()), "budget", [], "any", false, false, false, 69), "html", null, true);
        yield " €</span>
                            </li>
                            <li class=\"list-group-item d-flex justify-content-between align-items-center\">
                                <span><i class=\"fas fa-calendar-alt mr-2\"></i>Date publication</span>
                                <span>";
        // line 73
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 73, $this->source); })()), "datePub", [], "any", false, false, false, 73)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 73, $this->source); })()), "datePub", [], "any", false, false, false, 73), "d/m/Y"), "html", null, true)) : (""));
        yield "</span>
                            </li>
                        </ul>
                    </div>

                    <div class=\"mb-4\">
                        <h5 class=\"info-label\"><i class=\"fas fa-tools mr-2\"></i>Compétences requises</h5>
                        <div class=\"pl-4\">
                            ";
        // line 81
        $context["competences"] = Twig\Extension\CoreExtension::split($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 81, $this->source); })()), "competance", [], "any", false, false, false, 81), "/");
        // line 82
        yield "                            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["competences"]) || array_key_exists("competences", $context) ? $context["competences"] : (function () { throw new RuntimeError('Variable "competences" does not exist.', 82, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["competence"]) {
            // line 83
            yield "                                <span class=\"badge badge-custom\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::trim($context["competence"]), "html", null, true);
            yield "</span>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['competence'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 85
        yield "                        </div>
                    </div>

                    <div class=\"mb-4\">
                        <h5 class=\"info-label\"><i class=\"fas fa-users mr-2\"></i>Statistiques</h5>
                        <ul class=\"list-group list-group-flush\">
                            <li class=\"list-group-item d-flex justify-content-between align-items-center\">
                                <span>Utilisateurs concernés</span>
                                <span class=\"badge badge-info\">";
        // line 93
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 93, $this->source); })()), "nbreUtilisateur", [], "any", false, false, false, 93), "html", null, true);
        yield "</span>
                            </li>
                            <li class=\"list-group-item d-flex justify-content-between align-items-center\">
                                <span>Candidatures reçues</span>
                                <span class=\"badge badge-info\">";
        // line 97
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 97, $this->source); })()), "nombreCandidatures", [], "any", false, false, false, 97), "html", null, true);
        yield "</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class=\"card-footer bg-light d-flex justify-content-between\">
            <div>
                <a href=\"";
        // line 107
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mission_index");
        yield "\" class=\"btn btn-outline-secondary\">
                    <i class=\"fas fa-arrow-left mr-1\"></i> Retour à la liste
                </a>
            </div>
            <div class=\"d-flex\">
                ";
        // line 112
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
            // line 113
            yield "                    <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mission_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 113, $this->source); })()), "id", [], "any", false, false, false, 113)]), "html", null, true);
            yield "\" class=\"btn btn-warning mr-2\">
                        <i class=\"fas fa-edit mr-1\"></i> Modifier
                    </a>
                ";
        }
        // line 117
        yield "                <form method=\"post\" action=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mission_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 117, $this->source); })()), "id", [], "any", false, false, false, 117)]), "html", null, true);
        yield "\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer cette mission ?');\">
                    <input type=\"hidden\" name=\"_token\" value=\"";
        // line 118
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 118, $this->source); })()), "id", [], "any", false, false, false, 118))), "html", null, true);
        yield "\">
                    <button class=\"btn btn-danger\"><i class=\"fas fa-trash mr-1\"></i> Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 127
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 128
        yield "<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation des badges au survol
    document.querySelectorAll('.badge-custom').forEach(badge => {
        badge.addEventListener('mouseover', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 4px 8px rgba(0,0,0,0.1)';
        });
        badge.addEventListener('mouseout', function() {
            this.style.transform = '';
            this.style.boxShadow = '';
        });
    });
});
</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "mission/show.html.twig";
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
        return array (  326 => 128,  313 => 127,  294 => 118,  289 => 117,  281 => 113,  279 => 112,  271 => 107,  258 => 97,  251 => 93,  241 => 85,  232 => 83,  227 => 82,  225 => 81,  214 => 73,  207 => 69,  200 => 65,  187 => 55,  179 => 50,  171 => 45,  158 => 35,  154 => 34,  149 => 31,  136 => 30,  103 => 6,  90 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Détails de la mission - {{ mission.titre }}{% endblock %}

{% block stylesheets %}
<style>
    .mission-card {
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    .card-header {
        background-color: #4154f1;
        color: white;
    }
    .info-label {
        font-weight: 600;
        color: #4154f1;
    }
    .badge-custom {
        background-color: #f0f7ff;
        color: #4154f1;
        padding: 5px 10px;
        border-radius: 20px;
        margin-right: 5px;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"container py-4\">
    <div class=\"card mission-card\">
        <div class=\"card-header d-flex justify-content-between align-items-center\">
            <h2 class=\"mb-0\">{{ mission.titre }}</h2>
            <a href=\"{{ path('app_mission_pdf', {'id': mission.id}) }}\" class=\"btn btn-light\">
                <i class=\"fas fa-file-pdf mr-1\"></i> Exporter en PDF
            </a>
        </div>

        <div class=\"card-body\">
            <div class=\"row\">
                <div class=\"col-md-6\">
                    <div class=\"mb-4\">
                        <h5 class=\"info-label\"><i class=\"fas fa-info-circle mr-2\"></i>Description</h5>
                        <p class=\"pl-4\">{{ mission.description }}</p>
                    </div>

                    <div class=\"mb-4\">
                        <h5 class=\"info-label\"><i class=\"fas fa-question-circle mr-2\"></i>Questions</h5>
                        <p class=\"pl-4\">{{ mission.questions ?? 'Aucune question spécifique' }}</p>
                    </div>

                    <div class=\"mb-4\">
                        <h5 class=\"info-label\"><i class=\"fas fa-building mr-2\"></i>Entreprise</h5>
                        <p class=\"pl-4\">{{ mission.nomEntreprise }}</p>
                    </div>
                </div>

                <div class=\"col-md-6\">
                    <div class=\"mb-4\">
                        <h5 class=\"info-label\"><i class=\"fas fa-chart-line mr-2\"></i>Détails techniques</h5>
                        <ul class=\"list-group list-group-flush\">
                            <li class=\"list-group-item d-flex justify-content-between align-items-center\">
                                <span><i class=\"fas fa-clock mr-2\"></i>Durée</span>
                                <span class=\"badge badge-primary\">{{ mission.duree }} jours</span>
                            </li>
                            <li class=\"list-group-item d-flex justify-content-between align-items-center\">
                                <span><i class=\"fas fa-euro-sign mr-2\"></i>Budget</span>
                                <span class=\"badge badge-success\">{{ mission.budget }} €</span>
                            </li>
                            <li class=\"list-group-item d-flex justify-content-between align-items-center\">
                                <span><i class=\"fas fa-calendar-alt mr-2\"></i>Date publication</span>
                                <span>{{ mission.datePub ? mission.datePub|date('d/m/Y') : '' }}</span>
                            </li>
                        </ul>
                    </div>

                    <div class=\"mb-4\">
                        <h5 class=\"info-label\"><i class=\"fas fa-tools mr-2\"></i>Compétences requises</h5>
                        <div class=\"pl-4\">
                            {% set competences = mission.competance|split('/') %}
                            {% for competence in competences %}
                                <span class=\"badge badge-custom\">{{ competence|trim }}</span>
                            {% endfor %}
                        </div>
                    </div>

                    <div class=\"mb-4\">
                        <h5 class=\"info-label\"><i class=\"fas fa-users mr-2\"></i>Statistiques</h5>
                        <ul class=\"list-group list-group-flush\">
                            <li class=\"list-group-item d-flex justify-content-between align-items-center\">
                                <span>Utilisateurs concernés</span>
                                <span class=\"badge badge-info\">{{ mission.nbreUtilisateur }}</span>
                            </li>
                            <li class=\"list-group-item d-flex justify-content-between align-items-center\">
                                <span>Candidatures reçues</span>
                                <span class=\"badge badge-info\">{{ mission.nombreCandidatures }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class=\"card-footer bg-light d-flex justify-content-between\">
            <div>
                <a href=\"{{ path('app_mission_index') }}\" class=\"btn btn-outline-secondary\">
                    <i class=\"fas fa-arrow-left mr-1\"></i> Retour à la liste
                </a>
            </div>
            <div class=\"d-flex\">
                {% if is_granted('ROLE_ADMIN') %}
                    <a href=\"{{ path('app_mission_edit', {'id': mission.id}) }}\" class=\"btn btn-warning mr-2\">
                        <i class=\"fas fa-edit mr-1\"></i> Modifier
                    </a>
                {% endif %}
                <form method=\"post\" action=\"{{ path('app_mission_delete', {'id': mission.id}) }}\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer cette mission ?');\">
                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ mission.id) }}\">
                    <button class=\"btn btn-danger\"><i class=\"fas fa-trash mr-1\"></i> Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block javascripts %}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation des badges au survol
    document.querySelectorAll('.badge-custom').forEach(badge => {
        badge.addEventListener('mouseover', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 4px 8px rgba(0,0,0,0.1)';
        });
        badge.addEventListener('mouseout', function() {
            this.style.transform = '';
            this.style.boxShadow = '';
        });
    });
});
</script>
{% endblock %}
", "mission/show.html.twig", "C:\\ProjetsSymfony\\my-project\\templates\\mission\\show.html.twig");
    }
}
