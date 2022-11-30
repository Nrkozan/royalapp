<?php

use Illuminate\Support\Facades\Http;

/**
 * Created by Bilge Ozan Per
 * Class SkeletonHelper
 */
if (!function_exists('codepreview')){
    function codepreview($array){
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
}

if (!function_exists('authors')){
    function authors(){
        $theUrl     = 'https://symfony-skeleton.q-tests.com/api/v2/authors?orderBy=id&direction=ASC&limit=500&page=1';
        $response   = Http::withToken(session('token'))->get($theUrl);
        $authors    = $response->json();
        return $authors;
    }
}

if (!function_exists('getAuthor')){
    function getAuthor($id){
        $theUrl     = 'https://symfony-skeleton.q-tests.com/api/v2/authors/'.$id;
        $response   = Http::withToken(session('token'))->get($theUrl);
        $author     = $response->json();
        return $author;
    }
}

if (!function_exists('deleteBook')){
    function deleteBook($id){
        $theUrl     = 'https://symfony-skeleton.q-tests.com/api/v2/books/'.$id;
        $body       = [
            'book' => $id
        ];
        $response   = Http::withToken(session('token'))->delete($theUrl,$body);
        return $response->json();
    }
}

if (!function_exists('getBooks')){
    function getBooks(){
        $theUrl     = 'https://symfony-skeleton.q-tests.com/api/v2/books?orderBy=id&direction=ASC&limit=500&page=1';
        $response   = Http::withToken(session('token'))->get($theUrl);
        $books      = $response->json();
        return $books;
    }
}

if (!function_exists('getBooksgetBooks')){
    function singleBook($id){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://symfony-skeleton.q-tests.com/api/v2/books/'.$id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        $authorization = "Authorization: Bearer ".session('token');

        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Content-Type: application/json';
        $headers[] = $authorization;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return json_decode($result, true);
    }
}

if (!function_exists('storeBook')){
    function storeBook($haystack){
        $theUrl     = 'https://symfony-skeleton.q-tests.com/api/v2/books';
        $response   = Http::withToken(session('token'))->post($theUrl,$haystack);
        return $response->json();
    }
}

if (!function_exists('deleteAuthor')){
    function deleteAuthor($id){
        $theUrl     = 'https://symfony-skeleton.q-tests.com/api/v2/authors/'.$id;
        $body       = [
            'author' => $id
        ];
        $response   = Http::withToken(session('token'))->delete($theUrl,$body);
        return $response->json();
    }
}

if (!function_exists('putAuthor')){
    function putAuthor($id,$haystack){
        $theUrl     = 'https://symfony-skeleton.q-tests.com/api/v2/authors/'.$id;
        $response   = Http::withToken(session('token'))->put($theUrl,$haystack);
        return $response->json();
    }
}

if (!function_exists('storeAuthor')){
    function storeAuthor($haystack){
        $theUrl     = 'https://symfony-skeleton.q-tests.com/api/v2/authors';
        $response   = Http::withToken(session('token'))->post($theUrl,$haystack);
        return $response->json();
    }
}

if (!function_exists('getMe')){
    function getMe(){
        $theUrl     = 'https://symfony-skeleton.q-tests.com/api/v2/me';
        $response   = Http::withToken(session('token'))->get($theUrl);
        $user       = $response->json();
        return $user;
    }
}

if (!function_exists('putBook')){
    function putBook($id,$haystack){
        $theUrl     = 'https://symfony-skeleton.q-tests.com/api/v2/books/'.$id;
        $body       = [
            'book' => $id
        ];
        $response   = Http::withToken(session('token'))->put($theUrl,$haystack);
        $data = $response->json();
        return $data;
    }
}

