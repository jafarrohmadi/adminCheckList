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
        $hari = [
            1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu',
        ];
        $bulan = [
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
        $split = explode('-', $tanggal);
        $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
        if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
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
        //$storage_path = 'clouds/avatars/';
        //$path = $response['photo'];

        //$filename = strtotime(date('YmdHis')) . basename($path);
        if (!$user) {
          //  Image::make($path)->save($storage_path . $filename);
            // register
            User::create([
                'name' => $response['name'],
                'nik' => $response['nik'],
                'email' => $response['email'],
                'password' => Hash::make('jafar123'),
            //    'photo' => $filename,
                'grade' => $response['grade'],
                'division' => $response['division'],
                'department' => $response['department'],
                'designation' => $response['designation']
            ]);
        }

        $user = User::where('email', $response['email'])->first();

        if (!$user) {

            // sync update
            $user = User::where('email', $response['email'])->first();
            if (isset($user->photo)) {
                //File::delete($storage_path . $user->photo);
            }
            //Image::make($path)->save($storage_path . $filename);
            $user->nik = $response['nik'];
            $user->name = $response['name'];
            //$user->photo = $filename;
            $user->grade = $response['grade'];
            $user->division = $response['division'];
            $user->department = $response['department'];
            $user->designation = $response['designation'];
            $user->save();
        }

        return $user;
    }
}
