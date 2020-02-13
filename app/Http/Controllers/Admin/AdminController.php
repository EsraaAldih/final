<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Book;
use App\Order;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
	{
		$users = User::all();
		$books = Book::all();
        return view('admin.index', compact('users', 'books'));
    }


    public function getBooksRation(){
        $categories = Category::all();
        //$cat = json_decode($cat);
        $array1 = [];
        $array2 = [];
        foreach($categories as $category){
            array_push($array1, $category->title);
            array_push($array2, $category->book()->count());
        }
        $array = ['label' => $array1, 'data' => $array2];
        
        return $array;
    }
    public function getOrdersRation(){
        $categories = Category::all();
        $array1 = [];
        $array2 = [];
        foreach ($categories as $category) {
            $orders = Book::where('category_id', $category->id)->pluck('sales');
            $sum = 0;
            foreach($orders as $order){
                $sum += $order;
            }
            array_push($array1, $category->title);
            array_push($array2, $sum);
        }
        $array = ['label' => $array1, 'data' => $array2];

        return $array;
    }
 

    public function mysearch(Request $request){
        
        if($request->has('search')){
            $books = Book::search($request->get('search'))->get();

            return view('admin.search.searchBooks',compact('books'));
        }
        else{

            $books = Book::get();

        }
        return view('admin.search.searchBooks',compact('books'));
    }





  
}