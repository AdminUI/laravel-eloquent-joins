<?php

namespace AdminUI\Laravel\EloquentJoin\Tests\Tests\Clauses;

use AdminUI\Laravel\EloquentJoin\Tests\Models\Order;
use AdminUI\Laravel\EloquentJoin\Tests\TestCase;

class WhereTest extends TestCase
{
    public function testWhere()
    {
        Order::joinRelations('seller')
            ->whereJoin('seller.id', '=', 1)
            ->get();

        $queryTest = 'select orders.*
            from "orders"
            left join "sellers" on "sellers"."id" = "orders"."seller_id"
            where "sellers"."id" = 1
            and "orders"."deleted_at" is null
            group by "orders"."id"';

        $this->assertQueryMatches($queryTest, $this->fetchQuery());
    }
}
