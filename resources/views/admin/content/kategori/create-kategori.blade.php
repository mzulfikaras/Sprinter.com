@extends('admin.master')
@section('title','Tambah Kategori')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('kategori.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Kategori</label>
                            <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{ old('kategori') }}" placeholder="Masukkan Kategori">
                        
                            <!-- error message untuk content -->
                            @error('kategori')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group">
                                <label class="font-weight-bold">GAMBAR KATEGORI</label>
                                <input type="file" class="form-control @error('image_kategori') is-invalid @enderror" name="image_kategori">
                            
                                <!-- error message untuk title -->
                                @error('image_kategori')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                
                            <button type="submit" class="btn btn-md btn-primary">UPLOAD</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

