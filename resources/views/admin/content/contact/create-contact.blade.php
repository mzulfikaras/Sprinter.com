@extends('admin.master')
@section('title','Tambah Contact')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">NOMOR TELEPON</label>
                            <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" name="nomor_telepon" value="{{ old('nomor_telepon') }}" placeholder="Masukkan Nomor">
                        
                            <!-- error message untuk menu -->
                            @error('nomor_telepon')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="font-weight-bold">EMAIL CONTACT</label>
                            <input type="text" class="form-control @error('email_contact') is-invalid @enderror" name="email_contact" value="{{ old('email_contact') }}" placeholder="Masukkan Email">
                        
                            <!-- error message untuk menu -->
                            @error('email_contact')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">ALAMAT CONTACT</label>
                            <input type="text" class="form-control @error('alamat_contact') is-invalid @enderror" name="alamat_contact" value="{{ old('alamat_contact') }}" placeholder="Masukkan Alamat">
                        
                            <!-- error message untuk menu -->
                            @error('alamat_contact')
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


                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection