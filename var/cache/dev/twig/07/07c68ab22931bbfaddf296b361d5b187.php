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

/* mission/index.html.twig */
class __TwigTemplate_556fface06d69e44db562ed47b4219ce extends Template
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
            'page_title' => [$this, 'block_page_title'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mission/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mission/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "mission/index.html.twig", 1);
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

        yield "Gestion des Missions";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_title"));

        yield "Liste des Missions";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
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

        // line 7
        yield "<style>
    .action-buttons .btn {
        margin-right: 3px;
    }
    .btn-delete {
        color: white;
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .btn-delete:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 23
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

        // line 24
        yield "<div class=\"card\">
    <div class=\"card-header\">
        <div class=\"d-flex justify-content-between align-items-center\">
            <h3 class=\"card-title\">Toutes les missions</h3>
            <div class=\"card-tools\">
                <form method=\"get\" action=\"";
        // line 29
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mission_index");
        yield "\" class=\"form-inline\">
                    <div class=\"input-group input-group-sm\">
                        <input type=\"text\" 
                               name=\"search\" 
                               class=\"form-control\" 
                               placeholder=\"Rechercher par entreprise...\"
                               value=\"";
        // line 35
        yield (((array_key_exists("search_term", $context) &&  !(null === $context["search_term"]))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["search_term"], "html", null, true)) : (""));
        yield "\">
                        <div class=\"input-group-append\">
                            <button type=\"submit\" class=\"btn btn-primary\">
                                <i class=\"fas fa-search\"></i>
                            </button>
                            ";
        // line 40
        if ((isset($context["search_term"]) || array_key_exists("search_term", $context) ? $context["search_term"] : (function () { throw new RuntimeError('Variable "search_term" does not exist.', 40, $this->source); })())) {
            // line 41
            yield "                            <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mission_index");
            yield "\" class=\"btn btn-secondary\">
                                <i class=\"fas fa-times\"></i>
                            </a>
                            ";
        }
        // line 45
        yield "                        </div>
                    </div>
                </form>
            </div>
            <a href=\"";
        // line 49
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mission_new");
        yield "\" class=\"btn btn-primary ml-2\">
                <i class=\"fas fa-plus\"></i> Nouvelle Mission
            </a>
        </div>
    </div>
    <div class=\"card-body\">
        <div class=\"table-responsive\">
            <table class=\"table table-bordered table-striped table-hover\">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Durée</th>
                        <th>Budget</th>
                        <th>Date Publication</th>
                        <th>Compétence</th>
                        <th>Entreprise</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                ";
        // line 70
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["missions"]) || array_key_exists("missions", $context) ? $context["missions"] : (function () { throw new RuntimeError('Variable "missions" does not exist.', 70, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["mission"]) {
            // line 71
            yield "                    <tr>
                        <td>";
            // line 72
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mission"], "titre", [], "any", false, false, false, 72), "html", null, true);
            yield "</td>
                        <td>";
            // line 73
            yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["mission"], "description", [], "any", false, false, false, 73)) > 50)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["mission"], "description", [], "any", false, false, false, 73), 0, 50) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mission"], "description", [], "any", false, false, false, 73), "html", null, true)));
            yield "</td>
                        <td>";
            // line 74
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mission"], "duree", [], "any", false, false, false, 74), "html", null, true);
            yield " jours</td>
                        <td>";
            // line 75
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mission"], "budget", [], "any", false, false, false, 75), "html", null, true);
            yield " €</td>
                        <td>";
            // line 76
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["mission"], "datePub", [], "any", false, false, false, 76)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["mission"], "datePub", [], "any", false, false, false, 76), "d/m/Y"), "html", null, true)) : (""));
            yield "</td>
                        <td>
                            ";
            // line 78
            $context["competences"] = Twig\Extension\CoreExtension::split($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["mission"], "competance", [], "any", false, false, false, 78), "/");
            // line 79
            yield "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["competences"]) || array_key_exists("competences", $context) ? $context["competences"] : (function () { throw new RuntimeError('Variable "competences" does not exist.', 79, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["competence"]) {
                // line 80
                yield "                                ";
                if (Twig\Extension\CoreExtension::trim($context["competence"])) {
                    // line 81
                    yield "                                    <span class=\"badge badge-info\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::trim($context["competence"]), "html", null, true);
                    yield "</span>
                                ";
                }
                // line 83
                yield "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['competence'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            yield "                        </td>
                        <td>";
            // line 85
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mission"], "nomEntreprise", [], "any", false, false, false, 85), "html", null, true);
            yield "</td>
                        <td class=\"text-center\">
                            <div class=\"btn-group action-buttons\">
                                <a href=\"";
            // line 88
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mission_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["mission"], "id", [], "any", false, false, false, 88)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-info\" title=\"Voir\">
                                    <i class=\"fas fa-eye\"></i>
                                </a>
                                <a href=\"";
            // line 91
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mission_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["mission"], "id", [], "any", false, false, false, 91)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-warning\" title=\"Modifier\">
                                    <i class=\"fas fa-edit\"></i>
                                </a>
                                <form method=\"post\" action=\"";
            // line 94
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mission_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["mission"], "id", [], "any", false, false, false, 94)]), "html", null, true);
            yield "\" 
                                      onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer cette mission ?');\" style=\"display:inline;\">
                                    <input type=\"hidden\" name=\"_token\" value=\"";
            // line 96
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["mission"], "id", [], "any", false, false, false, 96))), "html", null, true);
            yield "\">
                                    <button class=\"btn btn-sm btn-delete\" title=\"Supprimer\">
                                        <i class=\"fas fa-trash\"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                ";
            $context['_iterated'] = true;
        }
        // line 104
        if (!$context['_iterated']) {
            // line 105
            yield "                    <tr>
                        <td colspan=\"8\" class=\"text-center\">
                            ";
            // line 107
            if ((isset($context["search_term"]) || array_key_exists("search_term", $context) ? $context["search_term"] : (function () { throw new RuntimeError('Variable "search_term" does not exist.', 107, $this->source); })())) {
                // line 108
                yield "                                Aucune mission trouvée pour \"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search_term"]) || array_key_exists("search_term", $context) ? $context["search_term"] : (function () { throw new RuntimeError('Variable "search_term" does not exist.', 108, $this->source); })()), "html", null, true);
                yield "\"
                            ";
            } else {
                // line 110
                yield "                                Aucune mission disponible
                            ";
            }
            // line 112
            yield "                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['mission'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 115
        yield "                </tbody>
            </table>
        </div>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 122
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

        // line 123
        yield "<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation pour les boutons d'action
    document.querySelectorAll('.action-buttons .btn').forEach(btn => {
        btn.addEventListener('mouseover', function() {
            this.style.transform = 'scale(1.1)';
        });
        btn.addEventListener('mouseout', function() {
            this.style.transform = '';
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
        return "mission/index.html.twig";
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
        return array (  373 => 123,  360 => 122,  344 => 115,  336 => 112,  332 => 110,  326 => 108,  324 => 107,  320 => 105,  318 => 104,  305 => 96,  300 => 94,  294 => 91,  288 => 88,  282 => 85,  279 => 84,  273 => 83,  267 => 81,  264 => 80,  259 => 79,  257 => 78,  252 => 76,  248 => 75,  244 => 74,  240 => 73,  236 => 72,  233 => 71,  228 => 70,  204 => 49,  198 => 45,  190 => 41,  188 => 40,  180 => 35,  171 => 29,  164 => 24,  151 => 23,  126 => 7,  113 => 6,  90 => 4,  67 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Gestion des Missions{% endblock %}
{% block page_title %}Liste des Missions{% endblock %}

{% block stylesheets %}
<style>
    .action-buttons .btn {
        margin-right: 3px;
    }
    .btn-delete {
        color: white;
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .btn-delete:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"card\">
    <div class=\"card-header\">
        <div class=\"d-flex justify-content-between align-items-center\">
            <h3 class=\"card-title\">Toutes les missions</h3>
            <div class=\"card-tools\">
                <form method=\"get\" action=\"{{ path('app_mission_index') }}\" class=\"form-inline\">
                    <div class=\"input-group input-group-sm\">
                        <input type=\"text\" 
                               name=\"search\" 
                               class=\"form-control\" 
                               placeholder=\"Rechercher par entreprise...\"
                               value=\"{{ search_term ?? '' }}\">
                        <div class=\"input-group-append\">
                            <button type=\"submit\" class=\"btn btn-primary\">
                                <i class=\"fas fa-search\"></i>
                            </button>
                            {% if search_term %}
                            <a href=\"{{ path('app_mission_index') }}\" class=\"btn btn-secondary\">
                                <i class=\"fas fa-times\"></i>
                            </a>
                            {% endif %}
                        </div>
                    </div>
                </form>
            </div>
            <a href=\"{{ path('app_mission_new') }}\" class=\"btn btn-primary ml-2\">
                <i class=\"fas fa-plus\"></i> Nouvelle Mission
            </a>
        </div>
    </div>
    <div class=\"card-body\">
        <div class=\"table-responsive\">
            <table class=\"table table-bordered table-striped table-hover\">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Durée</th>
                        <th>Budget</th>
                        <th>Date Publication</th>
                        <th>Compétence</th>
                        <th>Entreprise</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                {% for mission in missions %}
                    <tr>
                        <td>{{ mission.titre }}</td>
                        <td>{{ mission.description|length > 50 ? mission.description|slice(0, 50) ~ '...' : mission.description }}</td>
                        <td>{{ mission.duree }} jours</td>
                        <td>{{ mission.budget }} €</td>
                        <td>{{ mission.datePub ? mission.datePub|date('d/m/Y') : '' }}</td>
                        <td>
                            {% set competences = mission.competance|split('/') %}
                            {% for competence in competences %}
                                {% if competence|trim %}
                                    <span class=\"badge badge-info\">{{ competence|trim }}</span>
                                {% endif %}
                            {% endfor %}
                        </td>
                        <td>{{ mission.nomEntreprise }}</td>
                        <td class=\"text-center\">
                            <div class=\"btn-group action-buttons\">
                                <a href=\"{{ path('app_mission_show', {'id': mission.id}) }}\" class=\"btn btn-sm btn-info\" title=\"Voir\">
                                    <i class=\"fas fa-eye\"></i>
                                </a>
                                <a href=\"{{ path('app_mission_edit', {'id': mission.id}) }}\" class=\"btn btn-sm btn-warning\" title=\"Modifier\">
                                    <i class=\"fas fa-edit\"></i>
                                </a>
                                <form method=\"post\" action=\"{{ path('app_mission_delete', {'id': mission.id}) }}\" 
                                      onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer cette mission ?');\" style=\"display:inline;\">
                                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ mission.id) }}\">
                                    <button class=\"btn btn-sm btn-delete\" title=\"Supprimer\">
                                        <i class=\"fas fa-trash\"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                {% else %}
                    <tr>
                        <td colspan=\"8\" class=\"text-center\">
                            {% if search_term %}
                                Aucune mission trouvée pour \"{{ search_term }}\"
                            {% else %}
                                Aucune mission disponible
                            {% endif %}
                        </td>
                    </tr>
                {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>
{% endblock %}

{% block javascripts %}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation pour les boutons d'action
    document.querySelectorAll('.action-buttons .btn').forEach(btn => {
        btn.addEventListener('mouseover', function() {
            this.style.transform = 'scale(1.1)';
        });
        btn.addEventListener('mouseout', function() {
            this.style.transform = '';
        });
    });
});
</script>
{% endblock %}
", "mission/index.html.twig", "C:\\ProjetsSymfony\\my-project\\templates\\mission\\index.html.twig");
    }
}
