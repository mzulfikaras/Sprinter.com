@extends('admin.master')
@section('title','blog')
    
@section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <a href="{{ route('blog.create') }}" class="btn btn-md btn-success mb-3">TAMBAH BLOG</a>
                  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>
      
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Blog Tables</h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Judul</th>
                            <th>Author</th>
                            <th>Image</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Tags</th>
                            <th>Status</th>
                            <th>GAMBAR PENDUKUNG 1</th>
                            <th>GAMBAR PENDUKUNG 2</th>
                            <th>GAMBAR PENDUKUNG 3</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Judul</th>
                            <th>Author</th>
                            <th>Image</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Tags</th>
                            <th>Status</th>
                            <th>GAMBAR PENDUKUNG 1</th>
                            <th>GAMBAR PENDUKUNG 2</th>
                            <th>GAMBAR PENDUKUNG 3</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($data as $d)
                            <tr>
                              <td>{{ $d->judul }}</td>
                              <td>{{ $d->author->author}}</td>
                              <td class="text-center">
                                <img src="{{ Storage::url('public/blogs/blogs1/').$d->image }}" alt="GAGAL LOAD" class="rounded" width="150px">
                              </td>
                              <td>{{ $d->deskripsi }}</td>
                              <td>{{ $d->tanggal }}</td>
                              <td>{{ $d->kategori->kategori }}</td>
                              <td>@foreach ($d->tags as $tags)
                                  {{ "$tags->tags," }}
                              @endforeach</td>
                              <td>{{ $d->status->status }}</td>
                              <td class="text-center">
                                <img src="{{ Storage::url('public/blogs/blogs2/').$d->image2 }}" alt="TIDAK ADA GAMBAR" class="rounded" width="150px">
                              </td>
                              <td class="text-center">
                                <img src="{{ Storage::url('public/blogs/blogs3/').$d->image3 }}" alt="TIDAK ADA GAMBAR" class="rounded" width="150px">
                              </td>
                              <td class="text-center">
                                <img src="{{ Storage::url('public/blogs/blogs4/').$d->image4 }}" alt="TIDAK ADA GAMBAR" class="rounded" width="150px">
                              </td>
                              <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('blog.destroy', $d->id) }}" method="POST">
                                  <a href="{{ route('blog.edit', $d->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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