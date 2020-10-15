@extends('admin.master')
@section('title','Edit Kategori')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('kategori.update', $kategori->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Kategori</label>
                            <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{ old('kategori', $kategori->kategori) }}" placeholder="Masukkan Kategori">
                        
                            <!-- error message untuk content -->
                            @error('kategori')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group">
                                <label class="font-weight-bold">GAMBAR KATEGORI</label><br>
                                <img src="{{ Storage::url('public/blogs/kategori/').$kategori->image_kategori }}" alt="GAGAL LOAD" class="rounded" width="200px">
                                <input type="file" class="form-control" name="image_kategori">
                            </div>
                
                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
