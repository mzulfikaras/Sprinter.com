@extends('admin.master')
@section('title', 'ABOUT')

@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <a href="{{ route('about.create') }}" class="btn btn-md btn-success mb-3">TAMBAH ABOUT</a>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">About Tables</h6>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th>Title</th>
                                <th>Deskripsi About</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>Title</th>
                                <th>Deskripsi About</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </tfoot>
                            <tbody>
                               @foreach ($about as $ab)
                               <tr>
                                   <td>{{$ab->title}}</td>
                                   <td>{{$ab->deskripsi_about}}</td>
                                   <td>{{$ab->status->status}}</td>
                                   <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('about.destroy', $ab->id) }}" method="POST">
                                            <a href="{{ route('about.edit', $ab->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                               </tr>
                               @endforeach
                            </tbody>
                          </table>
                          {{-- {{ $kategori->links() }} --}}
                        </div>
                      </div>
                    </div>
          
                  </div>
                  <!-- /.container-fluid -->
          
            </div>
@endsection