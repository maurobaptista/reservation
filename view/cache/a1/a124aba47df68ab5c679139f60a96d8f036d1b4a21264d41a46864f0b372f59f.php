<?php

/* reservation/create.phtml */
class __TwigTemplate_a560d70b956b8c39a2cb0892ba835d5e9a9a8049d26329faae486e7f3728c6d5 extends Twig_Template
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
        $this->loadTemplate("reservation/_partial/1_user_info.phtml", "reservation/create.phtml", 1)->display($context);
    }

    public function getTemplateName()
    {
        return "reservation/create.phtml";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "reservation/create.phtml", "/usr/local/web/reservation.dev/htdocs/view/template/reservation/create.phtml");
    }
}
