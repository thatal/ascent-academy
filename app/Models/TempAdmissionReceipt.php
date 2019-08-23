<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TempAdmissionReceipt extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id'
    ];

    public function getCreatedAtAttribute($date)
	{
	    return date('d-m-Y',strtotime($date));
	}

	public function tempCollections()
    {
        return $this->hasMany('App\Models\TempAdmissionCollection', 'temp_receipt_id', 'id');
    }

    public function collectedBy()
    {
        if($this->colletion_done_by=='Admin')
            return $this->belongsTo('App\Models\Admin', 'colletion_done_by_id', 'id');
        else
            return $this->belongsTo('App\Models\Staff', 'colletion_done_by_id', 'id');
    }

    public function onlinePayment()
    {
        return $this->hasMany('App\Models\OnlinePayment', 'temp_receipt_id', 'id');
    }
}
