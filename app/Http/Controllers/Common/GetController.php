<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Stream;
use App\Models\Subject;

class GetController extends Controller
{
	// public function __construct()
 //    {
 //        $this->middleware('auth');
 //    }

    public function getSemester(Request $request)
    {
        $semesters = Semester::where('course_id',$request->course_id)->get();
        $streams = Stream::where('course_id',$request->course_id);
        // if(!empty(config('constants.apply_stream'))){
        //     $streams = $streams->whereIn('id',config('constants.apply_stream'));
        // }
        $streams = $streams->get();
        return response()->json([
        	'semesters' => $semesters,
        	'streams' => $streams,
        ]);
    }
    public function getSubjects(Request $request)
    {
        $subjects = Subject::where('stream_id',$request->stream_id);
        if($request->parent_id){
        	$subjects = $subjects->where('parent_id',$request->parent_id);
        }else{
        	$subjects = $subjects->whereNull('parent_id');
        }
        $subjects = $subjects->get();
        return response()->json([
        	'subjects' => $subjects,
        ]);
    }

    public function getMoreSubjects(Request $request)
    {
        $moreSubject = Subject::where('stream_id',$request->stream_id)->where('parent_id',$request->parent_id)->get();
        return response()->json($moreSubject);
    }
}
