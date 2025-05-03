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

/* mission/pdf.html.twig */
class __TwigTemplate_f087b1fade1e987367e65817f0580c4c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mission/pdf.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mission/pdf.html.twig"));

        // line 2
        yield "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <title>Mission ";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 6, $this->source); })()), "titre", [], "any", false, false, false, 6), "html", null, true);
        yield " - ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 6, $this->source); })()), "nomEntreprise", [], "any", false, false, false, 6), "html", null, true);
        yield "</title>
    <style>
        /* Base Styling */
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Header */
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #4154f1;
        }
        .header h1 {
            color: #4154f1;
            margin-bottom: 5px;
            font-size: 24px;
        }
        .header .ref {
            color: #666;
            font-size: 14px;
        }
        
        /* Company Info */
        .company-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .company-name {
            font-weight: bold;
            color: #4154f1;
        }
        
        /* Details Table */
        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        .details-table th {
            background-color: #4154f1;
            color: white;
            text-align: left;
            padding: 10px;
            width: 30%;
        }
        .details-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .details-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        /* Content Sections */
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            color: #4154f1;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
            margin-bottom: 10px;
            font-size: 18px;
        }
        
        /* Skills */
        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        .skill-badge {
            background-color: #eef2ff;
            color: #4154f1;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        /* Footer */
        .footer {
            margin-top: 40px;
            padding-top: 10px;
            border-top: 1px solid #eee;
            font-size: 11px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class=\"header\">
        <h1>";
        // line 108
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 108, $this->source); })()), "titre", [], "any", false, false, false, 108), "html", null, true);
        yield "</h1>
    </div>
    
    <div class=\"company-info\">
        <span class=\"company-name\">";
        // line 112
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["mission"] ?? null), "nomEntreprise", [], "any", true, true, false, 112) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 112, $this->source); })()), "nomEntreprise", [], "any", false, false, false, 112)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 112, $this->source); })()), "nomEntreprise", [], "any", false, false, false, 112), "html", null, true)) : ("Entreprise non spécifiée"));
        yield "</span>
    </div>
    
    <table class=\"details-table\">
        <tr>
            <th>Date de publication</th>
            <td>";
        // line 118
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 118, $this->source); })()), "datePub", [], "any", false, false, false, 118)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 118, $this->source); })()), "datePub", [], "any", false, false, false, 118), "d/m/Y"), "html", null, true)) : ("Non spécifiée"));
        yield "</td>
        </tr>
        <tr>
            <th>Durée</th>
            <td>";
        // line 122
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["mission"] ?? null), "duree", [], "any", true, true, false, 122) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 122, $this->source); })()), "duree", [], "any", false, false, false, 122)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 122, $this->source); })()), "duree", [], "any", false, false, false, 122), "html", null, true)) : ("0"));
        yield " jours</td>
        </tr>
        <tr>
            <th>Budget</th>
            <td>";
        // line 126
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["mission"] ?? null), "budget", [], "any", true, true, false, 126) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 126, $this->source); })()), "budget", [], "any", false, false, false, 126)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 126, $this->source); })()), "budget", [], "any", false, false, false, 126), "html", null, true)) : ("0"));
        yield " €</td>
        </tr>
        <tr>
            <th>Compétences</th>
            <td>
                <div class=\"skills-container\">
                    ";
        // line 132
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 132, $this->source); })()), "competance", [], "any", false, false, false, 132)) {
            // line 133
            yield "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::split($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 133, $this->source); })()), "competance", [], "any", false, false, false, 133), "/"));
            foreach ($context['_seq'] as $context["_key"] => $context["competence"]) {
                // line 134
                yield "                            <span class=\"skill-badge\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::trim($context["competence"]), "html", null, true);
                yield "</span>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['competence'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 136
            yield "                    ";
        } else {
            // line 137
            yield "                        <span>Aucune compétence spécifiée</span>
                    ";
        }
        // line 139
        yield "                </div>
            </td>
        </tr>
    </table>
    
    <div class=\"section\">
        <h3 class=\"section-title\">Description de la mission</h3>
        <p>";
        // line 146
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["mission"] ?? null), "description", [], "any", true, true, false, 146) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 146, $this->source); })()), "description", [], "any", false, false, false, 146)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 146, $this->source); })()), "description", [], "any", false, false, false, 146), "html", null, true)) : ("Aucune description fournie"));
        yield "</p>
    </div>
    
    ";
        // line 149
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 149, $this->source); })()), "questions", [], "any", false, false, false, 149)) {
            // line 150
            yield "    <div class=\"section\">
        <h3 class=\"section-title\">Questions spécifiques</h3>
        <p>";
            // line 152
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mission"]) || array_key_exists("mission", $context) ? $context["mission"] : (function () { throw new RuntimeError('Variable "mission" does not exist.', 152, $this->source); })()), "questions", [], "any", false, false, false, 152), "html", null, true);
            yield "</p>
    </div>
    ";
        }
        // line 155
        yield "    
    <div class=\"footer\">
        <p>Document généré le ";
        // line 157
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "d/m/Y à H:i"), "html", null, true);
        yield " via ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 157, $this->source); })()), "request", [], "any", false, false, false, 157), "getSchemeAndHttpHost", [], "method", false, false, false, 157), "html", null, true);
        yield "</p>
    </div>
</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "mission/pdf.html.twig";
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
        return array (  254 => 157,  250 => 155,  244 => 152,  240 => 150,  238 => 149,  232 => 146,  223 => 139,  219 => 137,  216 => 136,  207 => 134,  202 => 133,  200 => 132,  191 => 126,  184 => 122,  177 => 118,  168 => 112,  161 => 108,  54 => 6,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/mission/pdf.html.twig #}
<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <title>Mission {{ mission.titre }} - {{ mission.nomEntreprise }}</title>
    <style>
        /* Base Styling */
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Header */
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #4154f1;
        }
        .header h1 {
            color: #4154f1;
            margin-bottom: 5px;
            font-size: 24px;
        }
        .header .ref {
            color: #666;
            font-size: 14px;
        }
        
        /* Company Info */
        .company-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .company-name {
            font-weight: bold;
            color: #4154f1;
        }
        
        /* Details Table */
        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        .details-table th {
            background-color: #4154f1;
            color: white;
            text-align: left;
            padding: 10px;
            width: 30%;
        }
        .details-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .details-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        /* Content Sections */
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            color: #4154f1;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
            margin-bottom: 10px;
            font-size: 18px;
        }
        
        /* Skills */
        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        .skill-badge {
            background-color: #eef2ff;
            color: #4154f1;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        /* Footer */
        .footer {
            margin-top: 40px;
            padding-top: 10px;
            border-top: 1px solid #eee;
            font-size: 11px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class=\"header\">
        <h1>{{ mission.titre }}</h1>
    </div>
    
    <div class=\"company-info\">
        <span class=\"company-name\">{{ mission.nomEntreprise ?? 'Entreprise non spécifiée' }}</span>
    </div>
    
    <table class=\"details-table\">
        <tr>
            <th>Date de publication</th>
            <td>{{ mission.datePub ? mission.datePub|date('d/m/Y') : 'Non spécifiée' }}</td>
        </tr>
        <tr>
            <th>Durée</th>
            <td>{{ mission.duree ?? '0' }} jours</td>
        </tr>
        <tr>
            <th>Budget</th>
            <td>{{ mission.budget ?? '0' }} €</td>
        </tr>
        <tr>
            <th>Compétences</th>
            <td>
                <div class=\"skills-container\">
                    {% if mission.competance %}
                        {% for competence in mission.competance|split('/') %}
                            <span class=\"skill-badge\">{{ competence|trim }}</span>
                        {% endfor %}
                    {% else %}
                        <span>Aucune compétence spécifiée</span>
                    {% endif %}
                </div>
            </td>
        </tr>
    </table>
    
    <div class=\"section\">
        <h3 class=\"section-title\">Description de la mission</h3>
        <p>{{ mission.description ?? 'Aucune description fournie' }}</p>
    </div>
    
    {% if mission.questions %}
    <div class=\"section\">
        <h3 class=\"section-title\">Questions spécifiques</h3>
        <p>{{ mission.questions }}</p>
    </div>
    {% endif %}
    
    <div class=\"footer\">
        <p>Document généré le {{ \"now\"|date('d/m/Y à H:i') }} via {{ app.request.getSchemeAndHttpHost() }}</p>
    </div>
</body>
</html>", "mission/pdf.html.twig", "C:\\ProjetsSymfony\\my-project\\templates\\mission\\pdf.html.twig");
    }
}
