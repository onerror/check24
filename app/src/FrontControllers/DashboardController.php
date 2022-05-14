<?php
namespace FrontControllers;

use Views\MainPageView;

/**
 *
 */
class DashboardController{
    public function mainPage(){
        $data =[];
        echo ('cntroller');
		MainPageView::render($data);
    }
}