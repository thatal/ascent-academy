
@section('content')
<form name="icard" action="{{auth()->guard('admin')->check()?route('admin.application.i-card'):route('staff.application.i-card')}}" method="post">
  {!! csrf_field() !!}
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        Student UID
      </div>

      <div class="col-md-3">
        <input type="text" class="form-control" required="true" name="uid" value="{{ old('uid', (request()->has('uid')?request()->get('uid'):''))}}">
      </div>

      <div class="col-md-2">
        <button type="submit" class="btn btn-success"> Submit </button>
      </div>
    </div>

    @if(isset($admitted_student))
    <br><br><br>
    <a href="javascript:void(0)" class="btn btn-primary" onclick="printdiv_result('print')" target="_blank"> Print I-Card</a>
    <div id="print">
      <table border="0" cellpadding="0" cellspacing="0" id="tbl" style="border-collapse: collapse;
      
      background-color: {{$admitted_student->application->course_id==1?'#FFFF00':'#f5eea2'}}; width:312px; height:auto;">

        <tr>

          <td align="left" colspan="2" valign="middle" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1;margin-top: 10px; padding-left: 10px;" bordercolor="#000000">
            <table>
              <tr>
                <td width="80" ><img border="0" src="{{asset('public/logo.png')}}" width="55" height="50" hspace="0"   style="margin-top: 7px;"></td>
                <td><p style="margin-top: 7px; margin-bottom: 0;font-size:14px">
                <b>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; IDENTITY CARD</b></p>

                <p style="margin-top: 0px; margin-bottom: 0px;padding:0px;font-size: 16px;line-height: 0.7em "><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DARRANG COLLEGE</b></p>
                <p style="margin-top: 0px; margin-bottom: 0px;padding:0px;font-size:11px"><b>
                Tezpur, Assam :: Ph : 03712-220014</b></p></td>
                <td></td>
              </tr>
            </table>
            </td>
            </tr>

              <tr>

                <td width="272" height="1" align="center" colspan="2" nowrap style="border-left-width: 1; border-right-width: 1; border-top-style: solid; border-top-width: 1; border-bottom-width: 1;" bordercolor="#000000" align="center">
                  <img border="0" src="{{ asset($admitted_student->application->passport)}}" align="center" style="border-style: solid; border-color: #C0C0C0" hspace="0" vspace="5" width="150" height="125"><b><font face="Verdana" size="2">&nbsp;</font></b></td>

                </tr>

                <tr>

                  <td width="272" height="10" align="center" colspan="2" nowrap>

                    <svg id="barcode"></svg>
                  </td>

                </tr>

                <tr>

                  <td width="272" height="10" nowrap colspan="2" align="center">

                    <b><font color="#FF00FF" face="Verdana">&nbsp;{{$admitted_student->application->appliedStream->stream->abbreviation}}</font><font face="Verdana">&nbsp;@&nbsp;</font><font color="#FF00FF" face="Verdana">{{$admitted_student->uid}}</font></b></td>

                  </tr>

                  <tr>

                    <td width="272" height="10" nowrap colspan="2" align="center">

                      <strong style='font-family: verdana; font-size:15px;'>&nbsp;{{strtoupper($admitted_student->application->fullname)}}</strong></td>

                    </tr>

                    <tr>

                      <td width="272" height="10" nowrap colspan="2" align="center">
                        <b>
                          &nbsp;&nbsp;
                          @if($admitted_student->application->gender == "Male")
                          <span style='font-family: verdana; font-size:12px;'> S/O </span>
                          @elseif($admitted_student->application->gender == "Female")
                          <span style='font-family: verdana; font-size:12px;'> D/O </span>
                          @endif
                          <b>
                            <span style='font-family: verdana; font-size:12px;'>&nbsp;{{strtoupper($admitted_student->application->fathers_name)}}</span></b></td>
                          </tr>

                          <tr>
                            <td width="69" height="10" align="right" nowrap><span style='font-family: verdana; font-size:12px;'><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gender</b></td>
                              <td width="203" height="10" nowrap><b>

                                <span style='font-family: verdana; font-size:12px;color:#008080'>&nbsp;{{ substr($admitted_student->application->gender,0,1)}}</span></b>&nbsp;&nbsp;<b><span style='font-family: verdana; font-size:12px;'><b>D.O.B</span>&nbsp;&nbsp;<span style='font-family: verdana; font-size:12px;color:#008080'>{{ date('d/m/Y',strtotime($admitted_student->application->dob))}}</b></td>

                                </tr>

                                <tr>

                                  <td width="272" height="30" align="left" colspan="2" valign="bottom" style="border-left-width:1; border-right-width:1; border-top-width:1">

                                    <p style="margin-top: 0; margin-bottom: 0" align="center">

                                      <img id="0" width="215" height="50" align="middle" hspace="5" src="{{ asset('public/images/signature1.png')}}"><p style="margin-top: 0; margin-bottom: 0" align="center">

                                        <b><span style='font-family: verdana; font-size:11px;'>Principal</span></b>
                                        <p style="margin-top: 0; margin-bottom: 0; line-height: 0.4em" align="center">

                                          <b><span style='font-family: verdana; font-size:11px;'>Darrang College</span></b></td>

                                        </tr>

                                        <tr>

                                          <td width="272" height="1" colspan="2" align="center">

                                            <font size="2">&nbsp;</font><b><font face="Verdana" size="1">Validity period</font></b>

                                            @if($admitted_student->application->course_id == 1)
                                            <font color="#FF0000" size="2">
                                              <strong>{{$admitted_student->application->year}} - {{intval($admitted_student->application->year)+intval(2)}}</strong></font>
                                              @else
                                              <font color="#FF0000" size="2">
                                                <strong>{{$admitted_student->application->year}}-{{intval($admitted_student->application->year)+intval(3)}}</strong></font>
                                                @endif
                                                &nbsp;&nbsp;&nbsp;  

                                              </td>

                                            </tr>

                                            <tr>

                                              <td width="272" height="" colspan="2" style="border-left-width: 1; border-right-width: 1; border-top-style: solid; border-top-width: 1; border-bottom-width: 1" bordercolor="#000000">
                                                <p style="margin-top: 6px; margin-bottom: 0;font-family: verdana;font-size: 10px; padding:2px; padding-left: 8px;" align="center">
                                                  <b>
                                                    <font color="#FF0000">N.B</font>:This card&nbsp; is not transferable.

                                                    The loss of the

                                                  card should be reported immediately to the Principal</font></b>
                                                </p><br></td>
                                              </tr>

                                            </table>
                                          </div>
                                          @endif
                                        </div>
                                      </form>
                                      @endsection

                                      @section('js')
                                      <script src="{{ asset('public/js/JsBarcode.all.min.js')}}"></script>
                                      <script>
                                        JsBarcode("#barcode", "{{request()->has('uid')?request()->get('uid'):''}}", {
                                          width: 1,
                                          height: 30,
                                          format: "CODE39",
                                          displayValue: false,
                                          font: "fantasy",
                                          background:'#FFF',
                                          margin: 0
                                        });

                                        function printdiv_result(idDiv)
                                        {
                                          var headstr = "<html><head><title></title></head><body>";
                                          var footstr = "</body>";
                                          var newstr = document.all.item(idDiv).innerHTML;
                                          var oldstr = document.body.innerHTML;

                                          document.body.innerHTML = headstr+newstr+footstr;
                                          window.print();
                                          document.body.innerHTML = oldstr;
                                          return false;
                                        }
                                      </script>
                                      @endsection