@extends('admin.master')
@section('title','CONTACT FOR PAGE')
    
@section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <a href="{{ route('contact.create') }}" class="btn btn-md btn-success mb-3">TAMBAH CONTACT</a>
                  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>
      
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Page User Contact Tables</h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Nomor Telepon</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Nomor Telepon</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($kontak as $kt)
                            <tr>
                              <td>{{ $kt->nomor_telepon }}</td>
                              <td>{{ $kt->email_contact}}</td>
                              <td>{{ $kt->alamat_contact }}</td>
                              <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('contact.destroy', $kt->id) }}" method="POST">
                                    <a href="{{ route('contact.edit', $kt->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
      
              </div>
              <!-- /.container-fluid -->
      
            </div>
@endsection