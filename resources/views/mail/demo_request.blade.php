@extends('mail.templates.basic')

@section('mail_subtitle', 'Request Demo')
@section('mail_image')
@endsection

@section('mail_content')
<!--[if mso | IE]>
<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;" width="600">
    <tr>
        <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
<![endif]-->
<div style="Margin:0px auto;max-width:600px;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
        <tbody>
        <tr>
            <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                <!--[if mso | IE]>
                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="vertical-align:top;width:600px;">
                <![endif]-->

                <div class="mj-column-per-100 outlook-group-fix"
                     style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;"
                           width="100%">
                        <tr>
                            <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                <div
                                    style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:17px;font-weight:bold;line-height:1;text-align:left;color:#212121;">
                                    Hi, IT Development
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                <div
                                    style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;line-height:25px;text-align:left;color:#585858;">
                                    @if($data['content']['type'] == 'free')
                                        <div
                                            style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;line-height:25px;text-align:left;color:#585858;">{{ $data['content']['company_name'] }}
                                            meminta request demo trial untuk Aplikasi AyooChecklist.<br></div>
                                        <br>
                                    @else
                                        <div
                                            style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;line-height:25px;text-align:left;color:#585858;">{{ $data['content']['company_name'] }}
                                            meminta quotation untuk Aplikasi AyooChecklist.<br></div>
                                    @endif
                                    <div style="font-size: 21px; line-height: 30px; text-align: center;">
                                        <b>Name : {{ $data['content']['name'] }}<b><br>
                                                <b>Email : {{ $data['content']['email'] }}<b><br>
                                                        <b>Company Name : {{ $data['content']['company_name'] }}<b><br>
                                                                <b>City : {{ $data['content']['country'] }}<b><br>
                                                                        <b>Company Size
                                                                            : {{ $data['content']['count_employee'] }}
                                                                            <b><br>
                                                                                <b>Phone
                                                                                    : {{ $data['content']['phone_code'] }}{{ $data['content']['phone_number'] }}
                                                                                    <b><br>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <!--[if mso | IE]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        </tbody>
    </table>
</div>
<!--[if mso | IE]>
</td>
</tr>
</table>
<![endif]-->

@endsection
