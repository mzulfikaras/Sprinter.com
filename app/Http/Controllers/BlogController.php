<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use App\Contact;
use App\Kategori;
use App\PageContact;
use App\Tags;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semua = Blog::orderBy('created_at','DESC')
        ->where('status_id',1)
        ->take(4)
        ->get();

        $kategori = Kategori::all();
        $daftar_tags = Tags::all();
        return view('user.content.home.home', compact('semua','kategori','daftar_tags'));
    }

    public function detail(){
        return view('user.content.postdetail');
    }

    public function list(){
        return view('user.content.postlist');
    }

    public function about(){
        return view('user.content.about.about');
    }

    public function contact(){
        $kontak = Contact::where('status_id',1)->get();
        return view('user.content.contact.contact',compact('kontak'));
    }

    public function contactStore(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required',
            'subject' => 'required|min:5',
            'message' => 'required|min:20|max:225'
        ]);

        $page = PageContact::create($validate);
        $page->save();

        return redirect()->route('contact.user.store');

    }

}
