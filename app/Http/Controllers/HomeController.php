<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

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
        $comments = Comment::latest()->where('hide', 0)->paginate(5);
        
        //не работает
        $user_id = $comments->pluck('user_id');
        $avatar = User::where('id', $user_id)->get('avatar');  
               
                      
        return view('comments.home', ['comments' => $comments, 'avatar' => $avatar]);
    }

    public function faker()
    {
        factory(App\Comment::class, 5)->create();
        return view('comments.home');
    } 

    public function admin(Request $request)
    {   
        $comments = Comment::latest()->get();
        return view('comments.admin', ['comments' => $comments]);
    }

    public function create(Request $request){
        
        $this->validate($request, [
            'text' => 'required'
        ]);        
           
        $comment = new Comment();

        $comment->dt_add = now();
        $comment->text = request('text');
        $comment->name = Auth::user()->name;
        $comment->user_id = Auth::user()->id;

        $comment->save();
            
        return redirect()->route('comments.index');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('comments.profile', ['user' => $user]);
    }

    public function hide(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->hide = 1;
        $comment->save();
        return redirect()->route('comments.admin');
    }

    public function show(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->hide = 0;
        $comment->save();
        return redirect()->route('comments.admin');
    }

     public function destroy($id)
    {
        Comment::find($id)->delete();
        return redirect()->route('comments.admin');
    }


}

