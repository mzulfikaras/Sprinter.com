@extends('admin.master')
@section('title','Edit Kategori')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('author.update', $author->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="font-weight-bold">NAMA AUTHOR</label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author', $author->author) }}" placeholder="Masukkan Author">
                        
                            <!-- error message untuk content -->
                            @error('author')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">DESKRIPSI AUTHOR</label>
                            <textarea class="form-control @error('deskripsi_author') is-invalid @enderror" name="deskripsi_author" rows="5" placeholder="Masukkan Deskripsi Author">{{ old('deskripsi_author', $author->deskripsi_author) }}</textarea>
                        
                            <!-- error message untuk content -->
                            @error('author')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection