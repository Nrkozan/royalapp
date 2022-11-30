<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /*
     * Get all authors
     * @param Request $request
     */
    public function index(Request $request){
        $author = getAuthor($request->id);
        return view('author',compact('author'));
    }

    /*
     * Get author by id
     * @param Request $request
     */
    public function add(){
        return view('author/add');
    }

    /*
     * Get author by id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeAuthor(Request $request){
        //validate
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required',
        ]);

        $stack = $request->all();
        unset($stack['_token']);
        $response = storeAuthor($stack);
        if($response){
            return redirect()->route('author',$response['id']);
        }else{
            return redirect()->route('authorAdd');
        }
    }

    /*
     * Get author by id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request){
        $author = getAuthor($request->id);
        return view('author/edit',compact('author'));
    }

    /*
     * Get author by id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function putAuthor(Request $request){
        //validate
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required',
        ]);

        $stack = $request->all();
        unset($stack['_token']);
        $response = putAuthor($request->id,$stack);
        if($response){
            return redirect()->route('author',$response['id']);
        }else{
            return redirect()->route('authorEdit',$request->id);
        }
    }

    /*
     * Get author by id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request){
        deleteAuthor($request->id);
        return redirect()->route('home');
    }

    /*
     * Get author by id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteBook(Request $request){
        deleteBook($request->bookID);
        return $response->json(
            [
                'status' => "success",
            ]
        );
    }
}
