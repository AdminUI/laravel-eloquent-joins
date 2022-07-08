<?php

namespace AdminUI\Laravel\EloquentJoin\Traits;

use AdminUI\Laravel\EloquentJoin\Relations\BelongsToJoin;
use AdminUI\Laravel\EloquentJoin\Relations\HasManyJoin;
use AdminUI\Laravel\EloquentJoin\Relations\HasOneJoin;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait ExtendRelationsTrait
{
    protected function newBelongsTo(Builder $query, Model $child, $foreignKey, $ownerKey, $relation)
    {
        return new BelongsToJoin($query, $child, $foreignKey, $ownerKey, $relation);
    }

    protected function newHasOne(Builder $query, Model $parent, $foreignKey, $localKey)
    {
        return new HasOneJoin($query, $parent, $foreignKey, $localKey);
    }

    protected function newHasMany(Builder $query, Model $parent, $foreignKey, $localKey)
    {
        return new HasManyJoin($query, $parent, $foreignKey, $localKey);
    }
}
