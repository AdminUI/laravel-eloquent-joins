<?php

namespace AdminUI\Laravel\EloquentJoin\Tests\Models;

use AdminUI\Laravel\EloquentJoin\Tests\Scope\TestExceptionScope;
use Illuminate\Database\Eloquent\SoftDeletes;

class LocationWithGlobalScope extends BaseModel
{
    use SoftDeletes;

    protected $table = 'locations';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new TestExceptionScope());
    }
}
