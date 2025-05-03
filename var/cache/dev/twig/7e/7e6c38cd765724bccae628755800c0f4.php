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

/* mission/_form.html.twig */
class __TwigTemplate_b782138fb38751940a003ba96ca34e91 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mission/_form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mission/_form.html.twig"));

        // line 1
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 1, $this->source); })()), 'form_start', ["attr" => ["class" => "form-horizontal needs-validation"]]);
        yield "

    ";
        // line 4
        yield "    <div class=\"form-group row mb-4\">
        ";
        // line 5
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 5, $this->source); })()), "titre", [], "any", false, false, false, 5), 'label', ["label_attr" => ["class" => "col-sm-3 col-form-label"]]);
        yield "
        <div class=\"col-sm-9\">
            ";
        // line 7
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 7, $this->source); })()), "titre", [], "any", false, false, false, 7), 'widget');
        yield "
            ";
        // line 8
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 8, $this->source); })()), "titre", [], "any", false, false, false, 8), 'errors');
        yield "
            ";
        // line 9
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 9, $this->source); })()), "titre", [], "any", false, false, false, 9), 'help');
        yield "
        </div>
    </div>

    ";
        // line 14
        yield "    <div class=\"form-group row mb-4\">
        ";
        // line 15
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 15, $this->source); })()), "description", [], "any", false, false, false, 15), 'label', ["label_attr" => ["class" => "col-sm-3 col-form-label"]]);
        yield "
        <div class=\"col-sm-9\">
            ";
        // line 17
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 17, $this->source); })()), "description", [], "any", false, false, false, 17), 'widget');
        yield "
            ";
        // line 18
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 18, $this->source); })()), "description", [], "any", false, false, false, 18), 'errors');
        yield "
            ";
        // line 19
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 19, $this->source); })()), "description", [], "any", false, false, false, 19), 'help');
        yield "
        </div>
    </div>

    ";
        // line 24
        yield "    <div class=\"row mb-4\">
        <div class=\"col-md-6\">
            <div class=\"form-group row\">
                ";
        // line 27
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 27, $this->source); })()), "competance", [], "any", false, false, false, 27), 'label', ["label_attr" => ["class" => "col-sm-6 col-form-label"]]);
        yield "
                <div class=\"col-sm-6\">
                    ";
        // line 29
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 29, $this->source); })()), "competance", [], "any", false, false, false, 29), 'widget');
        yield "
                    ";
        // line 30
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 30, $this->source); })()), "competance", [], "any", false, false, false, 30), 'errors');
        yield "
                </div>
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group row\">
                ";
        // line 36
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 36, $this->source); })()), "datePub", [], "any", false, false, false, 36), 'label', ["label_attr" => ["class" => "col-sm-6 col-form-label"]]);
        yield "
                <div class=\"col-sm-6\">
                    ";
        // line 38
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 38, $this->source); })()), "datePub", [], "any", false, false, false, 38), 'widget');
        yield "
                    ";
        // line 39
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 39, $this->source); })()), "datePub", [], "any", false, false, false, 39), 'errors');
        yield "
                </div>
            </div>
        </div>
    </div>

    ";
        // line 46
        yield "    <div class=\"row mb-4\">
        <div class=\"col-md-6\">
            <div class=\"form-group row\">
                ";
        // line 49
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 49, $this->source); })()), "duree", [], "any", false, false, false, 49), 'label', ["label_attr" => ["class" => "col-sm-6 col-form-label"]]);
        yield "
                <div class=\"col-sm-6\">
                    ";
        // line 51
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), "duree", [], "any", false, false, false, 51), 'widget');
        yield "
                    ";
        // line 52
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 52, $this->source); })()), "duree", [], "any", false, false, false, 52), 'errors');
        yield "
                </div>
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group row\">
                ";
        // line 58
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 58, $this->source); })()), "budget", [], "any", false, false, false, 58), 'label', ["label_attr" => ["class" => "col-sm-6 col-form-label"]]);
        yield "
                <div class=\"col-sm-6\">
                    ";
        // line 60
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 60, $this->source); })()), "budget", [], "any", false, false, false, 60), 'widget');
        yield "
                    ";
        // line 61
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 61, $this->source); })()), "budget", [], "any", false, false, false, 61), 'errors');
        yield "
                </div>
            </div>
        </div>
    </div>

    ";
        // line 68
        yield "    <div class=\"form-group row mb-4\">
        ";
        // line 69
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 69, $this->source); })()), "questions", [], "any", false, false, false, 69), 'label', ["label_attr" => ["class" => "col-sm-3 col-form-label"]]);
        yield "
        <div class=\"col-sm-9\">
            ";
        // line 71
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 71, $this->source); })()), "questions", [], "any", false, false, false, 71), 'widget');
        yield "
            ";
        // line 72
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 72, $this->source); })()), "questions", [], "any", false, false, false, 72), 'errors');
        yield "
        </div>
    </div>

    ";
        // line 77
        yield "    <div class=\"form-group row mb-4\">
        ";
        // line 78
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 78, $this->source); })()), "nomEntreprise", [], "any", false, false, false, 78), 'label', ["label_attr" => ["class" => "col-sm-3 col-form-label"]]);
        yield "
        <div class=\"col-sm-9\">
            ";
        // line 80
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 80, $this->source); })()), "nomEntreprise", [], "any", false, false, false, 80), 'widget');
        yield "
            ";
        // line 81
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 81, $this->source); })()), "nomEntreprise", [], "any", false, false, false, 81), 'errors');
        yield "
        </div>
    </div>

    ";
        // line 86
        yield "    <div class=\"form-group row\">
        <div class=\"col-sm-9 offset-sm-3\">
            ";
        // line 88
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 88, $this->source); })()), "submit", [], "any", false, false, false, 88), 'widget');
        yield "
        </div>
    </div>

";
        // line 92
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 92, $this->source); })()), 'form_end');
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "mission/_form.html.twig";
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
        return array (  230 => 92,  223 => 88,  219 => 86,  212 => 81,  208 => 80,  203 => 78,  200 => 77,  193 => 72,  189 => 71,  184 => 69,  181 => 68,  172 => 61,  168 => 60,  163 => 58,  154 => 52,  150 => 51,  145 => 49,  140 => 46,  131 => 39,  127 => 38,  122 => 36,  113 => 30,  109 => 29,  104 => 27,  99 => 24,  92 => 19,  88 => 18,  84 => 17,  79 => 15,  76 => 14,  69 => 9,  65 => 8,  61 => 7,  56 => 5,  53 => 4,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ form_start(form, {'attr': {'class': 'form-horizontal needs-validation'}}) }}

    {# Titre #}
    <div class=\"form-group row mb-4\">
        {{ form_label(form.titre, null, {'label_attr': {'class': 'col-sm-3 col-form-label'}}) }}
        <div class=\"col-sm-9\">
            {{ form_widget(form.titre) }}
            {{ form_errors(form.titre) }}
            {{ form_help(form.titre) }}
        </div>
    </div>

    {# Description #}
    <div class=\"form-group row mb-4\">
        {{ form_label(form.description, null, {'label_attr': {'class': 'col-sm-3 col-form-label'}}) }}
        <div class=\"col-sm-9\">
            {{ form_widget(form.description) }}
            {{ form_errors(form.description) }}
            {{ form_help(form.description) }}
        </div>
    </div>

    {# Compétence et Date #}
    <div class=\"row mb-4\">
        <div class=\"col-md-6\">
            <div class=\"form-group row\">
                {{ form_label(form.competance, null, {'label_attr': {'class': 'col-sm-6 col-form-label'}}) }}
                <div class=\"col-sm-6\">
                    {{ form_widget(form.competance) }}
                    {{ form_errors(form.competance) }}
                </div>
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group row\">
                {{ form_label(form.datePub, null, {'label_attr': {'class': 'col-sm-6 col-form-label'}}) }}
                <div class=\"col-sm-6\">
                    {{ form_widget(form.datePub) }}
                    {{ form_errors(form.datePub) }}
                </div>
            </div>
        </div>
    </div>

    {# Durée et Budget #}
    <div class=\"row mb-4\">
        <div class=\"col-md-6\">
            <div class=\"form-group row\">
                {{ form_label(form.duree, null, {'label_attr': {'class': 'col-sm-6 col-form-label'}}) }}
                <div class=\"col-sm-6\">
                    {{ form_widget(form.duree) }}
                    {{ form_errors(form.duree) }}
                </div>
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group row\">
                {{ form_label(form.budget, null, {'label_attr': {'class': 'col-sm-6 col-form-label'}}) }}
                <div class=\"col-sm-6\">
                    {{ form_widget(form.budget) }}
                    {{ form_errors(form.budget) }}
                </div>
            </div>
        </div>
    </div>

    {# Questions #}
    <div class=\"form-group row mb-4\">
        {{ form_label(form.questions, null, {'label_attr': {'class': 'col-sm-3 col-form-label'}}) }}
        <div class=\"col-sm-9\">
            {{ form_widget(form.questions) }}
            {{ form_errors(form.questions) }}
        </div>
    </div>

    {# Entreprise #}
    <div class=\"form-group row mb-4\">
        {{ form_label(form.nomEntreprise, null, {'label_attr': {'class': 'col-sm-3 col-form-label'}}) }}
        <div class=\"col-sm-9\">
            {{ form_widget(form.nomEntreprise) }}
            {{ form_errors(form.nomEntreprise) }}
        </div>
    </div>

    {# Bouton de soumission #}
    <div class=\"form-group row\">
        <div class=\"col-sm-9 offset-sm-3\">
            {{ form_widget(form.submit) }}
        </div>
    </div>

{{ form_end(form) }}", "mission/_form.html.twig", "C:\\ProjetsSymfony\\my-project\\templates\\mission\\_form.html.twig");
    }
}
