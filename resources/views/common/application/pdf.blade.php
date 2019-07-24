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
                <h4 class="bold">Instructions To Applicant</h4>
                <ol>
                    <li>READ THE PROSPECTUS CAREFULLY BEFORE FILLING UP THE APPLICATION FORM.</li>
                    <li>APPLICATION FEE OF RS. 250/- (ALL CATEGORY) IS TO BE PAID FOR ONLINE APPLICATION.</li>
                    <li>UPLOAD PASSPORT SIZE PHOTO AND SIGNATURE OF THE APPLICANT WITHOUT WHICH THE APPLICATION WILL BE
                        SUMMARILY REJECTED.</li>
                    <li>WRONG / FALSE ENTRY OF ANY CREDENTIALS OF THE APPLICANT WILL ATTRACT REJECTION OF THE
                        APPLICATION.</li>
                    <li>STUDENTS APPLYING FOR PROFESSIONAL COURSE IN BIOTECHNOLOGY NEED TO FILL UP SEPARATE FORM FOR
                        REGISTRATION.</li>
                    <li>ORIGINAL DOCUMENTS HAVE TO BE PRODUCED FOR VERIFICATION AT THE TIME OF ADMISSION.</li>
                    <li>SELF ATTESTED PHOTOCOPIES OF ALL DOCUMENTS AND PRINTOUT OF THE ONLINE FILL UP APPLICATION FORM
                        HAVE TO BE SUBMITTED AT THE TIME OF ADMISSION.</li>
                    <li>DOWNLODED COPY OF THE ONLINE APPLICATION FORM.</li>
                    <li>SELF ATTESTED PHOTOSTAT COPIES OF MARK SHEETS &amp; CERTIFICATES.</li>
                    <li>SELF ATTESTED COPY OF CASTE CERTIFICATE.</li>
                    <li>SELF ATTESTED COPY OF INCOME CERTIFCATE.</li>
                    <li>SELF ATTESTED COPY OF EXTRA CO-CURRICULAR CERTIFCATES (FOR THOSE CANDIDATES CLAIMING SEATS IN
                        THE EXTRA CURRICULAR CATEGORY)</li>
                </ol>
                <div class="qr_wrapper">
                    <img style="max-width: 120px;" height="120px" width="120px"
                        src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate($application->id))!!}" />
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
                                        src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate($application->id))!!}" />
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
