<?php

include_once ('m/Catalog.php');

class C_Product extends C_Base
{

    public function action_about()
    {
        $description = new Catalog();
        $desc = $description->aboutProduct($_GET['id']);

        $this->title .= ':: Описание товара';
        $this->content = $this->Template('v/public/v_about.php', array('product' => $desc));
    }
}
