<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(){
        $tags = Tags::all();

        return view('admin.content.tags.index-tags', compact('tags'));
    }

    public function create(){
        return view('admin.content.tags.create-tags');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'tags' => 'required',
        ]);

        $tags = Tags::create($validate);
        $tags->save();

        if ($tags) {
            return redirect()->route('tags.index')->with(['success' => 'Data Berhasil Di Input!']);
        } else {
            return redirect()->route('tags.index')->with(['error' => 'Data Gagal Di Input!']);
        }
    }

    public function edit(Tags $tag){
        $tag->find($tag->id)->all();

        return view('admin.content.tags.edit-tags', compact('tag'));
    }

    public function update(Request $request, Tags $tag){
        $validate = $request->validate([
            'tags' => 'required',
        ]);

        $tag->update($validate);

        if ($tag) {
            return redirect()->route('tags.index')->with(['success' => 'Data Berhasil Di Update!']);
        } else {
            return redirect()->route('tags.index')->with(['error' => 'Data Gagal Di Update!']);
        }
    }

    public function destroy(Tags $tag){
        $tag->find($tag->id)->all();
        
        $tag->delete();

        if ($tag) {
            return redirect()->route('tags.index')->with(['success' => 'Data Berhasil Di Delete!']);
        } else {
            return redirect()->route('tags.index')->with(['error' => 'Data Gagal Di Delete!']);
        }
    }
}

