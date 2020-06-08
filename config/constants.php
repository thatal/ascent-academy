<?php
return [
    'current_time'             => time(),
    'apply_up_time'            => '2019-09-17 11:00:00',
    'apply_down_time'          => '2020-09-26 23:59:59',
    'apply_course'             => [1],
    'apply_stream'             => [1, 2, 3],
    'apply_semester'           => [1],

    'admission_up_time'        => '2019-09-24 09:59:59',
    'admission_down_time'      => '2020-09-29 23:59:59',
    'admission_course'         => [1, 2],
    'admission_stream'         => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
    'admission_semester'       => [1, 2, 3, 4, 5, 6, 7, 8, 9],

    'helpline_no'              => '9678300810',
    'helpline_mail'            => 'support@webcomindia.biz',

    'application_fee'          => 250,
    'application_fee_word'     => 'Two Hundred Fifty',

    // sms gateway
    'sms_user'                 => 'webcom',
    'sms_password'             => 'e3cb9f645bXX',
    'sms_senderid'             => 'WEBCOM',
    'sms_url'                  => 'http://t.instaclicksms.in/sendsms.jsp',

    // payment gateway
    'url'                      => 'https://pgi.billdesk.com/pgidsk/PGIMerchantPayment',
    'redirect_url_application' => 'http://139.59.77.92/darrang-college/payment-response',
    // 'redirect_url_admission' => 'http://localhost/darrang-college/admission/payment-response',
    'redirect_url_admission'   => 'http://139.59.77.92/darrang-college/admission/payment-response',
    'redirect_url_examination' => 'http://139.59.77.92/darrang-college/admission/examination/payment-response',
    'merchant_id'              => 'DARRANGCOL',
    'security_id'              => 'darrangcol',
    'checksum_key'             => 'Wkbpw4zoFB5tQJq5A257isEejDqGXnYL',
];
