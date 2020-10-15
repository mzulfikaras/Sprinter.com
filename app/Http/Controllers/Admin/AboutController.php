<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Controllers\Controller;
use App\Status;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::all();

        return view('admin.content.about.index-about',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = Status::all();

        return view('admin.content.about.create-about', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'deskripsi_about' => 'required',
            'status_id' => 'required',
        ]);

        $about = About::create($validate);
        $about->save();

        if($about){
            return redirect()->route('about.index')->with(['success' =>'Data Berhasil Di Input!']);
        }
        else{
            return redirect()->route('about.index')->with(['error' => 'Data Gagal Di Input!']);
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
    public function edit(About $about)
    {
        $status = Status::all();
        $about->find($about->id)->all();

        return view('admin.content.about.edit-about', compact('status','about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $validate = $request->validate([
            'title' => 'required',
            'deskripsi_about' => 'required',
            'status_id' => 'required',
        ]);

        $about->update($validate);

        if($about){
            return redirect()->route('about.index')->with(['success' =>'Data Berhasil Di Update!']);
        }
        else{
            return redirect()->route('about.index')->with(['error' => 'Data Gagal Di Update!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        $about->find($about->id)->all();

        $about->delete();

        if ($about) {
            return redirect()->route('about.index')->with(['success' => 'Data Berhasil Di Delete!']);
        } else {
            return redirect()->route('about.index')->with(['error' => 'Data Berhasil Di Delete!']);
        }
        
    }
}
