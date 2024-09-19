<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
class TagsController extends Controller
{
    function tags(){
        $tags = Tag::all();
        return view('tags.tags',compact('tags'));
    }

    function tags_add(TagRequest $request){
        Tag::insert([
            'tag_name'=>$request->tag_name,
            'created_at'=>carbon::now(),
        ]);
        return redirect()->back()->with('tag', 'Tag added successfuly!');

    }

    function tag_delete($tag_id){
        Tag::find($tag_id)->delete();
        return redirect()->back()->with('tag_delete', 'Tag delete successfuly!');
    }
}
