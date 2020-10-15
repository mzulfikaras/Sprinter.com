<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();

        return view('admin.content.kategori.index-kategori',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.kategori.create-kategori');
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
            'kategori' => 'required|min:5',
            'image_kategori' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        
        $image_kategori = $request->file('image_kategori');
        $image_kategori->storeAs('public/blogs/kategori', $image_kategori->hashName());

        $kategori = Kategori::create([
            'kategori' => $request->kategori,
            'image_kategori' => $image_kategori->hashName(),
        ]);

        if($kategori){
            return redirect()->route('kategori.index')->with(['success' => 'Berhasil Input Data']);
        } else {
            return redirect()->route('kategori.index')->with(['error' => 'Gagal Input Data']);
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
    public function edit(Kategori $kategori)
    {
        $kategori->find($kategori->id)->all();

        return view('admin.content.kategori.edit-kategori',compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $this->validate($request, [
            'kategori' => 'required',
        ]);

        $kategori = Kategori::findOrFail($kategori->id);

        if ($request->file('image_kategori')  == "") {
            
            $kategori->update([
                'kategori' => $request->kategori,
            ]);    
        
        } 
        else {
            
            Storage::disk('local')->delete('public/blogs/kategori/'.$kategori->image_kategori);

            $image_kategori = $request->file('image_kategori');
            $image_kategori->storeAs('public/blogs/kategori', $image_kategori->hashName());
            
            $kategori->update([
                'kategori' => $request->kategori,
                'image_kategori' => $image_kategori->hashName(),
            ]);  
        }
    
        
        if($kategori){
            return redirect()->route('kategori.index')->with(['success' => 'Berhasil Update Data']);
        } else {
            return redirect()->route('kategori.index')->with(['error' => 'Gagal Update Data']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->find($kategori->id)->all();

        $kategori->delete();

        if($kategori){
            return redirect()->route('kategori.index')->with(['success' => 'Berhasil Delete Data']);
        } else {
            return redirect()->route('kategori.index')->with(['error' => 'Gagal Delete Data']);
        }
    }
}
