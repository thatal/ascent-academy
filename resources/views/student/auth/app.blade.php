<!doctype html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Language" content="en" />
  <meta name="msapplication-TileColor" content="#2d89ef">
  <meta name="theme-color" content="#4188c9">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
  <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
  <!-- Generated: 2018-04-16 09:29:05 +0200 -->
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
  <script src="{{asset('public/admin/assets/js/require.min.js') }}"></script>
  <script>
    requirejs.config({
      baseUrl: "{{config('app.url')}}"
    });
  </script>
  <!-- Dashboard Core -->
  <link href="{{asset('public/admin/assets/css/dashboard.css')}}" rel="stylesheet" />
  <script src="{{asset('public/admin/assets/js/dashboard.js')}}"></script>
  <!-- c3.js Charts Plugin -->
  <link href="{{asset('public/admin/assets/plugins/charts-c3/plugin.css')}}" rel="stylesheet" />
  <script src="{{asset('public/admin/assets/plugins/charts-c3/plugin.js')}}"></script>
  <!-- Google Maps Plugin -->
  <link href="{{asset('public/admin/assets/plugins/maps-google/plugin.css')}}" rel="stylesheet" />
  <script src="{{asset('public/admin/assets/plugins/maps-google/plugin.js')}}"></script>
  <!-- Input Mask Plugin -->
  <script src="{{asset('public/admin/assets/plugins/input-mask/plugin.js')}}"></script>

  <style>
    .scroll_vertical {
    height: 600px;
    overflow: auto;
    padding: 8px;
    margin-bottom:20px;
    }
    .box.box-default {
    padding: 10px;
    }

    .title {
        text-transform: uppercase;
        margin-top: 5px;
    }

    .bold {
      font-weight: bold;
    }

  </style>
</head>
<body class="">
  <div class="page">
    <div class="page-single">
      <div class="container">
        <div class="row">
            <div class="col text-center mb-6">
              <img src="{!!asset('public/images/logo.jpg') !!}" class="h-8" alt="">
              <h3 class="title">Darrang College</h3>
            </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-7 col-lg-7 col-xl-7  col-instruction">
             <div class="scroll_vertical" style="background:#fff">
             <div class="box box-default">
            <!-- /.box-header -->
            <div class="box-body">

              <a class="btn btn-link text-left" style="float: left;"  href="http://darrangcollege.in/pdf/prospectus-19_20-final.pdf">Download Prospectus</a>
            <h4 class="text-right" style=" font-size: 15px; margin-bottom: 10px; line-height: 1.2rem;">
             Helpline :  <i class="fa fa-phone 2x"></i>  {{ config('constants.helpline_no')}} <br/>
            <i class="fa fa-envelope-o 2x"></i> {{ config('constants.helpline_mail')}}
            </h4>

            <h3 style="margin-bottom:8px;">Guidelines for filling up Online Application Form for Admission into HS, Degree & PG in Darrang College</h3>


<h5 style="color: red;">Please read the guidelines before filling up your online application form at the website www.darrangcollege.in. </h5>

<p class="bold" style="color: red;">Online admission renewal is now open for Degree(Science & Arts)(3rd & 5th sem). Take a print out of the receipt generated after successfull payment.</p>
{{-- <p class="bold" style="color: red;">Online form fillup is now again open for Higher Secondary</p> --}}
<p class="bold" style="color: red;">Take a print out of the information submitted. This printout needs to be carried at the time of Admission along with the original documents. </p>

<p>Please read the prospectus carefully before starting the online application process.</p>

<h4 class="bold">Instructions To Applicant</h4>
<ol>
  <li>READ THE PROSPECTUS CAREFULLY BEFORE FILLING UP THE APPLICATION FORM.</li>
  <li>APPLICATION FEE OF RS. 250/- (ALL CATEGORY) IS TO BE PAID FOR ONLINE APPLICATION.</li>
  <li>UPLOAD PASSPORT SIZE PHOTO AND SIGNATURE OF THE APPLICANT WITHOUT WHICH THE APPLICATION WILL BE SUMMARILY REJECTED.</li>
  <li>WRONG / FALSE ENTRY OF ANY CREDENTIALS OF THE APPLICANT WILL ATTRACT REJECTION OF THE APPLICATION.</li>
  <li>STUDENTS APPLYING FOR PROFESSIONAL COURSE IN BIOTECHNOLOGY NEED TO FILL UP SEPARATE FORM FOR REGISTRATION.</li>
  <li>ORIGINAL DOCUMENTS HAVE TO BE PRODUCED FOR VERIFICATION AT THE TIME OF ADMISSION.</li>
  <li>SELF ATTESTED PHOTOCOPIES OF ALL DOCUMENTS AND PRINTOUT OF THE ONLINE FILL UP APPLICATION FORM HAVE TO BE SUBMITTED AT THE TIME OF ADMISSION.</li>
  <li>DOWNLODED COPY OF THE ONLINE APPLICATION FORM.</li>
  <li>SELF ATTESTED PHOTOSTAT COPIES OF MARK SHEETS &amp; CERTIFICATES.</li>
  <li>SELF ATTESTED COPY OF CASTE CERTIFICATE.</li>
  <li>SELF ATTESTED COPY OF INCOME CERTIFCATE.</li>
  <li>SELF ATTESTED COPY OF EXTRA CO-CURRICULAR CERTIFCATES (FOR THOSE CANDIDATES CLAIMING SEATS IN THE EXTRA CURRICULAR  CATEGORY)</li>
</ol>

<pre>

The applicant has to follow the following steps to complete the online application form

Step 1:  Registration using the "Sign Up" process.
IMPORTANT! The email ID and mobile number used for registration must belong to the applicant. The email address and mobile number must be valid and functional. Communications shall be sent only to the registered email address or mobile number.

Step 2: Click "Apply Now" in your dashboard to proceed with the application form fillup process.

Step 3: Pay Rs.250.00 charged for the online registration & the prospectus using an online payment gateway.

Step 4: Take a print out of the information submitted. This printout needs to be carried at the time of Admission along with the original documents.
Please keep the following information handy for online submission
Before filling application form, please scan and store the following documents as separate files. The same needs to be uploaded as required during the ‘On-line Application’ process.

Mandatory documents:

1. Passport size photo (PNG/JPEG/JPG) (height : 250 | Width : 200 Pixels) (100 KB)
2. Scanned Signature (PNG/JPEG/JPG) (height : 150 | Width : 200 Pixels) (100 KB)
3. Scanned copy of the Marksheet (PNG/JPEG/JPG) (1 MB Max)
Optional documents
4. Scanned copy of Pass Certificate (PNG/JPEG/JPG)(1 MB Max)
5.Scanned copy of Caste Certificate (Mandatory document only  if the applicant belongs to OBC/SC/ST) (PNG/JPEG/JPG)(1 MB Max)
6. Scanned copy of Co-Curricular Certificate (Mandatory document only if the applying under Co-Curricular Reservation Category) (PNG/JPEG/JPG)(1 MB Max)
7. Scanned copy of Gap Certificate (Mandatory document only if gap in studies is applicable. Certificate by Gazette officer / Affidavit) (PNG/JPEG/JPG)(1 MB Max)
8. Scanned copy of Latest Income Certificate (Mandatory document if applying for free admission and family income below 1 Lakhs) and Image of Tree Plantation(PNG/JPEG/JPG)(1 MB Max)
9. Scanned copy of Differently Abled (Mandatory document if  applicant is under Differently Abled Category) (PNG/JPEG/JPG)(1 MB Max)
- PLEASE ENSURE THAT THE ABOVE SCANNED DOCUMENTS ARE SELF ATTESTED.
- PLEASE ENSURE THAT THE SCANNED DOCUMENT FILES LISTED ABOVE ARE LEGIBLE AND READABLE.
- APPLICATIONS SUBMITTED WITH ILLEGIBLE DOCUMENTS ARE LIABLE TO BE REJECTED.

Registration and Form Filled Up Process

The students who apply for admission into Higher Secondary & Degree should first register in www.darrangcollege.in
IMPORTANT! The email ID and mobile number used for registration must belong to the applicant.
The email address and mobile number must be valid and functional. Communications shall be sent
only to the registered email address or mobile number.

Go to the website www.darrangcollege.in. Click on Sign Up (New Registration) or Sign In (Already Registered).
Follow the form and enter the information as required. The applicant should provide their own mobile number for OTP verification. The applicant should also use the valid email address as future communications.
Once the registration is successful the user would be redirected to the dashboard page where
the applicant have to fill up the necessary information in the form. The items marked in (*) are compulsory and needs to be submitted online.
Once the application form is submitted the user can opt to modify / edit the submitted information.
Once the user “confirms” the information submission then the user doesn’t get any option of modification and the user would be redirected to the payment page. Once the user payment process
is over the user can download the filled up application form, payment receipt, uploaded documents.

Note :

The online application will be treated as incomplete on the following points.
1. Mandatory documents not uploaded
2. Payment process not completed
</pre>

{{--
            <ol class="instruction">
            <li> CLICK ON NEW REGISTRATION TO REGISTER YOURSELF</li>

            <li>ON SUCCESSFUL REGISTRATION, THE APPLICANT WILL RECEIVE AN OTP ON HIS/HER REGISTERED MOBILE NUMBER. RESEND OTP OPTION IS AVAILABLE INCASE OTP IS NOT RECEIVED.</li>

            <li>ONCE OTP IS VALIDATED, APPLICANT WILL RECEIVE A REGISTRATION NUMBER ON HIS/HER REGISTERED MOBILE</li>

            <li>USE REGISTATION NUMBER AND PASSWORD [THE DATE OF BIRTH] TO LOGIN IN TO THE ONLINE REGISTRATION MODULE TO COMPLETE THE REST OF THE FORM.</li>

            <li>APPLICANTS CAN PREVIEW THEIR INFORMATION BEFORE FINAL SUBMISSION</li>

            <li>APPLICANTS NEEDS TO DOWNLOAD THE SUBMITTED APPLICATION IN PDF FORMAT AND ATTACH ALL THE NECESSARY DOCUMENTS (PHOTO COPIES) AND BRING WITH THEM ON THE DAY OF INTERVIEW ALONG WITH THE ORIGINAL DOCUMENTS</li>
            </ol>


            <h4><u>POINTS TO BE NOTED :</u></h4>
            <ol>
            <li>ONCE SUBMITTED, THE PROFILE INFORMATION OF THE APPLICANT CANNOT BE EDITED</li>
            <li>ONCE SUBMITTED, THE PROFILE INFORMATION OF THE APPLICANT CANNOT BE EDITED</li>
            </ol> --}}

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
          </div>
          <div class="col-12 col-md-5 col-lg-5 col-xl-5 col-login mx-auto">
            @yield('content')
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
@yield('js')
</html>
