<?php

namespace ApiControllers;

use Repositories\CustomerRepository;
use Repositories\OrderRepository;

class DashboardDataController
{
    public static function get(
        \DateTimeImmutable $start,
        \DateTimeImmutable $end,
        OrderRepository $orderRepository,
        CustomerRepository $customerRepository
    ) {
        $result = [];
        $result['orders_count'] = $orderRepository->countBetweenDates($start, $end);
        $result['customers_count'] = $customerRepository->countBetweenDates($start, $end);
        $result['revenue'] = $orderRepository->revenueBetweenDates($start, $end);
        header('Content-type: application/json');
        // die (var_dump($data));
        echo(json_encode($result));
    }
}