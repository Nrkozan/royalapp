<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    /*
     * Get all books
     * @param Request $request
     */
    public function index(Request $request){
        $books= getBooks($request->id);
        return view('book/list',compact('books'));
    }

    /*
     * Get book by id
     * @param Request $request
     */
    public function add(){
        $authors = authors();
        return view('book/add',compact('authors'));
    }

    /*
     * Get book by id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request){
        $book = singleBook($request->id);
        $authors = authors();
        return view('book/edit',compact('book','authors'));
    }

    /*
     * Get book by id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request){
        deleteBook($request->id);
        return redirect()->route('books');
    }

    /*
     * Get book by id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function putBook(Request $request){
        //validate
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'number_of_pages' => 'required|numeric|alpha_num|min:1',
            'release_date' => 'required|date',
            'isbn' => 'required|alpha_dash',
            'format' => 'required',
        ]);

        $request->merge([
            'author' => [
                'id' => $request->author
            ]
        ]);
        $stack = $request->all();
        (int)$stack['number_of_pages'] = (int)$stack['number_of_pages'];
        unset($stack['_token']);
        $response = putBook($request->id,$stack);
        if($response){
            return redirect()->route('book',['id'=>$response['id']]);
        }else{
            return redirect()->route('bookAdd');
        }
    }

    /*
     * Get book by id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeBook(Request $request){
        //validate
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'number_of_pages' => 'required|numeric|alpha_num|min:1',
            'release_date' => 'required|date',
            'isbn' => 'required|alpha_dash',
            'format' => 'required',
        ]);

        $request->merge([
            'author' => [
                'id' => $request->author
            ]
        ]);
        $stack = $request->all();
        (int)$stack['number_of_pages'] = (int)$stack['number_of_pages'];
        unset($stack['_token']);
        $response = storeBook($stack);
        if($response){
            return redirect()->route('books');
        }else{
            return redirect()->route('bookAdd');
        }
    }

    /*
     * Get book by id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteBook(Request $request){
        $response = deleteBook($request->id);
        if($response){
            return redirect()->route('books');
        }else{
            return redirect()->route('books');
        }
    }
}
