<?php

namespace AdminUI\Laravel\EloquentJoin\Exceptions;

class InvalidDirection extends \Exception
{
    public $message = 'Invalid direction. Order direction must be either \'asc\' or \'desc\'';
}
