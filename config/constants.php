<?php
return [
	'current_time' => time(),
	'apply_up_time' => '2019-06-23 11:21:00',
    'apply_down_time' => '2019-06-23 10:31:00',

	'admission_up_time' => '2019-06-23 11:21:00',
	'admission_down_time' => '2019-08-23 10:31:00',

	'helpline_no' => '9706533599',
	'helpline_mail' => 'darrangcollegeadmission@gmail.com',

	'application_fee' => 250,
	'application_fee_word' => 'Two Hundred Fifty',

	// sms gateway
	'sms_user' => 'college',
	'sms_password' => '8f420c8066XX',
	'sms_senderid' => 'DRGCLG',
	'sms_url' => 'http://t.instaclicksms.in/sendsms.jsp',

    // payment gateway
    'url' => 'https://pgi.billdesk.com/pgidsk/PGIMerchantPayment',
	'redirect_url_application' => 'http://68.183.87.189/darrang-college/payment-response',
	// 'redirect_url_admission' => 'http://localhost/darrang-college/admission/payment-response',
	'redirect_url_admission' => 'http://68.183.87.189/darrang-college/admission/payment-response',
	'merchant_id' => 'DARRANGCOL',
    'security_id' => 'darrangcol',
    'checksum_key' => 'Wkbpw4zoFB5tQJq5A257isEejDqGXnYL'
];
