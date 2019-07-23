<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use SoftDeletes;
    protected $guarded = [
        'id'
    ];

    public function getDocNameAttribute($value)
    {
    	return ucwords(str_replace("_", " ", $value));
    }
}
