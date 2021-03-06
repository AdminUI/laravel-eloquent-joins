<?php

namespace AdminUI\Laravel\EloquentJoin\Tests\Tests;

use AdminUI\Laravel\EloquentJoin\Tests\Models\OrderItem;
use AdminUI\Laravel\EloquentJoin\Tests\TestCase;

class ClosureTest extends TestCase
{
    public function testNestOne()
    {
        OrderItem::where(function ($query) {
            $query
                ->orWhereJoin('order.id', '=', 1)
                ->orWhereJoin('order.id', '=', 2);
        })->get();

        $queryTest = 'select order_items.*
            from "order_items"
            left join "orders" on "orders"."id" = "order_items"."order_id"
            and "orders"."deleted_at" is null
            where ("orders"."id" = 1 or "orders"."id" = 2)
            and "order_items"."deleted_at" is null';

        $this->assertQueryMatches($queryTest, $this->fetchQuery());
    }

    public function testNestTwo()
    {
        OrderItem::where(function ($query) {
            $query
                ->orWhereJoin('order.id', '=', 1)
                ->orWhereJoin('order.id', '=', 2)
                ->where(function ($query) {
                    $query->orWhereJoin('order.seller.locationPrimary.id', '=', 3);
                });
        })->get();

        $queryTest = 'select order_items.*
            from "order_items"
            left join "orders" on "orders"."id" = "order_items"."order_id"
            and "orders"."deleted_at" is null
            left join "sellers" on "sellers"."id" = "orders"."seller_id"
            left join "locations" on "locations"."seller_id" = "sellers"."id"
            and "locations"."is_primary" = 1
            and "locations"."deleted_at" is null
            where ("orders"."id" = 1 or "orders"."id" = 2
            and ("locations"."id" = 3))
            and "order_items"."deleted_at" is null';

        $this->assertQueryMatches($queryTest, $this->fetchQuery());
    }
}
