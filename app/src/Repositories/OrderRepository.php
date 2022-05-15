<?php

namespace Repositories;

class OrderRepository extends AbstractRepository
{
    /**
     * @param \DateTimeImmutable $start
     * @param \DateTimeImmutable $end
     *
     * @return int
     */
    public function countBetweenDates(\DateTimeImmutable $start, \DateTimeImmutable $end): int
    {
        $stmt = $this->db->prepare(
            "SELECT count(*) FROM orders o WHERE date(o.purchase_date) >= date(FROM_UNIXTIME(?/1000))
  and date(o.purchase_date) <= date(FROM_UNIXTIME(?/1000));"
        );
        $stmt->execute([$start->getTimestamp(), $end->getTimestamp()]);
        return (int)$stmt->fetchColumn();
    }
    
    public function revenueBetweenDates(\DateTimeImmutable $start, \DateTimeImmutable $end): int
    {
        $stmt = $this->db->prepare(
            "select sum(oi.price * oi.quantity)
from order_items oi
	     join orders o on oi.order_id = o.id
WHERE date(o.purchase_date) >= date(FROM_UNIXTIME(?/1000))
  and date(o.purchase_date) <= date(FROM_UNIXTIME(?/1000));"
        );
        $stmt->execute([$start->getTimestamp(), $end->getTimestamp()]);
        return (int)$stmt->fetchColumn();
    }
}