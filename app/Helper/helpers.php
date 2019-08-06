<?php
use App\Models\Application;
use App\Models\DailyLog;
use App\Models\Reservation;

function saveLogs($user_id, $username, $guard, $activity)
{
    $log = [];
    $log['user_id'] = $user_id;
    $log['username'] = $username;
    $log['guard'] = $guard;
    $log['activity'] = $activity;
    $log['url'] = \Request::fullUrl();
    $log['method'] = \Request::method();
    $log['ip'] = \Request::ip();
    $log['agent'] = \Request::header('user-agent');
    DailyLog::create($log);
}
function dumpp($data)
{
    echo '<pre class="sf-dump">';
    print_r($data);
    echo "</pre>";
}
function is_new_admission($semester_id)
{
    if (in_array($semester_id, [1, 3, 9])) {
        return 1;
    } else {
        return 0;
    }
}

function getFeeStructure($application, $fee_structures)
{
    $total = 0;
    $free_total = 0;
    $self_ids = [19, 21, 22, 23, 24, 25, 26, 27, 28];
    // for only degree
    if ($application->course_id == 2) {
        $removing_ids = [19, 21, 22, 23, 24, 25, 26, 27, 28];
        $self_ids = [19, 21, 22, 23, 24, 25, 26, 27, 28];
        // condition should == because removing id may different from fee structure
        if (in_array($application->appliedStream->stream_id, [4, 6])) {
            // for major subjects
            // if course id is major search from appliedMajorSubjects
            $major_subject_name = $application->appliedMajorSubjects->subject->name;
            // if major subject is psychology or Home Science removestructure id [22,23,24,25,26,28]
            if (strtolower(trim($major_subject_name)) == "home science") {
                if (($key = array_search(21, $removing_ids)) !== false) {
                    unset($removing_ids[$key]);
                }
            }
            if (strtolower(trim($major_subject_name)) == "psychology") {
                if (($key = array_search(22, $removing_ids)) !== false) {
                    unset($removing_ids[$key]);
                }
            }
        }
        // for all stream ids
        $applied_generic_subjects = $application->appliedSubjects->where("is_major", 0);
        foreach ($applied_generic_subjects as $index_g => $generic_subject) {
            if (strtolower(trim($generic_subject->subject->name)) == "computer science & application") {
                if (($key = array_search(19, $removing_ids)) !== false) {
                    unset($removing_ids[$key]);
                }
            }
            if (strtolower(trim($generic_subject->subject->name)) == "computer science") {
                if (($key = array_search(19, $removing_ids)) !== false) {
                    unset($removing_ids[$key]);
                }
            }
            if (strtolower(trim($generic_subject->subject->name)) == "home science") {
                if (($key = array_search(23, $removing_ids)) !== false) {
                    unset($removing_ids[$key]);
                }
            }
            if (strtolower(trim($generic_subject->subject->name)) == "psychology") {
                if (($key = array_search(24, $removing_ids)) !== false) {
                    unset($removing_ids[$key]);
                }
            }
            if (strtolower(trim($generic_subject->subject->name)) == "sociology") {
                if (($key = array_search(25, $removing_ids)) !== false) {
                    unset($removing_ids[$key]);
                }
            }
            if (strtolower(trim($generic_subject->subject->name)) == "boro") {
                if (($key = array_search(26, $removing_ids)) !== false) {
                    unset($removing_ids[$key]);
                }
            }
            if (stripos(strtolower(trim($generic_subject->subject->name)), "tourism") !== false || stripos(strtolower(trim($generic_subject->subject->name)), "ttm") !== false) {
                if (($key = array_search(27, $removing_ids)) !== false) {
                    unset($removing_ids[$key]);
                }
            }
        }
        $fee_structures = $fee_structures->whereNotIn("fee_head_id", $removing_ids);
    }
    if ($application->course_id == 1) {
        $removing_ids = [19, 28];
        $self_ids = [19, 28];
        if($application->free_admission == "yes"){
            if (($key = array_search(28, $removing_ids)) !== false) {
                unset($removing_ids[$key]);
            }
        }
        $applied_subjects = $application->appliedSubjects;
        foreach ($applied_subjects as $index_g => $applied_subject) {
            if (strtolower(trim($applied_subject->subject->name)) == "computer science") {
                if (($key = array_search(19, $removing_ids)) !== false) {
                    unset($removing_ids[$key]);
                }
            }
        }
        $fee_structures = $fee_structures->whereNotIn("fee_head_id", $removing_ids);
    }
    return [
        'fee_structures'    =>  $fee_structures,
        'self_ids'          =>  $self_ids
    ];
}

function get_attachment($doc_name, $application)
{
    $doc_name = ucwords(str_replace("_", " ", $doc_name));
    foreach ($application->attachments as $key => $attachment) {
        if ($attachment->doc_name == $doc_name) {
            return $attachment->path;
            break;
        }
    }
    return null;
}
function sendSMS($mobile_no, $message)
{
    $user = config('constants.sms_user');
    $password = config('constants.sms_password');
    $senderid = config('constants.sms_senderid');
    $url = config('constants.sms_url');
    $app_name = env('APP_NAME');
    $message = urlencode($message . "\n" . $app_name);
    $mobile_no = '91' . $mobile_no;
    $smsInit = curl_init($url . "?user=$user&password=$password&mobiles=$mobile_no&sms=" . $message . "&senderid=" . $senderid);
    curl_setopt($smsInit, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($smsInit);
    \Log::info($res);

}

function returnStateListHtml()
{
    return '
        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
        <option value="Andhra Pradesh">Andhra Pradesh</option>
        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
        <option value="Assam">Assam</option>
        <option value="Bihar">Bihar</option>
        <option value="Chandigarh">Chandigarh</option>
        <option value="Chhattisgarh">Chhattisgarh</option>
        <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
        <option value="Daman and Diu">Daman and Diu</option>
        <option value="Delhi">Delhi</option>
        <option value="Goa">Goa</option>
        <option value="Gujarat">Gujarat</option>
        <option value="Haryana">Haryana</option>
        <option value="Himachal Pradesh">Himachal Pradesh</option>
        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
        <option value="Jharkhand">Jharkhand</option>
        <option value="Karnataka">Karnataka</option>
        <option value="Kerala">Kerala</option>
        <option value="Lakshadweep">Lakshadweep</option>
        <option value="Madhya Pradesh">Madhya Pradesh</option>
        <option value="Maharashtra">Maharashtra</option>
        <option value="Manipur">Manipur</option>
        <option value="Meghalaya">Meghalaya</option>
        <option value="Mizoram">Mizoram</option>
        <option value="Nagaland">Nagaland</option>
        <option value="Orissa">Orissa</option>
        <option value="Pondicherry">Pondicherry</option>
        <option value="Punjab">Punjab</option>
        <option value="Rajasthan">Rajasthan</option>
        <option value="Sikkim">Sikkim</option>
        <option value="Tamil Nadu">Tamil Nadu</option>
        <option value="Tripura">Tripura</option>
        <option value="Uttaranchal">Uttaranchal</option>
        <option value="Uttar Pradesh">Uttar Pradesh</option>
        <option value="West Bengal">West Bengal</option>
    ';
}

function dateFormat($dateTime, $format = "d-m-Y")
{
    if ($dateTime == "0000-00-00" || $dateTime == "0000-00-00 00:00:00") {
        return " ";
    }
    $date = strtotime($dateTime);
    if (date('d-m-Y', $date) != '01-01-1970') {
        return date($format, $date);
    } else {
        return " ";
    }
}
function findSubjectInAppliedSubject($appliedSubjects, $searching_id)
{
    if (!$appliedSubjects) {
        return "NA";
    }
    $found_subject = $appliedSubjects->where("subject_id", $searching_id);
    if ($found_subject->count()) {
        return array_first($found_subject)["subject_id"];
    } else {
        return "NA";
    }
}

// function getSeatDetailsAll()
// {
//     $applications = Application::whereIn('status',[3,4,5,6,7])->get();
//     $allocated_applications = $applications->where('status',3);
//     $allocated_applications = $allocated_applications->groupBy('appliedStream.stream_id')
//                                     ->transform(function($item, $key) {
//                                         if(in_array($key, [4,6,8])){
//                                             return $item->groupBy('appliedMajorSubjects.subject_id')
//                                                         ->transform(function($it, $ke) {
//                                                             return $it->groupBy('selected_caste_category')
//                                                                         ->transform(function($i, $k) {
//                                                                             return $i->count();
//                                                                     });
//                                                 });
//                                         }else{
//                                             return $item->groupBy('selected_caste_category')
//                                                     ->transform(function($i, $k) {
//                                                         return $i->count();
//                                                     });
//                                         }
//                                     })
//                                     ->toArray();

//     $admission_complete = $applications->where('status',4);
//     $admission_complete = $admission_complete->groupBy('appliedStream.stream_id')
//                                     ->transform(function($item, $key) {
//                                         if(in_array($key, [4,6,8])){
//                                             return $item->groupBy('appliedMajorSubjects.subject_id')
//                                                         ->transform(function($it, $ke) {
//                                                             return $it->groupBy('selected_caste_category')
//                                                                         ->transform(function($i, $k) {
//                                                                             return $i->count();
//                                                                     });
//                                                 });
//                                         }else{
//                                             return $item->groupBy('selected_caste_category')
//                                                     ->transform(function($i, $k) {
//                                                         return $i->count();
//                                                     });
//                                         }
//                                     })
//                                     ->toArray();
//     $reservations = Reservation::get();
//     $reservations = $reservations->groupBy('stream_id')
//                                 ->transform(function($item, $key) {
//                                     if(in_array($key, [4,6,8])){
//                                         return $item->groupBy('major_id')
//                                                     ->transform(function($it, $ke) {
//                                                         return $it->groupBy('category_id')
//                                                                     ->transform(function($i, $k) {
//                                                                         return $i[0]->seat;
//                                                                 });
//                                             });
//                                     }else{
//                                         return $item->groupBy('category_id')
//                                                 ->transform(function($i, $k) {
//                                                     return $i[0]->seat;
//                                                 });
//                                     }
//                                 })
//                                 ->toArray();
//     return [
//         'allocated_applications'    => $allocated_applications,
//         'admission_complete'        => $admission_complete,
//         'reservations'              => $reservations,
//     ];
// }

function getSeatDetails($stream = null, $caste = null)
{
    $applications = Application::whereIn('status', [3, 4, 5, 6, 7]);
    if ($stream) {
        $applications = $applications->whereHas('appliedStream', function ($query) use ($stream) {
            $query->where('stream_id', $stream);
        });
    }
    if ($caste) {
        $applications = $applications->where('selected_category_id', $caste);
    }

    $applications = $applications->get();

    $allocated_applications = $applications->where('status', 3);
    $allocated_applications = $allocated_applications->groupBy('appliedStream.stream_id')
        ->transform(function ($item, $key) {
            if (in_array($key, [4, 6])) {
                return $item->groupBy('appliedMajorSubjects.subject_id')
                    ->transform(function ($it, $ke) {
                        return $it->groupBy('selected_category_id')
                            ->transform(function ($i, $k) {
                                return $i->count();
                            });
                    });
            } else {
                return $item->groupBy('selected_category_id')
                    ->transform(function ($i, $k) {
                        return $i->count();
                    });
            }
        })
        ->toArray();

    $admission_complete = $applications->where('status', 4);
    $admission_complete = $admission_complete->groupBy('appliedStream.stream_id')
        ->transform(function ($item, $key) {
            if (in_array($key, [4, 6])) {
                return $item->groupBy('appliedMajorSubjects.subject_id')
                    ->transform(function ($it, $ke) {
                        return $it->groupBy('selected_category_id')
                            ->transform(function ($i, $k) {
                                return $i->count();
                            });
                    });
            } else {
                return $item->groupBy('selected_category_id')
                    ->transform(function ($i, $k) {
                        return $i->count();
                    });
            }
        })
        ->toArray();
    $reservations = Reservation::get();
    $reservations = $reservations->groupBy('stream_id')
        ->transform(function ($item, $key) {
            if (in_array($key, [4, 6])) {
                return $item->groupBy('major_id')
                    ->transform(function ($it, $ke) {
                        return $it->groupBy('category_id')
                            ->transform(function ($i, $k) {
                                return $i[0]->seat;
                            });
                    });
            } else {
                return $item->groupBy('category_id')
                    ->transform(function ($i, $k) {
                        return $i[0]->seat;
                    });
            }
        })
        ->toArray();
    return [
        'allocated_applications' => $allocated_applications,
        'admission_complete' => $admission_complete,
        'reservations' => $reservations,
    ];
}

function checkSeatAvailability($request, $application, $major = null)
{
    $stream_id = $application->appliedStream->stream_id;
    $category_id = $request->get("category");
    $seat_details = getSeatDetails($stream_id, $category_id);
    $allocated_applications_count = getCount($application, $seat_details, 'allocated_applications', $stream_id, $major, $category_id);
    $admitted_application_count = getCount($application, $seat_details, 'admission_complete', $stream_id, $major, $category_id);
    $reservation_count = getCount($application, $seat_details, 'reservations', $stream_id, $major, $category_id);
    if (($allocated_applications_count + $admitted_application_count) >= $reservation_count) {
        return 0;
    } else {
        return 1;
    }
}

function getCount($application, $seat_details, $type, $stream_id, $major, $category_id)
{
    $count = 0;
    if (in_array($stream_id, [4, 6])) {
        $major_id = $major;
        if (array_key_exists($stream_id, $seat_details[$type])) {
            if (array_key_exists($major_id, $seat_details[$type][$stream_id])) {
                if (array_key_exists($category_id, $seat_details[$type][$stream_id][$major_id])) {
                    $count = $seat_details[$type][$stream_id][$major_id][$category_id];
                } else {
                    $count = 0;
                }
            } else {
                $count = 0;
            }
        } else {
            $count = 0;
        }

    } else {
        if (array_key_exists($stream_id, $seat_details[$type])) {
            if (array_key_exists($category_id, $seat_details[$type][$stream_id])) {
                $count = $seat_details[$type][$stream_id][$category_id];
            } else {
                $count = 0;
            }
        } else {
            $count = 0;
        }

    }
    return $count;
}

function getIndianCurrency(float $number)
{
    if ($number == 0) {
        return 'Zero only';
    }
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
    while ($i < $digits_length) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str[] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
        } else {
            $str[] = null;
        }

    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise . " only";
}

function getDecimal($amount, $upto = 2)
{
    return number_format($amount, $upto);
}
