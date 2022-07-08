<?php

namespace AdminUI\Laravel\EloquentJoin\Relations;

use AdminUI\Laravel\EloquentJoin\Traits\JoinRelationTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HasManyJoin extends HasMany
{
    use JoinRelationTrait;
}
