<?php

/* welcome.twig */
class __TwigTemplate_b3a9ffe13be4779ca2f9cce4dfe8f67b741170dbbcaf8cffb09f15bf1841c8d3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "Twig is ";
        echo twig_escape_filter($this->env, (isset($context["status"]) ? $context["status"] : null), "html", null, true);
        echo "!";
    }

    public function getTemplateName()
    {
        return "welcome.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* Twig is {{ status  }}!*/
