<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = [
        'to',
        'from',
        'subject',
        'text',
    ];
    //
}
