<?php

namespace AdminUI\Laravel\EloquentJoin\Tests\Tests;

use AdminUI\Laravel\EloquentJoin\EloquentJoinBuilder;
use AdminUI\Laravel\EloquentJoin\Tests\Models\City;
use AdminUI\Laravel\EloquentJoin\Tests\TestCase;

class OptionsTest extends TestCase
{
    public function testUseTableAlias()
    {
        $city = new City();
        $this->assertEquals(false, $city->newModelQuery()->isUseTableAlias());
        $city->useTableAlias = true;
        $this->assertEquals(true, $city->newModelQuery()->isUseTableAlias());
    }

    public function testAppendRelationsCount()
    {
        $city = new City();
        $this->assertEquals(false, $city->newModelQuery()->isAppendRelationsCount());
        $city->appendRelationsCount = true;
        $this->assertEquals(true, $city->newModelQuery()->isAppendRelationsCount());
    }

    public function testLeftJoin()
    {
        $city = new City();
        $this->assertEquals(true, $city->newModelQuery()->isLeftJoin());
        $city->leftJoin = false;
        $this->assertEquals(false, $city->newModelQuery()->isLeftJoin());
    }

    public function testAggregateMethod()
    {
        $city = new City();
        $this->assertEquals(EloquentJoinBuilder::AGGREGATE_MAX, $city->newModelQuery()->getAggregateMethod());
        $city->aggregateMethod = EloquentJoinBuilder::AGGREGATE_MIN;
        $this->assertEquals(EloquentJoinBuilder::AGGREGATE_MIN, $city->newModelQuery()->getAggregateMethod());
    }
}
