@extends('admin.master')
@section('title', 'AUTHOR')

@section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <a href="{{ route('author.create') }}" class="btn btn-md btn-success mb-3">TAMBAH AUTHOR</a>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kategori Tables</h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>AUTHOR</th>
                            <th>DESKRIPSI AUTHOR</th>
                            <th>ACTION</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>AUTHOR</th>
                            <th>DESKRIPSI AUTHOR</th>
                            <th>ACTION</th>
                          </tr>
                        </tfoot>
                        <tbody>
                           @foreach ($author as $a)
                           <tr>
                               <td>{{$a->author}}</td>
                               <td>{{$a->deskripsi_author}}</td>
                               <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('author.destroy', $a->id) }}" method="POST">
                                        <a href="{{ route('author.edit', $a->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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