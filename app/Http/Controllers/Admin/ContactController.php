<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\PageContact;
use App\Http\Controllers\Controller;
use App\Status;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPage()
    {
        $page = PageContact::all();
        return view('admin.content.contact.page-contact', compact('page'));
    }

    public function index()
    {
        $kontak = Contact::all();
        return view('admin.content.contact.index-contact', compact('kontak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = Status::all();
        return view('admin.content.contact.create-contact',compact('status'));
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
            'nomor_telepon' => 'required',
            'email_contact' => 'required',
            'alamat_contact' => 'required',
            'status_id' => 'required',
        ]);

        $kontak = Contact::create($validate);
        $kontak->save();

        if($kontak){
            return redirect()->route('contact.index')->with(['success' => 'Berhasil Input Data']);
        } else {
            return redirect()->route('contact.index')->with(['error' => 'Gagal Input Data']);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
