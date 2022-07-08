<?php

namespace AdminUI\Laravel\EloquentJoin\Relations;

use AdminUI\Laravel\EloquentJoin\Traits\JoinRelationTrait;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HasOneJoin extends HasOne
{
    use JoinRelationTrait;
}
