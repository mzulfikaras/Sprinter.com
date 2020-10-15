@extends('admin.master')
@section('title','Edit Blog')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('blog.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">JUDUL</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul', $blog->judul) }}" placeholder="Masukkan Judul">
                            
                            <!-- error message untuk menu -->
                            @error('judul')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR</label><br>
                            <img src="{{ Storage::url('public/blogs/blogs1/').$blog->image }}" alt="GAGAL LOAD" class="rounded" width="200px">
                            <input type="file" class="form-control" name="image">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="author_id">AUTHOR</label><br>
                            <select class="custom-select w-50" name="author_id">
                                <option selected>Pilih Author</option>
                                @foreach ($author as $a)
                                    <option value="{{$a->id}}" {{ (old('author_id') ?? $blog->author_id  == $a->id) ? 'selected': ''}}>
                                        {{$a->author}}
                                    </option>
                                @endforeach
                              </select>
                            @error('author_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        

                        <div class="form-group">
                            <label class="font-weight-bold">DESKRIPSI</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5" placeholder="Masukkan Deskripsi Menu">{{ old('deskripsi', $blog->deskripsi) }}</textarea>
                        
                            <!-- error message untuk content -->
                            @error('deskripsi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="kategori_id">KATEGORI</label><br>
                            <select class="custom-select w-50" name="kategori_id">
                                <option selected>Pilih Kategori</option>
                                @foreach ($kategori as $k)
                                    <option value="{{$k->id}}" {{ (old('kategori_id') ?? $blog->kategori_id  == $k->id) ? 'selected': ''}}>
                                        {{$k->kategori}}
                                    </option>
                                @endforeach
                              </select>
                            @error('kategori_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="tags">TAGS</label><br>
                            <select class="custom-select w-50 dynamic js-example-placeholder-multiple js-states form-control" multiple="multiple" name="tags[]">
                                {{-- <option selected>Pilih Tags</option> --}}
                                @foreach ($daftar_tags as $tampil_tags)
                                    <option value="{{$tampil_tags->id}}">
                                        {{($tampil_tags->tags)}}
                                    </option>
                                @endforeach
                              </select>
                            @error('kategori_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="status_id">STATUS</label><br>
                            <select name="status_id" class="custom-select w-50">
                                <option selected>Pilih Status</option>
                                @foreach ($status as $s)
                                    <option value="{{$s->id}}" {{ (old('status_id') ?? $blog->status_id == $s->id) ? 'selected' : '' }}>
                                        {{$s->status}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label class="font-weight-bold">GAMBAR PENDUKUNG 1</label><br>
                            <img src="{{ Storage::url('public/blogs/blogs2/').$blog->image2 }}" alt="TIDAK ADA GAMBAR" class="rounded" width="200px">
                            <input type="file" class="form-control" name="image">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR PENDUKUNG 2</label><br>
                            <img src="{{ Storage::url('public/blogs/blogs3/').$blog->image3 }}" alt="TIDAK ADA GAMBAR" class="rounded" width="200px">
                            <input type="file" class="form-control" name="image">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR PENDUKUNG 3</label><br>
                            <img src="{{ Storage::url('public/blogs/blogs4/').$blog->image4 }}" alt="TIDAK ADA GAMBAR" class="rounded" width="200px">
                            <input type="file" class="form-control" name="image">
                        </div> --}}

                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'deskripsi' );
    </script>

    <script>

        $(".js-example-placeholder-multiple").select2().val({
            !! json_encode($blog->tags()->allRelatedIds() ) !!
        }).trigger('change');

    </script>
@endsection