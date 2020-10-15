@extends('admin.master')
@section('title','Tambah Author')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('author.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">NAMA AUTHOR</label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author') }}" placeholder="Masukkan Nama Author">
                        
                            <!-- error message untuk content -->
                            @error('author')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">DESKRIPSI AUTHOR</label>
                            <textarea class="form-control @error('deskripsi_author') is-invalid @enderror" name="deskripsi_author" rows="5" placeholder="Masukkan Deskripsi Author">{{ old('deskripsi_author') }}</textarea>
                        
                            <!-- error message untuk content -->
                            @error('deskripsi_author')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">UPLOAD</button>
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
        CKEDITOR.replace( 'deskripsi_author' );
    </script>
@endsection