<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Blog;
use App\Http\Controllers\Controller;
use App\Kategori;
use App\SubKategori;
use App\Tags;
use App\Status;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Blog::all();
        return view('admin.content.blog.index-blog', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $author = Author::all();
        $kategori = Kategori::all();
        $daftar_tags = Tags::all();
        $status = Status::all();

        return view('admin.content.blog.create-blog',compact('kategori','daftar_tags','status','author'));
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
            'judul' => 'required|min:5',
            'author_id' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'deskripsi' => '',
            'tanggal' => '',
            'kategori_id' => 'required',
            'status_id' => 'required',
            'image2' => '',
            'image3' => '',
            'image4' => '',
        ]);

        $image = $request->file('image');
        $image2 = $request->file('image2');
        $image3 = $request->file('image3');
        $image4 = $request->file('image4');
        

        if($request->file('image2') == "" && $request->file('image3') == "" && $request->file('image4') == "" ){
            
            $image->storeAs('public/blogs/blogs1', $image->hashName());
            
            $blog = Blog::create([
                'judul' => $request->judul,
                'author_id' => $request->author_id,
                'image' => $image->hashName(),
                'deskripsi' => $request->deskripsi,
                'tanggal' => date('Y-m-d'),
                'kategori_id' => $request->kategori_id,
                'status_id' => $request->status_id,
            ]);

            $blog->tags()->attach($request->tags);

        } else {
            
            $image2->storeAs('public/blogs/blogs1', $image->hashName());
            $image3->storeAs('public/blogs/blogs2', $image2->hashName());
            $image2->storeAs('public/blogs/blogs3', $image3->hashName());
            $image3->storeAs('public/blogs/blogs4', $image4->hashName());

            $blog = Blog::create([
                'judul' => $request->judul,
                'author_id' => $request->author_id,
                'image' => $image->hashName(),
                'deskripsi' => $request->deskripsi,
                'tanggal' => date('Y-m-d'),
                'kategori_id' => $request->kategori_id,
                'status_id' => $request->status_id,
                'image2' => $image2->hashName(),
                'image3' => $image3->hashName(),
                'image4' => $image4->hashName(),
            ]);

            $blog->tags()->attach($request->tags);
        }

 


        if($blog){
            return redirect()->route('blog.index')->with(['success' => 'Berhasil Input Data']);
        } else {
            return redirect()->route('blog.index')->with(['error' => 'Gagal Input Data']);
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
    public function edit(Blog $blog)
    {
        $blog->find($blog->id)->all();

        $author = Author::all();
        $kategori = Kategori::all();
        $daftar_tags = Tags::all();
        $status = Status::all();

        return view('admin.content.blog.edit-blog', compact('blog','kategori','daftar_tags','status','author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blog $blog)
    {
        $this->validate($request, [
            'judul' => 'required|min:5',
            'author_id' => 'required',
            'deskripsi' => '',
            'kategori_id' => 'required',
            'status_id' => 'required',
        ]);

        $blog = Blog::findOrFail($blog->id);

        if($request->file('image') == ""){
            
            $blog->update([
                'judul' => $request->judul,
                'author_id' => $request->author_id,
                'deskripsi' => $request->deskripsi,
                'tanggal' => date('Y-m-d'),
                'kategori_id' => $request->kategori_id,
                'status_id' => $request->status_id,
            ]);

            $blog->tags()->sync($request->tags);

        } 
        
        else {

            // hapus gambar local yang di update
            Storage::disk('local')->delete('public/blogs/blogs1/'.$blog->image);
            
            // input gambar baru
            $image = $request->file('image');
            $image->storeAs('public/blogs/blogs1', $image->hashName());
    
            $blog->update([
                'judul' => $request->judul,
                'author_id' => $request->author_id,
                'image'     => $image->hashName(),
                'deskripsi' => $request->deskripsi,
                'tanggal' => date('Y-m-d'),
                'kategori_id' => $request->kategori_id,
                'status_id' => $request->status_id, 
            ]);
            
            $blog->tags()->sync($request->tags);
        }
            

        if($blog){
            return redirect()->route('blog.index')->with(['success' => 'Berhasil Edit Data']);
        } else {
            return redirect()->route('blog.index')->with(['error' => 'Gagal Edit Data']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->find($blog->id)->all();

        $blog->delete();

        if($blog){
            return redirect()->route('blog.index')->with(['success' => 'Berhasil Delete Data']);
        } else {
            return redirect()->route('blog.index')->with(['error' => 'Gagal Delete Data']);
        }

    }
}
