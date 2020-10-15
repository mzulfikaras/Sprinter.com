<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kategori;
use App\SubKategori;
use Illuminate\Http\Request;

class SubKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_kategori = SubKategori::all();

        return view('admin.content.subkategori.index-sub',compact('sub_kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.content.subkategori.create-sub',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'sub_kategori' => 'required',
            'kategori_id' => 'required',
        ]);

        $sub_kategori = SubKategori::create([
            'sub_kategori' => $request->sub_kategori,
            'kategori_id' => $request->kategori_id,
        ]);

        if ($sub_kategori) {
            return redirect()->route('subkategori.index')->with(['success' => 'Data Berhasil Di input!']);
        } else {
            return redirect()->route('subkategori.index')->with(['error' => 'Data Gagal Di Input!']);
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
    public function edit(SubKategori $subkategori)
    {
        $subkategori->find($subkategori->id)->all();
        $kategori = Kategori::all();

        return view('admin.content.subkategori.edit-sub', compact('subkategori','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubKategori $subkategori)
    {
        $this->validate($request, [
            'sub_kategori' => 'required',
            'kategori_id' => 'required',
        ]);

        $subkategori->update([
            'sub_kategori' => $request->sub_kategori,
            'kategori_id' => $request->kategori_id,
        ]);

        if ($subkategori) {
            return redirect()->route('subkategori.index')->with(['success' => 'Data Berhasil Di Update!']);
        }
        else {
            return redirect()->route('subkategori.index')->with(['error' => 'Data Gagal Di Update!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubKategori $subkategori)
    {
        $subkategori->find($subkategori->id)->all();

        $subkategori->delete();

        if ($subkategori) {
            return redirect()->route('subkategori.index')->with(['success' => 'Data Berhasil Di Delete!']);
        }
        else {
            return redirect()->route('subkategori.index')->with(['error' => 'Data Gagal Di Delete!']);
        }
    }
}
