<?php

namespace AdminUI\Laravel\EloquentJoin\Tests\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class LocationAddress extends BaseModel
{
    use SoftDeletes;

    protected $table = 'location_addresses';

    protected $fillable = ['address', 'is_primary'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
