@extends('admin.master')
@section('title', 'SUB KATEGORI')

@section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <a href="{{ route('subkategori.create') }}" class="btn btn-md btn-success mb-3">TAMBAH SUB KATEGORI</a>
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
                            <th>SUB KATEGORI</th>
                            <th>KATEGORI</th>
                            <th>ACTION</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>SUB KATEGORI</th>
                            <th>KATEGORI</th>
                            <th>ACTION</th>
                          </tr>
                        </tfoot>
                        <tbody>
                           @foreach ($sub_kategori as $sub)
                           <tr>
                               <td>{{$sub->sub_kategori}}</td>
                               <td>{{$sub->kategori->kategori}}</td>
                               <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('subkategori.destroy', $sub->id) }}" method="POST">
                                        <a href="{{ route('subkategori.edit', $sub->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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