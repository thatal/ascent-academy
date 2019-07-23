<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdmissionCollection extends Model
{
    use SoftDeletes;
    
    protected $guarded = [
        'id'
    ];
	
	public function receipt()
    {
        return $this->belongsTo('App\Models\ApplicationReceipt', 'receipt_id');
    }
    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }
    public function application()
    {
        return $this->belongsTo('App\Models\Application', 'application_id');
    }
    public function feeHead()
    {
        return $this->belongsTo('App\Models\FeeHead', 'fee_head_id');
    }
    public function fee()
    {
        return $this->belongsTo('App\Models\Fee', 'fee_id');
    }
    
}
