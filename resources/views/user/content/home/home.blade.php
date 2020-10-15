@extends('user.master')
@section('title', 'HOME | INSPIROOM.COM')
@section('content')
<div class="main-banner header-text">
    <div class="container-fluid">
      <div class="owl-banner owl-carousel">
        @foreach ($kategori as $k)
        <div class="item">
          <img src="{{ Storage::url('public/blogs/kategori/').$k->image_kategori }}" alt="">
          <div class="item-content">
            <div class="main-content">
              <div class="meta-category">
                {{-- <span>{{ $s->kategori->kategori }}</span> --}}
              </div>
              <a href="#"><h4>{{ $k->kategori }}</h4></a>
              <ul class="post-info">
                {{-- <li><a href="#">{{ $s->author->author}}</a></li>
                <li><a href="#">{{ $s->tanggal }}</a></li> --}}
              </ul>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <section class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="main-content">
            <div class="row">
              <div class="col-lg-8">
                <span>INSPIROOM.COM</span>
                <h4>DUA KATA YANG AKAN JADI INSPIRASI ANDA :)</h4>
              </div>
              <div class="col-lg-4">
                <div class="main-button">
                  <a rel="nofollow" href="{{route('contact.page')}}" target="_parent">CONTACT US</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- BLOG SECTION --}}
  <section class="blog-posts">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="all-blog-posts">
            <div class="row">
              @foreach ($semua as $s)
              <div class="col-lg-12">
                <div class="blog-post">
                  <div class="blog-thumb">
                    <img src="{{ Storage::url('public/blogs/').$s->image }}" alt="">
                  </div>
                  <div class="down-content">
                    <span>Lifestyle</span>
                    <a href="post-details.html"><h4>{{ $s->judul }}</h4></a>
                    <ul class="post-info">
                      <li><a href="#">{{ $s->author->author}}</a></li>
                      <li><a href="#">{{ $s->tanggal }}</a></li>
                    </ul>
                    <p>
                      {{ substr($s->deskripsi,0,100) }}
                    </p>
                    <div class="post-options">
                      <div class="row">
                        <div class="col-6">
                          <ul class="post-tags">
                            <li><i class="fa fa-tags"></i></li>
                            <li>
                                @foreach ($s->tags as $tags)
                                  <a href="#">
                                    {{ "$tags->tags, " }}
                                  </a>
                                @endforeach
                            </li>  
                          </ul>
                        </div>
                        <div class="col-6">
                          <ul class="post-share">
                            <li><i class="fa fa-share-alt"></i></li>
                            <li><a href="#">Facebook</a>,</li>
                            <li><a href="#"> Twitter</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="sidebar">
            <div class="row">
              <div class="col-lg-12">
                <div class="sidebar-item search">
                  <form id="search_form" name="gs" method="GET" action="#">
                    <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                  </form>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="sidebar-item recent-posts">
                  <div class="sidebar-heading">
                    <h2>Recent Posts</h2>
                  </div>
                  <div class="content">
                    <ul>
                      @foreach ($semua as $s)
                      <li><a href="post-details.html">
                        <h5>{{ $s->judul }}</h5>
                        <span>{{ $s->tanggal }}</span>
                      </a></li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="sidebar-item categories">
                  <div class="sidebar-heading">
                    <h2>Categories</h2>
                  </div>
                  <div class="content">
                    <ul>
                      @foreach ($kategori as $k)
                        <li><a href="#"> - {{ $k->kategori }}</a></li>
                      @endforeach              
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="sidebar-item tags">
                  <div class="sidebar-heading">
                    <h2>TagS</h2>
                  </div>
                  <div class="content">
                    <ul>
                      @foreach ($daftar_tags as $tags)
                        <li>
                          <a href="#">{{ $tags->tags }}</a>
                        </li>
                        @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection