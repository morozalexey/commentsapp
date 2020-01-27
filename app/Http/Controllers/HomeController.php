<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Comment;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        $avatar = User::find(1)->avatar;
        $user = Auth::user();
        $comments = Comment::latest()->where('hide', 0)->get();               
        return view('home', ['comments' => $comments, 'user' => $user]);
    }

    public function faker()
    {
        factory(App\Comment::class, 5)->create();
        return view('home');
    } 

    public function admin(Request $request)
    {   
        $comments = Comment::all();
        return view('admin', ['comments' => $comments]);
    }

    public function store(Request $request){        
        /*
        $avatar = Auth::user()->avatar;

        $comment = new Comment();

        $comment->dt_add = now();
        $comment->text = request('text');
        $comment->name = Auth::user()->name;
        $comment->user_id = Auth::user()->id;



        dd($avatar);

        $comment->save();

        return redirect('/home');
        */
        $comment = Comment::first();  
        dd(($comment->user)->avatar);

    }


}

