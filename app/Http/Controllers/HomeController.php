<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $comments = DB::table('comments')
        ->leftJoin('users', 'users.id', '=', 'comments.user_id')
        ->where('hide', 0)
        ->orderBy('dt_add', 'desc')
        ->paginate(5);         
                    
        return view('comments.home', ['comments' => $comments]);
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

    public function changeavatar(Request $request)
    {
        $user_id = Auth::user()->id;
        $currentavatar = DB::table('users')->select('*')->where('id', $user_id)->first();
        if ($currentavatar != null) {
            Storage::delete($currentavatar->avatar);
        }

        $avatar = $request->file('avatar');
        $filename = $request->avatar->store('uploads');
        DB::table('users')->where('id', $user_id)->update(
            ['avatar' => $filename]
        );
        return redirect()->route('comments.profile');        
    }

    public function changename(Request $request)
    {   
        $user_id = Auth::user()->id;
        $name = $request->input('name');        
        DB::table('users')->where('id', $user_id)->update(
            ['name' => $name]
        );
        return redirect()->route('comments.profile');  
    }

    public function changeemail(Request $request)
    {
        $user_id = Auth::user()->id;
        $email = $request->input('email');        
        DB::table('users')->where('id', $user_id)->update(
            ['email' => $email]
        );
        return redirect()->route('comments.profile');
    }
}

