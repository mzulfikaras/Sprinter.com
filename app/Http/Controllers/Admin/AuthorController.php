<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = Author::all();

        return view('admin.content.author.index-author', compact('author'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.author.create-author');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'author' => 'required|min:5',
            'deskripsi_author' => 'required',
        ]);

        $author = Author::create([
            'author' => $request->author,
            'deskripsi_author' => $request->deskripsi_author,
        ]);

        if($author){
            return redirect()->route('author.index')->with(['success' => 'Berhasil Input Data!']);
        } else {
            return redirect()->route('author.index')->with(['error' => 'Gagal Input Data!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('admin.content.author.edit-author', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $this->validate($request, [
            'author' => 'required|min:5',
            'deskripsi_author' => 'required',
        ]);

        $author->findOrFail($author->id);

        $author->update([
            'author' => $request->author,
            'deskripsi_author' => $request->deskripsi_author,
        ]);

        if ($author) {
            return redirect()->route('author.index')->with(['success' => 'Data Berhasil Di Update!']);
        } else {
            return redirect()->route('author.index')->with(['error' => 'Data Gagal Di Update']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->find($author->id)->all();

        $author->delete();

        if ($author) {
            return redirect()->route('author.index')->with(['success' => 'Data Berhasil Di Delete!']);
        }
        else {
            return redirect()->route('author.index')->with(['erorr' => 'Data Gagal Di Delete!']);
        }
    }
}
