<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Authoractivemail;
use App\Mail\AuthorDeactivemail;


class AuthorController extends Controller
{

    function singup(){
        return view('home.singup');
    }
    function singin(){
        return view('home.singin');
    }
    function auth_store(Request $request){
        Author::insert([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'created_at'=>carbon::now(),
        ]);
        return redirect()->back()->with('author', 'Your account is pending for admin aproval');

    }

    function auth_singin(Request $request){
        if(Author::where('email',$request->email)->exists()){
         if(Auth::guard('author')->attempt(['email'=>$request->email,'password' => $request->password])){
           if(Auth::guard('author')->user()->status != 1){
            return back()->with('aprove','Your Account Is Pending');
           }
           else{
            return redirect('/');
           }
         }
         else{
            return back();
         }
        }
        else{
            return back();
        }
    }
    function authors(){
        $authors = Author::all();
        return view('author.aprove_author',[
            'authors'=>$authors,
        ]);
    }

    function author_dashboard(){
        return view('author.dashbord');
    }
    
    function authors_logout(){
        Auth::guard('author')->logout();
        return redirect('/');
    }
    function authors_status($Author_id) {
        $author = Author::find($Author_id);

        if ($author) {
            $author->status = $author->status == 1 ? 0 : 1;
            $author->save();
            if ($author->status == 1) {
                Mail::to($author->email)->send(new Authoractivemail($author));
            }
            else {
                Mail::to($author->email)->send(new AuthorDeactivemail($author));
            }

            return back()->with('status', 'Author status updated successfully!');
        }
        else {
            return back()->with('error', 'Author not found!');
        }
    }


}
