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

/* includes/footer.html.twig */
class __TwigTemplate_b09510566a611c9e4c2ef633da433006 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "includes/footer.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "includes/footer.html.twig"));

        // line 2
        yield "<footer id=\"footer\" class=\"footer\">
    <div class=\"footer-top\">
        <div class=\"container\">
            <div class=\"row gy-4\">
                <div class=\"col-lg-5 col-md-12 footer-info\">
                    <a href=\"";
        // line 7
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"logo d-flex align-items-center\">
                        <img src=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("FlexStart/assets/img/logo.png"), "html", null, true);
        yield "\" alt=\"Logo\">
                        <span>FlexStart</span>
                    </a>
                    <p>Plateforme de gestion des missions et des candidatures.</p>
                    <div class=\"social-links mt-3\">
                        <a href=\"#\" class=\"twitter\"><i class=\"bi bi-twitter\"></i></a>
                        <a href=\"#\" class=\"facebook\"><i class=\"bi bi-facebook\"></i></a>
                        <a href=\"#\" class=\"instagram\"><i class=\"bi bi-instagram\"></i></a>
                        <a href=\"#\" class=\"linkedin\"><i class=\"bi bi-linkedin\"></i></a>
                    </div>
                </div>
                
                <div class=\"col-lg-3 col-md-12 footer-contact text-center text-md-start\">
                    <h4>Contact</h4>
                    <p>
                        123 Rue Exemple<br>
                        Paris, 75000<br>
                        France<br><br>
                        <strong>Téléphone:</strong> +33 1 23 45 67 89<br>
                        <strong>Email:</strong> contact@example.com<br>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <div class=\"container\">
        <div class=\"copyright\">
            &copy; Copyright <strong><span>";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield "</span></strong>. Tous droits réservés
        </div>
    </div>
</footer>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "includes/footer.html.twig";
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
        return array (  90 => 36,  59 => 8,  55 => 7,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/includes/footer.html.twig #}
<footer id=\"footer\" class=\"footer\">
    <div class=\"footer-top\">
        <div class=\"container\">
            <div class=\"row gy-4\">
                <div class=\"col-lg-5 col-md-12 footer-info\">
                    <a href=\"{{ path('app_home') }}\" class=\"logo d-flex align-items-center\">
                        <img src=\"{{ asset('FlexStart/assets/img/logo.png') }}\" alt=\"Logo\">
                        <span>FlexStart</span>
                    </a>
                    <p>Plateforme de gestion des missions et des candidatures.</p>
                    <div class=\"social-links mt-3\">
                        <a href=\"#\" class=\"twitter\"><i class=\"bi bi-twitter\"></i></a>
                        <a href=\"#\" class=\"facebook\"><i class=\"bi bi-facebook\"></i></a>
                        <a href=\"#\" class=\"instagram\"><i class=\"bi bi-instagram\"></i></a>
                        <a href=\"#\" class=\"linkedin\"><i class=\"bi bi-linkedin\"></i></a>
                    </div>
                </div>
                
                <div class=\"col-lg-3 col-md-12 footer-contact text-center text-md-start\">
                    <h4>Contact</h4>
                    <p>
                        123 Rue Exemple<br>
                        Paris, 75000<br>
                        France<br><br>
                        <strong>Téléphone:</strong> +33 1 23 45 67 89<br>
                        <strong>Email:</strong> contact@example.com<br>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <div class=\"container\">
        <div class=\"copyright\">
            &copy; Copyright <strong><span>{{ \"now\"|date('Y') }}</span></strong>. Tous droits réservés
        </div>
    </div>
</footer>", "includes/footer.html.twig", "C:\\ProjetsSymfony\\my-project\\templates\\includes\\footer.html.twig");
    }
}
