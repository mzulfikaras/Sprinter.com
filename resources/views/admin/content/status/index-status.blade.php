@extends('admin.master')
@section('title', 'KATEGORI')

@section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <a href="{{ route('status.create') }}" class="btn btn-md btn-success mb-3">TAMBAH STATUS</a>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Status Tables</h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>STATUS</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>STATUS</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                           @foreach ($status as $s)
                           <tr>
                               <td>{{$s->status}}</td>
                               <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('status.destroy', $s->id) }}" method="POST">
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