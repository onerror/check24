<?php

namespace FrontControllers;

use Views\MainPageView;

/**
 *
 */
class DashboardController
{
    
    private static $dateFormatForDiagrams = 'm/d/Y';
    
    public static function mainPage()
    {
        $data = [
            'start' => (new \DateTimeImmutable('first day of this month'))->format(self::$dateFormatForDiagrams),
            'end' => (new \DateTimeImmutable('last day of this month'))->format(self::$dateFormatForDiagrams)
        ];
        MainPageView::render($data);
    }
}