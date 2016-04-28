<?php

/* note\list.twig */
class __TwigTemplate_1684f810413209753e2e70c9c860ae2e5aada35ef9f7c23c9b55396b0d8ffa44 extends Twig_Template
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
        echo "<?php
include_once __DIR__. '/../../views/layouts/header.php'; ?>

";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["status"]) ? $context["status"] : null), "html", null, true);
        echo "
<h1>Guest Book</h1>
<div class=\"component\">
    <?php
    foreach (\$data['notes'] as \$aNote) {
        echo '<div class=\"article\">';
        echo '<h1>' . \$aNote->name . '</h1>';
        echo '<a href=\"mailto:' . \$aNote->email . '\">' . \$aNote->email . '</a><br>';
        echo '<a href=\"' . \$aNote->website . '\">' . \$aNote->website . '</a><br>';
        echo '<p>' . \$aNote->message . '</p>';
        echo '</div>';
    }
    ?>
</div>

<?php include_once __DIR__.  '/../../views/layouts/footer.php'; ?>


";
    }

    public function getTemplateName()
    {
        return "note\\list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 4,  19 => 1,);
    }
}
/* <?php*/
/* include_once __DIR__. '/../../views/layouts/header.php'; ?>*/
/* */
/* {{ status }}*/
/* <h1>Guest Book</h1>*/
/* <div class="component">*/
/*     <?php*/
/*     foreach ($data['notes'] as $aNote) {*/
/*         echo '<div class="article">';*/
/*         echo '<h1>' . $aNote->name . '</h1>';*/
/*         echo '<a href="mailto:' . $aNote->email . '">' . $aNote->email . '</a><br>';*/
/*         echo '<a href="' . $aNote->website . '">' . $aNote->website . '</a><br>';*/
/*         echo '<p>' . $aNote->message . '</p>';*/
/*         echo '</div>';*/
/*     }*/
/*     ?>*/
/* </div>*/
/* */
/* <?php include_once __DIR__.  '/../../views/layouts/footer.php'; ?>*/
/* */
/* */
/* */
