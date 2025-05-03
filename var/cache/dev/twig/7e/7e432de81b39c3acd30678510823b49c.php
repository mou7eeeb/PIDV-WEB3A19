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

/* candidature/_form.html.twig */
class __TwigTemplate_83bcfbe884d7631a87be3a2ae9ddf200 extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "candidature/_form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "candidature/_form.html.twig"));

        // line 1
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 1, $this->source); })()), 'form_start', ["attr" => ["class" => "form-horizontal needs-validation", "novalidate" => "novalidate"]]);
        yield "

<div class=\"card card-primary\">
    <div class=\"card-header\">
        <h3 class=\"card-title\">";
        // line 5
        yield (((isset($context["edit_mode"]) || array_key_exists("edit_mode", $context) ? $context["edit_mode"] : (function () { throw new RuntimeError('Variable "edit_mode" does not exist.', 5, $this->source); })())) ? ("Modifier") : ("Nouvelle"));
        yield " Candidature</h3>
    </div>
    <div class=\"card-body\">
        <div class=\"row mb-3\">
            <div class=\"col-md-6\">
                <div class=\"form-group\">
                    ";
        // line 11
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 11, $this->source); })()), "userId", [], "any", false, false, false, 11), 'label', ["label_attr" => ["class" => "form-label"], "label" => "ID Utilisateur *"]);
        yield "
                    ";
        // line 12
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 12, $this->source); })()), "userId", [], "any", false, false, false, 12), 'widget', ["attr" => ["class" => ("form-control" . ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 12, $this->source); })()), "userId", [], "any", false, false, false, 12), "vars", [], "any", false, false, false, 12), "errors", [], "any", false, false, false, 12))) ? (" is-invalid") : ("")))]]);
        yield "
                    <div class=\"invalid-feedback\">
                        ";
        // line 14
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 14, $this->source); })()), "userId", [], "any", false, false, false, 14), 'errors');
        yield "
                    </div>
                </div>
            </div>
            <div class=\"col-md-6\">
                <div class=\"form-group\">
                    ";
        // line 20
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 20, $this->source); })()), "missionId", [], "any", false, false, false, 20), 'label', ["label_attr" => ["class" => "form-label"], "label" => "ID Mission *"]);
        yield "
                    ";
        // line 21
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 21, $this->source); })()), "missionId", [], "any", false, false, false, 21), 'widget', ["attr" => ["class" => ("form-control" . ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 21, $this->source); })()), "missionId", [], "any", false, false, false, 21), "vars", [], "any", false, false, false, 21), "errors", [], "any", false, false, false, 21))) ? (" is-invalid") : ("")))]]);
        yield "
                    <div class=\"invalid-feedback\">
                        ";
        // line 23
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 23, $this->source); })()), "missionId", [], "any", false, false, false, 23), 'errors');
        yield "
                    </div>
                </div>
            </div>
        </div>

        <div class=\"form-group mb-3\">
            ";
        // line 30
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 30, $this->source); })()), "lettreMotivation", [], "any", false, false, false, 30), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Lettre de motivation *"]);
        yield "
            ";
        // line 31
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 31, $this->source); })()), "lettreMotivation", [], "any", false, false, false, 31), 'widget', ["attr" => ["class" => ("form-control" . ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 33
(isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 33, $this->source); })()), "lettreMotivation", [], "any", false, false, false, 33), "vars", [], "any", false, false, false, 33), "errors", [], "any", false, false, false, 33))) ? (" is-invalid") : (""))), "rows" => 5]]);
        // line 36
        yield "
            <div class=\"invalid-feedback\">
                ";
        // line 38
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 38, $this->source); })()), "lettreMotivation", [], "any", false, false, false, 38), 'errors');
        yield "
            </div>
            <small class=\"form-text text-muted\">100 à 2000 caractères requis</small>
        </div>

        <div class=\"form-group mb-3\">
            ";
        // line 44
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 44, $this->source); })()), "reponseQuestions", [], "any", false, false, false, 44), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Réponses aux questions"]);
        yield "
            ";
        // line 45
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 45, $this->source); })()), "reponseQuestions", [], "any", false, false, false, 45), 'widget', ["attr" => ["class" => ("form-control" . ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 47
(isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 47, $this->source); })()), "reponseQuestions", [], "any", false, false, false, 47), "vars", [], "any", false, false, false, 47), "errors", [], "any", false, false, false, 47))) ? (" is-invalid") : (""))), "rows" => 5]]);
        // line 50
        yield "
            <div class=\"invalid-feedback\">
                ";
        // line 52
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 52, $this->source); })()), "reponseQuestions", [], "any", false, false, false, 52), 'errors');
        yield "
            </div>
            <small class=\"form-text text-muted\">Optionnel (max 2000 caractères)</small>
        </div>

        <div class=\"form-group mb-3\">
            ";
        // line 58
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 58, $this->source); })()), "imageFile", [], "any", false, false, false, 58), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Photo de profil"]);
        yield "
            <div class=\"custom-file\">
                ";
        // line 60
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 60, $this->source); })()), "imageFile", [], "any", false, false, false, 60), 'widget', ["attr" => ["class" => ("custom-file-input" . ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 62
(isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 62, $this->source); })()), "imageFile", [], "any", false, false, false, 62), "vars", [], "any", false, false, false, 62), "errors", [], "any", false, false, false, 62))) ? (" is-invalid") : ("")))]]);
        // line 64
        yield "
                <label class=\"custom-file-label\" for=\"candidature_imageFile\">Choisir un fichier</label>
            </div>
            <div class=\"invalid-feedback\">
                ";
        // line 68
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 68, $this->source); })()), "imageFile", [], "any", false, false, false, 68), 'errors');
        yield "
            </div>
            <small class=\"form-text text-muted\">Formats acceptés: JPG/PNG (max 2Mo)</small>
            
            ";
        // line 72
        if (((isset($context["edit_mode"]) || array_key_exists("edit_mode", $context) ? $context["edit_mode"] : (function () { throw new RuntimeError('Variable "edit_mode" does not exist.', 72, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 72, $this->source); })()), "vars", [], "any", false, false, false, 72), "value", [], "any", false, false, false, 72), "image", [], "any", false, false, false, 72))) {
            // line 73
            yield "                <div class=\"mt-2\">
                    <img src=\"";
            // line 74
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/candidatures/" . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 74, $this->source); })()), "vars", [], "any", false, false, false, 74), "value", [], "any", false, false, false, 74), "image", [], "any", false, false, false, 74))), "html", null, true);
            yield "\" alt=\"Photo actuelle\" class=\"img-thumbnail\" width=\"150\">
                    <p class=\"text-muted small mt-1\">Photo actuelle</p>
                </div>
            ";
        }
        // line 78
        yield "        </div>
    </div>
    <div class=\"card-footer text-right\">
        <button type=\"submit\" class=\"btn btn-primary\">
            <i class=\"fas fa-save\"></i> ";
        // line 82
        yield (((isset($context["edit_mode"]) || array_key_exists("edit_mode", $context) ? $context["edit_mode"] : (function () { throw new RuntimeError('Variable "edit_mode" does not exist.', 82, $this->source); })())) ? ("Mettre à jour") : ("Enregistrer"));
        yield "
        </button>
        <a href=\"";
        // line 84
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_candidature_index");
        yield "\" class=\"btn btn-default\">
            <i class=\"fas fa-times\"></i> Annuler
        </a>
    </div>
</div>

";
        // line 90
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 90, $this->source); })()), 'form_end');
        yield "

";
        // line 92
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

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

        // line 93
        yield "<script>
\$(document).ready(function() {
    // Affichage du nom du fichier sélectionné
    \$('.custom-file-input').on('change', function() {
        let fileName = \$(this).val().split('\\\\').pop();
        \$(this).next('.custom-file-label').addClass(\"selected\").html(fileName);
    });

    // Validation Bootstrap
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
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
        return "candidature/_form.html.twig";
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
        return array (  223 => 93,  200 => 92,  195 => 90,  186 => 84,  181 => 82,  175 => 78,  168 => 74,  165 => 73,  163 => 72,  156 => 68,  150 => 64,  148 => 62,  147 => 60,  142 => 58,  133 => 52,  129 => 50,  127 => 47,  126 => 45,  122 => 44,  113 => 38,  109 => 36,  107 => 33,  106 => 31,  102 => 30,  92 => 23,  87 => 21,  83 => 20,  74 => 14,  69 => 12,  65 => 11,  56 => 5,  49 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ form_start(form, {'attr': {'class': 'form-horizontal needs-validation', 'novalidate': 'novalidate'}}) }}

<div class=\"card card-primary\">
    <div class=\"card-header\">
        <h3 class=\"card-title\">{{ edit_mode ? 'Modifier' : 'Nouvelle' }} Candidature</h3>
    </div>
    <div class=\"card-body\">
        <div class=\"row mb-3\">
            <div class=\"col-md-6\">
                <div class=\"form-group\">
                    {{ form_label(form.userId, \"ID Utilisateur *\", {'label_attr': {'class': 'form-label'}}) }}
                    {{ form_widget(form.userId, {'attr': {'class': 'form-control' ~ (form.userId.vars.errors|length ? ' is-invalid' : '')}}) }}
                    <div class=\"invalid-feedback\">
                        {{ form_errors(form.userId) }}
                    </div>
                </div>
            </div>
            <div class=\"col-md-6\">
                <div class=\"form-group\">
                    {{ form_label(form.missionId, \"ID Mission *\", {'label_attr': {'class': 'form-label'}}) }}
                    {{ form_widget(form.missionId, {'attr': {'class': 'form-control' ~ (form.missionId.vars.errors|length ? ' is-invalid' : '')}}) }}
                    <div class=\"invalid-feedback\">
                        {{ form_errors(form.missionId) }}
                    </div>
                </div>
            </div>
        </div>

        <div class=\"form-group mb-3\">
            {{ form_label(form.lettreMotivation, \"Lettre de motivation *\", {'label_attr': {'class': 'form-label'}}) }}
            {{ form_widget(form.lettreMotivation, {
                'attr': {
                    'class': 'form-control' ~ (form.lettreMotivation.vars.errors|length ? ' is-invalid' : ''),
                    'rows': 5
                }
            }) }}
            <div class=\"invalid-feedback\">
                {{ form_errors(form.lettreMotivation) }}
            </div>
            <small class=\"form-text text-muted\">100 à 2000 caractères requis</small>
        </div>

        <div class=\"form-group mb-3\">
            {{ form_label(form.reponseQuestions, \"Réponses aux questions\", {'label_attr': {'class': 'form-label'}}) }}
            {{ form_widget(form.reponseQuestions, {
                'attr': {
                    'class': 'form-control' ~ (form.reponseQuestions.vars.errors|length ? ' is-invalid' : ''),
                    'rows': 5
                }
            }) }}
            <div class=\"invalid-feedback\">
                {{ form_errors(form.reponseQuestions) }}
            </div>
            <small class=\"form-text text-muted\">Optionnel (max 2000 caractères)</small>
        </div>

        <div class=\"form-group mb-3\">
            {{ form_label(form.imageFile, \"Photo de profil\", {'label_attr': {'class': 'form-label'}}) }}
            <div class=\"custom-file\">
                {{ form_widget(form.imageFile, {
                    'attr': {
                        'class': 'custom-file-input' ~ (form.imageFile.vars.errors|length ? ' is-invalid' : '')
                    }
                }) }}
                <label class=\"custom-file-label\" for=\"candidature_imageFile\">Choisir un fichier</label>
            </div>
            <div class=\"invalid-feedback\">
                {{ form_errors(form.imageFile) }}
            </div>
            <small class=\"form-text text-muted\">Formats acceptés: JPG/PNG (max 2Mo)</small>
            
            {% if edit_mode and form.vars.value.image %}
                <div class=\"mt-2\">
                    <img src=\"{{ asset('uploads/candidatures/' ~ form.vars.value.image) }}\" alt=\"Photo actuelle\" class=\"img-thumbnail\" width=\"150\">
                    <p class=\"text-muted small mt-1\">Photo actuelle</p>
                </div>
            {% endif %}
        </div>
    </div>
    <div class=\"card-footer text-right\">
        <button type=\"submit\" class=\"btn btn-primary\">
            <i class=\"fas fa-save\"></i> {{ edit_mode ? 'Mettre à jour' : 'Enregistrer' }}
        </button>
        <a href=\"{{ path('app_candidature_index') }}\" class=\"btn btn-default\">
            <i class=\"fas fa-times\"></i> Annuler
        </a>
    </div>
</div>

{{ form_end(form) }}

{% block javascripts %}
<script>
\$(document).ready(function() {
    // Affichage du nom du fichier sélectionné
    \$('.custom-file-input').on('change', function() {
        let fileName = \$(this).val().split('\\\\').pop();
        \$(this).next('.custom-file-label').addClass(\"selected\").html(fileName);
    });

    // Validation Bootstrap
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
});
</script>
{% endblock %}", "candidature/_form.html.twig", "C:\\ProjetsSymfony\\my-project\\templates\\candidature\\_form.html.twig");
    }
}
