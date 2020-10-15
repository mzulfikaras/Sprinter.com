@extends('admin.master')
@section('title', 'TAGS')

@section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <a href="{{ route('tags.create') }}" class="btn btn-md btn-success mb-3">TAMBAH TAGS</a>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tags Table</h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Tags</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Tags</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                           @foreach ($tags as $t)
                           <tr>
                               <td>{{$t->tags}}</td>
                               <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('tags.destroy', $t->id) }}" method="POST">
                                        <a href="{{ route('tags.edit', $t->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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