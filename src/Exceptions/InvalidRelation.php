<?php

namespace AdminUI\Laravel\EloquentJoin\Exceptions;

class InvalidRelation extends \Exception
{
    public $message = 'Package allows only following relations : BelongsTo, HasOne and HasMany.';
}
