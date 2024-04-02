<?php

class Controller
{

    public function render($view, $model = "", $model2 = "", $model3 = "")
    {
        $model = $model;
        $model2 = $model2;
        $model3 = $model3;
        include  "views/" . $view . ".php";
    }
}
