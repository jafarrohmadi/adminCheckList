<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class Helper
{
    function tanggal_indo($tanggal, $cetak_hari = true)
    {
        $hari     = [
            1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu',
        ];
        $bulan    = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];
        $split    = explode('-', $tanggal);
        $tgl_indo = $split[2].' '.$bulan[(int)$split[1]].' '.$split[0];
        if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num].', '.$tgl_indo;
        }
        return $tgl_indo;
    }

    function getThisDay()
    {
        $hari = [
            1 => 'senin',
            'selasa',
            'rabu',
            'kamis',
            'jumat',
            'sabtu',
            'minggu',
        ];

        $num = date('N');
        return $hari[$num];
    }

    function admin__add_user($response)
    {
        $user = User::where('email', $response['email'])->first();
        if (!$user) {

            $user = User::create([
                'name'        => $response['name'],
                'nik'         => $response['nik'],
                'email'       => $response['email'],
                'password'    => Hash::make('jafar123'),
                'photo'       => $response['photo'],
                'grade'       => $response['grade'],
                'division'    => $response['division'],
                'department'  => $response['department'],
                'designation' => $response['designation'],
            ]);
        }

        return $user;
    }

    function mail__button($url, $text)
    {
        $text = '
    <!--[if mso | IE]>
    <table
    align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;" width="600"
    >
    <tr>
    <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
    <![endif]-->
        <div style="margin:0 auto;max-width:600px;">
        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
            <tr style="vertical-align:top;">
            <td style="width:0.01%;padding-bottom:NaN%;mso-padding-bottom-alt:0;">
            <td>
                <!--[if mso | IE]><table border="0" cellpadding="0" cellspacing="0" style="width:600px;" width="600" ><tr><td style=""><![endif]-->
                <div class="mj-hero-content" style="margin:0px auto;">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;margin:0px;">
                    <tr>
                    <td>
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                        style="width:100%;margin:0px;">

                        <tr>
                            <td align="center"
                            style="font-size:0px;padding:10px 25px;padding-top:10px;padding-bottom:45px;word-break:break-word;">
                            <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                style="border-collapse:separate;line-height:100%;">
                                <tr>
                                <td align="center" bgcolor="#e85034" role="presentation"
                                    style="border:none;border-radius:24px;cursor:auto;padding:10px 25px;background:#e85034;" valign="middle"><a href="'.$url.'"
                                    style="background:#e85034;color:#ffffff;font-family:Ubuntu, Helvetica, Arial, sans-serif, Helvetica, Arial, sans-serif;font-size:13px;font-weight:normal;line-height:120%;Margin:0;text-decoration:none;text-transform:none;"
                                    target="_blank">'.$text.'</a></td>
                                </tr>
                            </table>
                            </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                </table>
                </div>
                <!--[if mso | IE]></td></tr></table><![endif]-->
            </td>
            <td style="width:0.01%;padding-bottom:NaN%;mso-padding-bottom-alt:0;">
            </tr>
        </table>
        </div>
    <!--[if mso | IE]></td></tr></table><![endif]-->';

        return $text;
    }

}
