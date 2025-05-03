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

/* candidature/show.html.twig */
class __TwigTemplate_9946dd225cdbf3c8aefce8ba0249716a extends Template
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
            'body' => [$this, 'block_body'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "candidature/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "candidature/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "candidature/show.html.twig", 1);
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

        yield "Candidature #";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["candidature"]) || array_key_exists("candidature", $context) ? $context["candidature"] : (function () { throw new RuntimeError('Variable "candidature" does not exist.', 3, $this->source); })()), "id", [], "any", false, false, false, 3), "html", null, true);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "    <h1>Candidature</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>User ID</th>
                <td>";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["candidature"]) || array_key_exists("candidature", $context) ? $context["candidature"] : (function () { throw new RuntimeError('Variable "candidature" does not exist.', 12, $this->source); })()), "userId", [], "any", false, false, false, 12), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>Mission associée</th>
                <td>
                    ";
        // line 17
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["candidature"]) || array_key_exists("candidature", $context) ? $context["candidature"] : (function () { throw new RuntimeError('Variable "candidature" does not exist.', 17, $this->source); })()), "missionId", [], "any", false, false, false, 17)) {
            // line 18
            yield "                        <div class=\"d-flex align-items-center\">
                            <span class=\"mr-3\">Mission ";
            // line 19
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["candidature"]) || array_key_exists("candidature", $context) ? $context["candidature"] : (function () { throw new RuntimeError('Variable "candidature" does not exist.', 19, $this->source); })()), "missionId", [], "any", false, false, false, 19), "html", null, true);
            yield "</span>
                            ";
            // line 20
            if ((isset($context["qrCode"]) || array_key_exists("qrCode", $context) ? $context["qrCode"] : (function () { throw new RuntimeError('Variable "qrCode" does not exist.', 20, $this->source); })())) {
                // line 21
                yield "                                <div class=\"d-flex flex-column align-items-center\">
                                    <img src=\"";
                // line 22
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["qrCode"]) || array_key_exists("qrCode", $context) ? $context["qrCode"] : (function () { throw new RuntimeError('Variable "qrCode" does not exist.', 22, $this->source); })()), "html", null, true);
                yield "\" width=\"150\" class=\"img-thumbnail mb-2\">
                                    <div>
                                        <a href=\"";
                // line 24
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_candidature_qrcode", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["candidature"]) || array_key_exists("candidature", $context) ? $context["candidature"] : (function () { throw new RuntimeError('Variable "candidature" does not exist.', 24, $this->source); })()), "id", [], "any", false, false, false, 24)]), "html", null, true);
                yield "\" 
                                           class=\"btn btn-sm btn-outline-primary mr-2\">
                                            Voir QR Code
                                        </a>
                                        <a href=\"";
                // line 28
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mission_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["candidature"]) || array_key_exists("candidature", $context) ? $context["candidature"] : (function () { throw new RuntimeError('Variable "candidature" does not exist.', 28, $this->source); })()), "missionId", [], "any", false, false, false, 28)]), "html", null, true);
                yield "\"
                                           class=\"btn btn-sm btn-outline-success\">
                                            Voir Détails Mission
                                        </a>
                                    </div>
                                </div>
                            ";
            } else {
                // line 35
                yield "                                <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mission_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["candidature"]) || array_key_exists("candidature", $context) ? $context["candidature"] : (function () { throw new RuntimeError('Variable "candidature" does not exist.', 35, $this->source); })()), "missionId", [], "any", false, false, false, 35)]), "html", null, true);
                yield "\"
                                   class=\"btn btn-sm btn-outline-primary\">
                                    Voir la Mission
                                </a>
                            ";
            }
            // line 40
            yield "                        </div>
                    ";
        } else {
            // line 42
            yield "                        <span class=\"text-muted\">Aucune mission associée</span>
                    ";
        }
        // line 44
        yield "                </td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    ";
        // line 49
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["candidature"]) || array_key_exists("candidature", $context) ? $context["candidature"] : (function () { throw new RuntimeError('Variable "candidature" does not exist.', 49, $this->source); })()), "image", [], "any", false, false, false, 49)) {
            // line 50
            yield "                        <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/candidatures/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["candidature"]) || array_key_exists("candidature", $context) ? $context["candidature"] : (function () { throw new RuntimeError('Variable "candidature" does not exist.', 50, $this->source); })()), "image", [], "any", false, false, false, 50))), "html", null, true);
            yield "\" 
                             width=\"200\" class=\"img-thumbnail\">
                    ";
        } else {
            // line 53
            yield "                        <span class=\"text-muted\">Aucune image</span>
                    ";
        }
        // line 55
        yield "                </td>
            </tr>
            <tr>
                <th>Réponses</th>
                <td>";
        // line 59
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["candidature"] ?? null), "reponseQuestions", [], "any", true, true, false, 59) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["candidature"]) || array_key_exists("candidature", $context) ? $context["candidature"] : (function () { throw new RuntimeError('Variable "candidature" does not exist.', 59, $this->source); })()), "reponseQuestions", [], "any", false, false, false, 59)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["candidature"]) || array_key_exists("candidature", $context) ? $context["candidature"] : (function () { throw new RuntimeError('Variable "candidature" does not exist.', 59, $this->source); })()), "reponseQuestions", [], "any", false, false, false, 59), "html", null, true)) : ("Aucune réponse"));
        yield "</td>
            </tr>
            <tr>
                <th>Lettre motivation</th>
                <td>";
        // line 63
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["candidature"] ?? null), "lettreMotivation", [], "any", true, true, false, 63) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["candidature"]) || array_key_exists("candidature", $context) ? $context["candidature"] : (function () { throw new RuntimeError('Variable "candidature" does not exist.', 63, $this->source); })()), "lettreMotivation", [], "any", false, false, false, 63)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["candidature"]) || array_key_exists("candidature", $context) ? $context["candidature"] : (function () { throw new RuntimeError('Variable "candidature" does not exist.', 63, $this->source); })()), "lettreMotivation", [], "any", false, false, false, 63), "html", null, true)) : ("Aucune lettre de motivation"));
        yield "</td>
            </tr>
        </tbody>
    </table>

    <div class=\"mt-4\">
        <a href=\"";
        // line 69
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_candidature_index");
        yield "\" class=\"btn btn-secondary mr-2\">
            <i class=\"fas fa-arrow-left mr-1\"></i> Retour à la liste
        </a>
        <a href=\"";
        // line 72
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_candidature_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["candidature"]) || array_key_exists("candidature", $context) ? $context["candidature"] : (function () { throw new RuntimeError('Variable "candidature" does not exist.', 72, $this->source); })()), "id", [], "any", false, false, false, 72)]), "html", null, true);
        yield "\" class=\"btn btn-primary mr-2\">
            <i class=\"fas fa-edit mr-1\"></i> Modifier
        </a>
        ";
        // line 75
        yield Twig\Extension\CoreExtension::include($this->env, $context, "candidature/_delete_form.html.twig");
        yield "
    </div>
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
        return "candidature/show.html.twig";
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
        return array (  224 => 75,  218 => 72,  212 => 69,  203 => 63,  196 => 59,  190 => 55,  186 => 53,  179 => 50,  177 => 49,  170 => 44,  166 => 42,  162 => 40,  153 => 35,  143 => 28,  136 => 24,  131 => 22,  128 => 21,  126 => 20,  122 => 19,  119 => 18,  117 => 17,  109 => 12,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Candidature #{{ candidature.id }}{% endblock %}

{% block body %}
    <h1>Candidature</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>User ID</th>
                <td>{{ candidature.userId }}</td>
            </tr>
            <tr>
                <th>Mission associée</th>
                <td>
                    {% if candidature.missionId %}
                        <div class=\"d-flex align-items-center\">
                            <span class=\"mr-3\">Mission {{ candidature.missionId }}</span>
                            {% if qrCode %}
                                <div class=\"d-flex flex-column align-items-center\">
                                    <img src=\"{{ qrCode }}\" width=\"150\" class=\"img-thumbnail mb-2\">
                                    <div>
                                        <a href=\"{{ path('app_candidature_qrcode', {'id': candidature.id}) }}\" 
                                           class=\"btn btn-sm btn-outline-primary mr-2\">
                                            Voir QR Code
                                        </a>
                                        <a href=\"{{ path('app_mission_show', {'id': candidature.missionId}) }}\"
                                           class=\"btn btn-sm btn-outline-success\">
                                            Voir Détails Mission
                                        </a>
                                    </div>
                                </div>
                            {% else %}
                                <a href=\"{{ path('app_mission_show', {'id': candidature.missionId}) }}\"
                                   class=\"btn btn-sm btn-outline-primary\">
                                    Voir la Mission
                                </a>
                            {% endif %}
                        </div>
                    {% else %}
                        <span class=\"text-muted\">Aucune mission associée</span>
                    {% endif %}
                </td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    {% if candidature.image %}
                        <img src=\"{{ asset('uploads/candidatures/' ~ candidature.image) }}\" 
                             width=\"200\" class=\"img-thumbnail\">
                    {% else %}
                        <span class=\"text-muted\">Aucune image</span>
                    {% endif %}
                </td>
            </tr>
            <tr>
                <th>Réponses</th>
                <td>{{ candidature.reponseQuestions ?? 'Aucune réponse' }}</td>
            </tr>
            <tr>
                <th>Lettre motivation</th>
                <td>{{ candidature.lettreMotivation ?? 'Aucune lettre de motivation' }}</td>
            </tr>
        </tbody>
    </table>

    <div class=\"mt-4\">
        <a href=\"{{ path('app_candidature_index') }}\" class=\"btn btn-secondary mr-2\">
            <i class=\"fas fa-arrow-left mr-1\"></i> Retour à la liste
        </a>
        <a href=\"{{ path('app_candidature_edit', {'id': candidature.id}) }}\" class=\"btn btn-primary mr-2\">
            <i class=\"fas fa-edit mr-1\"></i> Modifier
        </a>
        {{ include('candidature/_delete_form.html.twig') }}
    </div>
{% endblock %}", "candidature/show.html.twig", "C:\\ProjetsSymfony\\my-project\\templates\\candidature\\show.html.twig");
    }
}
