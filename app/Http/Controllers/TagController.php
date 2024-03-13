<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        $tags = Tag::all();
        return view('tags.index',['tag' => $tags]);
    }
    public function create(){
        return view('tags.create');
    }
    public function store(Request $request){
        $request -> validate([
            'name' => 'required'
        ]);
        Tag::create([
            'name' => $request -> name
        ]);
        return redirect(route('tags.index'));
    }
    public function show(){}
    public function update(Request $request, Tag $tag){
        $request -> validate([
            'name' => 'required'
        ]);
        $tag -> update([
            'name' => $request -> name
        ]);
        return redirect(route('tags.index'));
    }
    public function edit(Tag $tag){
        return view('tags.edit', ['tag' => $tag]);
    }
    public function destroy(Tag $genre)
    {
        $genre->delete();
        return redirect(route('tags.index'));
    }
}