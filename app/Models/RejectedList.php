<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RejectedList extends Model
{
	use SoftDeletes;
    protected $guarded = [
        'id'
    ];
}
