<?php

namespace AdminUI\Laravel\EloquentJoin\Tests\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends BaseModel
{
    use SoftDeletes;

    protected $table = 'orders';

    protected $fillable = ['number', 'seller_id'];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
