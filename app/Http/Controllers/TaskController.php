<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helpers;
use App\Models\Siswa;
use App\Models\user_reqres;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;

class TaskController extends Controller
{
    /**
     * Soal 1
     *
     * Angka perulangan 1 sampai 200
     * Angka habis dibagi 8 maka "BENAR"
     * Angka habis dibagi 4 dan 6 maka "SALAH"
     *
     */
    public function taskOne()
    {
        $res = [];
        for ($i = 1; $i <= 200; $i++)
        {
            if ($i % 8 === 0) {
                $res[$i] = 'benar';
            } else if ($i % 4 === 0 && $i % 6 === 0){
                $res[$i] = 'salah';
            } else {
                $res[$i] = $i;
            }
        }

        return view('task_one', compact('res'));
    }


    /**
     * Soal 2 Buat Helpers
     * \App\Helpers\Helpers
     */

    /**
     * Soal 2 A
     *
     * @return array
     */
    public function taskTwoA()
    {
        $data = Helpers::setData();

        $get_data_types = Helpers::getDataTypes($data);

        return view('task_two', compact('get_data_types'));
    }

    /**
     * Soal 2 B
     *
     * @return boolean
     *
     */
    public function taskTwoB()
    {
        $data = Helpers::setData();
        $element_exists = Helpers::elementExists(['array'], $data);
        return view('task_two', compact('element_exists'));
    }

    /**
     * Soal 2 C
     *
     * @return string | Key dari Helpers data array
     *
     */
    public function taskTwoC()
    {
        $data = Helpers::setData();
        $element_key = Helpers::getElementKey('string', $data);
        return view('task_two', compact('element_key'));
    }

    /**
     * buat multidimensi array dengan output json
     *     return response()->json([
     *   'status' => 'success',
     *   'message' => 'This is a sample response'
      *   ]);
     *
     */
    public function taskThree()
    {
        $arr = [
            'donut' => [
                'cake' => [
                    'regular' => ['glazed', 'sugar'],
                    'chocolate' => ['maple'],
                    'blueberry' => ['sugar']
                ]
            ],
            'bar' => [
                'bar' => [
                    'regular' => ['chocolate', 'maple']
                ]
            ]
        ];

        return response()->json($arr);
    }

    public function taskFour()
    {
        $data = Siswa::select('nama_siswa')
        ->selectRaw('MAX(CASE WHEN nilai_tahun = 2010 THEN nilai_siswa END) AS tahun2010')
        ->selectRaw('MAX(CASE WHEN nilai_tahun = 2011 THEN nilai_siswa END) AS tahun2011')
        ->selectRaw('MAX(CASE WHEN nilai_tahun = 2012 THEN nilai_siswa END) AS tahun2012')
        ->groupBy('nama_siswa')
        ->get();

        // dd($data);

        return view('task_four', compact('data'));
    }

    public function taskSixA()
    {
        $url = Http::get('https://reqres.in/api/users');
        $res = $url->json();

        if (empty($res['data'])) {
            return response()->json(['message' => 'data dari reqres tidak ditemukan']);
        }

        foreach ($res['data'] as $key => $value) {
            $encrypt_email = Crypt::encryptString($value['email']);
            $data = [
                'reqres_id' => $value['id'],
                'email' => $value['email'],
                'first_name' => $value['first_name'],
                'last_name' => $value['last_name'],
                'avatar' => $value['avatar'],
                'ecnrypted_data' => $encrypt_email
            ];
            $inserted[] = user_reqres::updateOrCreate($data);
        }

        return response()->json(['status' => 'success', 'message' => 'data dari reqres berhasil ditambahkan', 'result' => $inserted], 200);
    }

    public function taskSixB()
    {
        $datas = user_reqres::all()->map(function($user) {
            return [
                'id' => $user->id,
                'reqres_id' => $user->reqres_id,
                // 'email' => Crypt::decryptString($user->ecnrypted_data),
                'encrypt_data' => $user->ecnrypted_data,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'avatar' => $user->avatar,
                'created_at' => $user->created_at,
            ];
        });
        dd($datas);
    }
}
