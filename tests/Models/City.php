<?php

namespace AdminUI\Laravel\EloquentJoin\Tests\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class City extends BaseModel
{
    use SoftDeletes;

    protected $table = 'cities';

    protected $fillable = ['name'];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function zipCodePrimary()
    {
        return $this->hasOne(ZipCode::class)
            ->where('is_primary', '=', 1);
    }

    public function sellers()
    {
        return $this->belongsToMany(Seller::class, 'locations', 'seller_id', 'city_id');
    }

    public function zipCodes()
    {
        return $this->hasMany(ZipCode::class);
    }
}
