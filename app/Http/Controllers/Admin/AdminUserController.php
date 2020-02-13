<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Support\Facades\Session\Auth;
use App\Role;
use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{

    public function create()
    {
        return view('admin.users.createBookStore');
    }

    public function store(Request $request)
    {
        $this->validateWith([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users'
        ]);

        if (request()->has('avatar')) {
            $avatar = request()->file('avatar');
            $avatar_name = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar_path = public_path('coverpages/');
            $avatar->move($avatar_path, $avatar_name);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->avatar = $request->avatar;
            $user->save();
            $user->attachRole('administrator');
        } else {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $user->attachRole('administrator');
        }

        $users = User::paginate(20);
        Session::flash('Store_added', 'bookStore Added Successfully.');

        return redirect()->back();
    }

    public function ban(Request $request, $id)

    {
        $user = User::where('id', $id)->first();
        if (!empty($user)) {
            $user->ban();
        }
        $users = User::orderBy('id')->withBanned()->paginate(10);

        return view('admin.users.index', ['users' => $users]);
    }

    public function revoke(Request $request, $id)

    {
        $user = User::onlyBanned()->where('id', $id)->first();
        if (!empty($user)) {
            $user->unban();
        }
        $users = User::orderBy('id')->withBanned()->paginate(10);

        return view('admin.users.index', ['users' => $users]);
    }



    public function users()
    {
        $users = User::paginate(20);

        return view('admin.users.index', compact('users'));
    }


    public function comment()
    {
        $comments = Comment::paginate(20);
        return view('admin.users.comment', compact('comments'));
    }

    public function deleteComment(Request $request)
    {

        $comments = Comment::findOrFail($request->checkBoxArray);
        foreach ($comments as $comment) {

            $book = Book::findOrFail($comment->book_id);

            $book->decrement('reviews', 1);
            $book->decrement('count_rating', $comment->rating);

            $book['avg_rating'] = floor($book->count_rating / $book->reviews);
            $book->save();

            $comment->delete();
        }
        return redirect()->back();

        return $request->all();
    }

    public function delete(Request $request)
    {
        $users = User::findOrFail($request->checkBoxArray);
        foreach ($users as $user) {
            if (is_file(public_path() . $user->avatar)) {
                unlink(public_path() . $user->avatar);
            }
            $user->delete();
        }
        return redirect()->back();
    }



    public function userSearch(Request $request){
        
        if($request->has('search')){
            $users =User::search($request->get('search'))->get();
            dd($users);

        }
        else{

            $users = User::get();

        }
        return view('admin.users.searchUser',compact('users'));
    }
}
