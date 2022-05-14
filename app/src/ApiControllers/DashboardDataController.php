<?php

namespace ApiControllers;

class DashboardDataController
{
    public static function get(\DateTimeImmutable $start, \DateTimeImmutable $end)
    {
        header('Content-type: application/json');
       // die (var_dump($data));
        echo (json_encode([7860, 1140, 1060, 1060, 1070, 1110, 1330, 2210, 7830, 2478]));
    }
}