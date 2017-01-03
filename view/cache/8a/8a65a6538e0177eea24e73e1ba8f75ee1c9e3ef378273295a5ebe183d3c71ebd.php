<?php

/* reservation/_partial/1_user_info.phtml */
class __TwigTemplate_0ba7754032618833781d99e92c9e879e2959117485abc1971329e6f6770c20b2 extends Twig_Template
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
        echo "user info";
    }

    public function getTemplateName()
    {
        return "reservation/_partial/1_user_info.phtml";
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
        return new Twig_Source("", "reservation/_partial/1_user_info.phtml", "/usr/local/web/reservation.dev/htdocs/view/template/reservation/_partial/1_user_info.phtml");
    }
}
