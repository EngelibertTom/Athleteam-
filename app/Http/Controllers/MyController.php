<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function profile() {

        $user = User::find(Auth::user()->id);
        $utilisateur = User::with('posts')->find(Auth::user()->id);
        $profil = DB::table('profiles')->get();

        return view('profil',
            ['user'=>$user,
            'profil'=>$profil,
                'utilisateur' => $utilisateur] );
    }


    public function home() {

        if (!Auth::check()) {
            // User is not authenticated, handle the error
            // Redirect to a login page or show an error message
            return redirect()->route('login');
        }


        $user = Auth::user();
        $subscriptions = $user->IFollow()->pluck('followed_id');

        $names = DB::table('users')->get();
        $profiles = Profile::all();
        $posts = DB::table('post')
            ->whereIn('user_id', $subscriptions)
            ->where('Sport', 'Basketball')
            ->get();


        $foot = DB::table('post')
            ->whereIn('user_id', $subscriptions)
            ->where('Sport', 'Football')
            ->get();


        return view('home' ,
            ['names'=>$names,
              'profiles'=>$profiles,
              'post' => $posts,
                'foot'=> $foot]);


    }

    public function otherprofil($id) {

        $utilisateur = Auth::id();
        $role = Profile::where('user_id',$utilisateur)->first()->role;

        $user = User::findOrFail($id);
        $profile = Profile::where('user_id', $id)->first();

        return view("otherprofil" , [

            "user"=> $user,
            "profile"=> $profile,
            "role"=>$role
            ]);

    }

    public function update(Request $request ){

        $request->validate([
            'city' =>'required|min:3|max:25',
            'num'=> 'required|min:3|max:25',
            'image' => 'required|file|mimes:jpg,bmp,png,gif'
        ]);

        $id = Auth::id();
        $fileName = $request->file('image')->hashName();


        $p = Profile::where('user_id', $id)->first() ;
        if($p) {
            $p->url =  $request->file("image")->move('uploads/'.Auth::id() , $fileName);
            $p->city = $request->input('city');
            $p->mobile = $request->input('num');
            $p->description = $request->input('description');
            $p->user_id = Auth::id();
            $p->save();
        }

        return back();

    }

    public function createpost(Request $request) {

        $fileName = $request->file('image')->hashName();

        $p = New Post();
        $p->title = $request->input('titre');
        $p->content = $request->input('contenu');
        $p->image = $request->file('image')->move('post/'.Auth::id() , $fileName);
        $p->author =$request->user()->name;
        $p->Sport =$request->input('sport');
        $p->user_id = Auth::id();
        $p->save();

        return back();
    }

    public function follow($id) {
        // Check if user is authenticated
        if (Auth::check()) {
            Auth::user()->IFollow()->toggle($id);
        } else {
            // User is not authenticated, handle the error
            // Redirect to a login page or show an error message
            return redirect()->route('login');
        }

        return back();
    }

    public function post($id)
    {
    $post = Post::where('id', $id)->first();
    $comments = $post->comments;

        return view("post" , [
            "post"=> $post,
            "comment"=>$comments
        ]);
    }

    public function store(Request $request)
    {
        $id = Auth::id();
        $comment = new Comment();
        $comment->post_id = $request->input('post_id');
        $comment->content = $request->input('content');
        $comment->auteur = Auth::user()->name;
        $comment->pdp = Profile::where('user_id', $id)->first()->url;
        // Vous pouvez également définir d'autres champs du commentaire si nécessaire
        $comment->save();

        return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');
    }

    public function becoach($id){

        $update = Profile::where('user_id', $id)->first();
        if (auth()->user()->profile->hasRole('admin')) {
            $update->role = "coach";
            $update->save();
        }
        return redirect()->back()->with('success', 'Le rôle de coach a été attribué avec succès à l\'utilisateur.');
    }

    public function notbecoach($id){

        $update = Profile::where('user_id', $id)->first();
        if (auth()->user()->profile->hasRole('admin')) {
            $update->role = "member";
            $update->save();
        }
        return redirect()->back()->with('success', 'Le rôle de coach a été retiré');
    }

    public function coach() {
        $profiles = Profile::where('role', "coach")->get();

        return view("coach", [
            "profiles"=>$profiles
        ]);

        }

    public function updateForm()
    {
        return view('update-form');
    }

}
