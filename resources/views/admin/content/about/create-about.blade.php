@extends('admin.master')
@section('title','Tambah About')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('about.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">Title About</label>
                            <input type="text" class="form-control @error('about') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan Title">
                        
                            <!-- error message untuk content -->
                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group">
                                <label class="font-weight-bold">DESKRIPSI ABOUT</label>
                                <textarea class="form-control @error('deskripsi_about') is-invalid @enderror" name="deskripsi_about" rows="5" placeholder="Masukkan Deskripsi Blog">{{ old('deskripsi_about') }}</textarea>
                            
                                <!-- error message untuk content -->
                                @error('deskripsi_about')
                                    <div class="alert alert-danger mt-2">
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

@section('js')
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'deskripsi_about' );
    </script>

@endsection