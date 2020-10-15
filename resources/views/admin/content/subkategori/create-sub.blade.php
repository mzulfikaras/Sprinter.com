@extends('admin.master')
@section('title','Tambah SubKategori')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('subkategori.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">SUBKATEGORI</label>
                            <input type="text" class="form-control w-50 @error('sub_kategori') is-invalid @enderror" name="sub_kategori" value="{{ old('sub_kategori') }}" placeholder="Masukkan SubKategori">
                        
                            <!-- error message untuk content -->
                            @error('sub_kategori')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">KATEGORI</label><br>
                            <select class="custom-select w-50 dynamic" name="kategori_id" id="kategori_id" data-dependent="kategori_id">
                                <option selected>Pilih Kategori</option>
                                @foreach ($kategori as $k)
                                    <option value="{{$k->id}}" {{ (old('kategori_id') == "$k->kategori") ? 'selected': ''}}>
                                        {{ucfirst($k->kategori)}}
                                    </option>
                                @endforeach
                            </select>
 
                            <!-- error message untuk content -->
                            @error('kategori_id')
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