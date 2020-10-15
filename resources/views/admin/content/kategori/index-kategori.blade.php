@extends('admin.master')
@section('title', 'KATEGORI')

@section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <a href="{{ route('kategori.create') }}" class="btn btn-md btn-success mb-3">TAMBAH KATEGORI</a>
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
                            <th>Kategori</th>
                            <th>Gambar Kategori</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Kategori</th>
                            <th>Gambar Kategori</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                           @foreach ($kategori as $k)
                           <tr>
                               <td>{{$k->kategori}}</td>
                               <td><img src="{{ Storage::url('public/blogs/kategori/').$k->image_kategori }}" alt="GAGAL LOAD" class="rounded" width="150px"></td>
                               <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kategori.destroy', $k->id) }}" method="POST">
                                        <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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