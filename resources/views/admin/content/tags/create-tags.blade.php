@extends('admin.master')
@section('title','Tambah Tags')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('tags.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Tags</label>
                            <input type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" value="{{ old('tags') }}" placeholder="Masukkan Tags">
                        
                            <!-- error message untuk content -->
                            @error('tags')
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
