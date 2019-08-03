<?php

namespace App\Http\Middleware;

use Closure;

class AdmissionTime
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $date = date('Y-m-d H:i:s');
        $message = '';
        $current_time = config('constants.current_time');
        $up_time = strtotime(config('constants.admission_up_time'));
        $down_time = strtotime(config('constants.admission_down_time'));
        if($current_time <= $up_time){
            $date = dateFormat($up_time, 'd-m-Y h:i a');
            $message = "Online admission will be available from {$date}";

        }elseif($current_time >= $down_time){
            $message = 'Online admission has been closed';
        }
        if($message){
            $local_debug = isset($_SERVER['REMOTE_ADDR']) ? in_array($_SERVER['REMOTE_ADDR'], array('110.235.205.141')): false;
            if(!$local_debug){
                $request->attributes->add(['message' => $message]);
                return redirect()->route('down')->with(['message'=>$message]);
            }
        }
        return $next($request);
    }
}
