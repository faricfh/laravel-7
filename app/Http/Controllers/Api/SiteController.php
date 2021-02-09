<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    private $username;

    public function index()
    {
        return [
            'status' => true
        ];
    }

    public function login(Request $request)
    {
        $user = User::where([
            'name' => $request->username
        ])->first();

        if($user === null) {
            return [
                'status' => false,
                'message' => 'Username tidak ditemukan'
            ];
        }

        if(Hash::check($request->password, $user->password)) {
            return [
                'status' => true,
                'message' => 'Berhasil login',
                'data' => $user->name,
            ];
        }

        return [
            'status' => false,
            'message' => 'Silahkan masukan password anda dengan benar'
        ];
    }

    public function user()
    {
        return [
            'status' => true,
            'data' => 'faricfathianhidayah@gmail.com',
        ];
    }
}
