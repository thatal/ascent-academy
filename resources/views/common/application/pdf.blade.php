<html>

<head>
    @include('common/layouts/head')
    <style>
        .help-block {
            color: red !important;
        }

        body {
            line-height: 1.2rem !important;
            color: #000000;
        }

        .table {
            margin-bottom: 0.5rem;
        }

        .bold {
            font-weight: bold;
        }

        .inline label {
            display: inline;
        }

        .page-break-after {
            page-break-after: always;
        }

        .page-break-before {
            page-break-before: always;
        }

        .padding-xs {
            padding: .25em;
        }

        td.padding-xs {
            padding: 0.15rem 0.75rem;
        }

        .signature_space {
            height: 50px;
        }

        .card {
            margin-bottom: 0;
        }

        .card-body {
            padding: .8rem 1.5rem;
        }

        .certificate-wrapper {
            padding: 0 100px;
        }

        .certificate-wrapper img {
            max-height: 1100px !important;
        }

        .qr_wrapper {
            padding: 10px 0;
        }

        .table-bordered th,
        .text-wrap table th,
        .table-bordered td,
        .text-wrap table td {
            border: 1px solid #dddddd;
        }

        h3.card-title {
            line-height: 1.4rem;
        }

        .sub-ul {
            padding-left: 10px;

        }

        .sub-ul .sub-li {
            line-height: 1.2rem !important;
        }


        @page {
            margin: 1px;
        }

        body {
            margin: 0px;
        }
    </style>
</head>

<body>

    @include('common.application.show')
    <div class="page-break-before"></div>
    @if(is_new_admission($application->semester_id))
    @include('common.application.online-payment-receipt')
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12">
                @if($application->appliedSubjects()->exists())
                <h4 class="bold">Allocate Subjects Details</h4>
                @include('common.application.subject-allocated-list')
                @endif
                @if($application->status != 1)
                <h4 class="bold">IMPORTANT INSTRUCTIONS</h4>
                <ol>
                    <li>STATUS AND OFFER FOR PROVISIONAL ADMISSION WILL BE UPDATED AND MAY BE ACCESSED BY THE STUDENT/PARENTS ON THE ADMISSIONS
                    PORTAL.</li>
                    <li>IF ADMISSION IS GRANTED, YOU ARE REQUIRED TO CARRY THE APPLICATION FORM, OFFER FOR PROVISIONAL ADMISSION (E-ADMISSION
                    CARD) AND THE FOLLOWING DOCUMENTS FOR VERIFICATION AT THE TIME OF FINAL ADMISSION:</li>
                    <ul>
                        <li>
                            COPY OF THE APPLICATION PROCESSING FEE RECEIPT
                        </li>
                        <li>
                            PRINT OUT OF THE APPLICATION FORM, OFFER FOR PROVISIONAL ADMISSION FORM AND THE DECLARATION FORM DULY SIGNED BY THE
                            PARENT/GUARDIAN AND THE CANDIDATE
                        </li>
                        <li>
                            ORIGINAL DOCUMENTS ALONG WITH ONE SET OF PHOTOCOPIES OF ALL UPLOADED DOCUMENTS (MARKSHEETS ETC.) ON THE ADMISSION PORTAL
                        </li>
                        <li>
                            TWO RECENT PASSPORT-SIZED PHOTOGRAPHS IN FORMAL DRESS WITH WHITE BACKGROUND
                        </li>
                    </ul>
                    <li>ADMISSION REGISTRATION FEE IS NON-REFUNDABLE IN THE EVENT OF CANCELLATION OF ADMISSION. THIS FEE WILL BE APART FROM
                    CANCELLATION CHARGES (IF ANY APPLICABLE).</li>
                </ol>
                @else
                <p>
                    <strong>Congratulations!</strong><br />
                    <br />

                    You have been provisionally admitted for the selected course at Ascent Academy Junior College (Ascent Academy Group
                    of
                    Institutions), Guwahati Campus for the Academic Year 2020-2021.

                    In order to confirm your Admission, kindly pay the Fees and download the ‘Offer for Provisional Admission’ Form
                    (E-Admission Card) and the College Prospectus 2020.

                    Payment of Fees has to be made in the Accounts Department of the Main Campus Office.
                </p>
                    <h4 class="bold">NOTE</h4>
                    <ol>
                        <li>"OFFER FOR PROVISIONAL ADMISSION" DOES NOT GUARANTEE A SEAT OR FINAL ADMISSION, IT IS SUBJECT TO PAYMENT OF ADMISSION
                        FEES AND AVAILABILITY OF SEATS.</li>
                        <li>KINDLY REFER TO THE APPLICATION FORM FOR ‘IMPORTANT INSTRUCTIONS’ TO BE FOLLOWED AT THE TIME OF FINAL ADMISSION.</li>

                        <li>IF A STUDENT HAS APPLIED FOR BOARDER/HOSTEL FACILITY, HE/SHE CAN COLLECT THE DHANSIRI HOUSE (HOSTEL) APPLICATION FORM
                        FROM THE MAIN CAMPUS OFFICE AND DO THE FORMALITIES ACCORDINGLY.</li>
                        <li>
                            BOARDERS WILL HAVE NO OPTION TO CHANGE OVER TO THE DAY-SCHOLARS’ CATEGORY DURING THE 24 MONTHS ACADEMIC SESSION.
                            NON-CONTINUANCE OF HOSTEL STAY WILL AUTOMATICALLY INVITE LOSS OF SEAT IN THE ACADEMY. FURTHER, BOARDERS WILL BE
                            REGULATED BY THE ASCENT BOARDERS’ RULES AND REGULATIONS.
                        </li>
                        <li>
                            ADMISSION REGISTRATION FEE IS NON-REFUNDABLE IN THE EVENT OF CANCELLATION OF ADMISSION. THIS FEE WILL BE APART FROM
                            CANCELLATION CHARGES (IF ANY APPLICABLE).
                        </li>
                    </ol>
                @endif
                <div class="qr_wrapper">
                    <img style="max-width: 120px;" height="120px" width="120px"
                        src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate(route('short.application', $application->uuid)))!!}" />
                </div>
                <div class="page-break-after"></div>
                <div class="card-body">
                    <table width="100%" style="margin-bottom:20px;">
                        <tbody>
                            <tr>
                                <td align="left">Application ID: <b>{{$application->id}}</b></td>
                                <td align="center">Guardian Declaration: <b></b></td>
                                <td align="right">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-12">
                            <div class="certificate-wrapper">
                                <img width="100%" src="{{asset("public/images/declaration.jpg")}}">
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($application->attachments as $attachments)
                <div class="page-break-after"></div>
                <div class="card-body">
                    <table width="100%" style="margin-bottom:20px;">
                        <tbody>
                            <tr>
                                <td align="left">Application ID: <b>{{$application->id}}</b></td>
                                <td align="center">Certificate Name: <b>{{$attachments->doc_name}}</b></td>
                                <td align="right"><img style="max-width: 120px;" height="120px" width="120px"
                                        src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate(route('short.application', $application->uuid)))!!}" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-12">
                            <div class="certificate-wrapper">
                                <img width="100%" src="{{url($attachments->path)}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</body>

</html>
