@extends('admin.master')
@section('title','Tambah Menu')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">JUDUL</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul') }}" placeholder="Masukkan Judul">
                        
                            <!-- error message untuk menu -->
                            @error('judul')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                        
                            <!-- error message untuk title -->
                            @error('image')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="font-weight-bold" for="author_id">AUTHOR</label><br>
                            <select class="custom-select w-50" name="author_id">
                                <option selected>Pilih Author</option>
                                @foreach ($author as $a)
                                    <option value="{{$a->id}}" {{ (old('author_id') == "$a->id") ? 'selected': ''}}>
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
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5" placeholder="Masukkan Deskripsi Blog">{{ old('deskripsi') }}</textarea>
                        
                            <!-- error message untuk content -->
                            @error('deskripsi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="kategori_id">KATEGORI</label><br>
                            <select class="custom-select w-50 dynamic" name="kategori_id" id="kategori_id" data-dependent="kategori_id">
                                <option selected>Pilih Kategori</option>
                                @foreach ($kategori as $k)
                                    <option value="{{$k->id}}" {{ (old('kategori_id') == "$k->kategori") ? 'selected': ''}}>
                                        {{ucfirst($k->kategori)}}
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
                                @foreach ($daftar_tags as $tags)
                                    <option value="{{$tags->id}}">
                                        {{($tags->tags)}}
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
                                    <option value="{{$s->id}}" {{ (old('status_id') == "$s->status") ? 'selected' : '' }}>
                                        {{$s->status}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR PENDUKUNG 1</label>
                            <input type="file" class="form-control @error('image2') is-invalid @enderror" name="image2">
                        
                            <!-- error message untuk title -->
                            @error('image2')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR PENDUKUNG 2</label>
                            <input type="file" class="form-control @error('image3') is-invalid @enderror" name="image3">
                        
                            <!-- error message untuk title -->
                            @error('image3')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR PENDUKUNG 3</label>
                            <input type="file" class="form-control @error('image4') is-invalid @enderror" name="image4">
                        
                            <!-- error message untuk title -->
                            @error('image4')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

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

    {{-- <script>

        $(".js-example-placeholder-multiple").select2({
            placeholder: "Select TAGS"
        });

    </script> --}}

@endsection

