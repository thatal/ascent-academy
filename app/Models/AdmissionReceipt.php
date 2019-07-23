<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdmissionReceipt extends Model
{
    use SoftDeletes;
    
    protected $guarded = [
        'id'
    ];

    public function getCreatedAtAttribute($date)
	{
	    return date('d-m-Y',strtotime($date));
	}

	public function collections()
    {
        return $this->hasMany('App\Models\AdmissionCollection', 'receipt_id', 'id');
    }

    public function collectedBy()
    {
        if($this->colletion_done_by=='Admin')
            return $this->belongsTo('App\Models\Admin', 'colletion_done_by_id', 'id');
        else
            return $this->belongsTo('App\Models\Staff', 'colletion_done_by_id', 'id');
    }
}
