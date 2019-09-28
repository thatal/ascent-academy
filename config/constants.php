<?php
return [
    'current_time'             => time(),
    'apply_up_time'            => '2019-09-17 11:00:00',
    'apply_down_time'          => '2019-09-26 23:59:59',
    'apply_course'             => [1],
    'apply_stream'             => [1, 2, 3],
    'apply_semester'           => [1],

    'admission_up_time'        => '2019-09-24 09:59:59',
    'admission_down_time'      => '2019-09-29 23:59:59',
    'admission_course'         => [1, 2],
    'admission_stream'         => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
    'admission_semester'       => [1, 2, 3, 4, 5, 6, 7, 8, 9],

    'helpline_no'              => '9706533599',
    'helpline_mail'            => 'darrangcollegeadmission@gmail.com',

    'application_fee'          => 250,
    'application_fee_word'     => 'Two Hundred Fifty',

    // sms gateway
    'sms_user'                 => 'college',
    'sms_password'             => '8f420c8066XX',
    'sms_senderid'             => 'DRGCLG',
    'sms_url'                  => 'http://t.instaclicksms.in/sendsms.jsp',

    // payment gateway
    'url'                      => 'https://pgi.billdesk.com/pgidsk/PGIMerchantPayment',
    'redirect_url_application' => 'http://68.183.87.189/darrang-college/payment-response',
    // 'redirect_url_admission' => 'http://localhost/darrang-college/admission/payment-response',
    'redirect_url_admission'   => 'http://68.183.87.189/darrang-college/admission/payment-response',
    'merchant_id'              => 'DARRANGCOL',
    'security_id'              => 'darrangcol',
    'checksum_key'             => 'Wkbpw4zoFB5tQJq5A257isEejDqGXnYL',
];
