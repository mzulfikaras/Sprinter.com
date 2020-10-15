@extends('admin.master')
@section('title','Tambah Status')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('status.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">Status</label>
                            <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}" placeholder="Masukkan Status">
                        
                            <!-- error message untuk content -->
                            @error('status')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                
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