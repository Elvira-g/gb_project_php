<?php

include_once ('m/Catalog.php');

class C_Page extends C_Base
{
    public function action_index()
    {
        $catalog = new Catalog();
        $result = $catalog->showProducts();

        $this->title .= '::Каталог товаров';
        $this->content = $this->Template('v/public/v_catalog.php', array('result' => $result));

    }

}