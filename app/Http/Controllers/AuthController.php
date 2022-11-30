<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\UserInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /*
     * Login
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $data = $request->all();
        $url = 'https://symfony-skeleton.q-tests.com/api/v2/token';
        $data = json_encode($data);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://symfony-skeleton.q-tests.com/api/v2/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        $result = json_decode($result, true);

        if (isset($result['token_key'])) {
            $user = $result['user'];
            $request->session()->put('authenticated', time());
            $request->session()->put('token', $result['token_key']);
            $request->session()->put('user', $user);
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }

    /*
     * Logout
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }
}
