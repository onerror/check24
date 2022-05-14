<?php

namespace Repositories;

class CustomerRepository extends AbstractRepository
{
    
    /**
     * @param \DateTimeImmutable $start
     * @param \DateTimeImmutable $end
     *
     * @return int
     */
    public function countBetweenDates(\DateTimeImmutable $start, \DateTimeImmutable $end): int
    {
        var_dump($start->getTimestamp());
        var_dump($end->getTimestamp());
        $stmt = $this->db->prepare(
            "
select count(distinct (c.id))
from customers c
	     join orders o on c.id = o.customer_id WHERE date(o.purchase_date) >= date(?) and date(o.purchase_date) <= date(?)"
        );
        $stmt->execute([$start->getTimestamp(), $end->getTimestamp()]);
        return (int)$stmt->fetchColumn();
    }
}