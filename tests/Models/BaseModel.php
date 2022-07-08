<?php

namespace AdminUI\Laravel\EloquentJoin\Tests\Models;

use AdminUI\Laravel\EloquentJoin\Traits\EloquentJoin;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use EloquentJoin;
}
