<?php

namespace AdminUI\Laravel\EloquentJoin\Tests\Tests;

use AdminUI\Laravel\EloquentJoin\Exceptions\InvalidAggregateMethod;
use AdminUI\Laravel\EloquentJoin\Exceptions\InvalidDirection;
use AdminUI\Laravel\EloquentJoin\Exceptions\InvalidRelation;
use AdminUI\Laravel\EloquentJoin\Exceptions\InvalidRelationClause;
use AdminUI\Laravel\EloquentJoin\Exceptions\InvalidRelationGlobalScope;
use AdminUI\Laravel\EloquentJoin\Exceptions\InvalidRelationWhere;
use AdminUI\Laravel\EloquentJoin\Tests\Models\City;
use AdminUI\Laravel\EloquentJoin\Tests\Models\Seller;
use AdminUI\Laravel\EloquentJoin\Tests\TestCase;

class ExceptionTest extends TestCase
{
    public function testInvalidRelation()
    {
        try {
            City::whereJoin('sellers.id', '=', 'test')->get();
        } catch (InvalidRelation $e) {
            $this->assertEquals((new InvalidRelation())->message, $e->getMessage());

            return;
        }

        $this->assertTrue(false);
    }

    public function testInvalidRelationWhere()
    {
        try {
            Seller::whereJoin('locationPrimaryInvalid2.name', '=', 'test')->get();
        } catch (InvalidRelationWhere $e) {
            $this->assertEquals((new InvalidRelationWhere())->message, $e->getMessage());

            return;
        }

        $this->assertTrue(false);
    }

    public function testInvalidRelationClause()
    {
        try {
            Seller::whereJoin('locationPrimaryInvalid.name', '=', 'test')->get();
        } catch (InvalidRelationClause $e) {
            $this->assertEquals((new InvalidRelationClause())->message, $e->getMessage());

            return;
        }

        $this->assertTrue(false);
    }

    public function testInvalidRelationGlobalScope()
    {
        try {
            Seller::whereJoin('locationPrimaryInvalid3.id', '=', 'test')->get();
        } catch (InvalidRelationGlobalScope $e) {
            $this->assertEquals((new InvalidRelationGlobalScope())->message, $e->getMessage());

            return;
        }

        $this->assertTrue(false);
    }

    public function testInvalidAggregateMethod()
    {
        try {
            Seller::orderByJoin('locationPrimary.id', 'asc', 'wrong')->get();
        } catch (InvalidAggregateMethod $e) {
            $this->assertEquals((new InvalidAggregateMethod())->message, $e->getMessage());

            return;
        }

        $this->assertTrue(false);
    }

    public function testOrderByInvalidDirection()
    {
        $this->expectException(InvalidDirection::class);
        Seller::orderByJoin('locationPrimary.id', ';DROP TABLE orders;--', 'test')->get();
    }
}
