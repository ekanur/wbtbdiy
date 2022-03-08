@extends('layouts.depan.base')
@section('content')
<header>
    <div class="page-header min-vh-85" style="background-position-y: 50%;">
      <div class="position-absolute border-radius-lg border-top-start-radius-0 border-top-end-radius-0 border-bottom-end-radius-0 fixed-top ms-auto w-75 h-100 z-index-0 d-none d-sm-none d-md-block" style="background-image: url('{{asset('upload/'.$warisan_budaya->foto[0])}}'); background-size:cover;">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-7 d-flex justify-content-center flex-column">
            <div class="card card-body blur d-flex justify-content-center px-5 shadow-lg mt-lg-5 mt-3 py-5">
              <strong class="text-gradient text-primary mb-0">{{$warisan_budaya->domain}}</strong>
              <h3 class="mb-4">{{$warisan_budaya->judul}}</h3>
              {{-- <p class="lead pe-sm-5 me-sm-5">The time is now for it be okay to be great. People in this world shun people for being nice. </p> --}}
              {{-- <strong class="mt-3">Bagikan di Sosial Media</strong>
              <div class="d-flex justify-content-start">
                <a href="javascript:;"><i class="fab fa-facebook text-dark me-4 text-lg" aria-hidden="true"></i></a>
                <a href="javascript:;"><i class="fab fa-twitter text-dark me-4 text-lg" aria-hidden="true"></i></a>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <section class="py-5 mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 ms-auto me-auto">
          <div class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
            <span class="alert-icon text-white"><i class="fas fa-ban"></i></span>
            <span class="alert-text text-white">Preview dari Pengusulan Wisata Budaya, halaman ini tidak dapat diakses secara publik.</span>
          </div>
          <h6 class="opacity-7 text-uppercase font-weight-bolder text-sm">Detail</h6>
          <h3 class="title mb-4">{{$warisan_budaya->judul}}</h3>
          <span class="text-dark" style="text-align:justify">
            {!! $warisan_budaya->deskripsi !!}
          </span>
        </div>
      </div>
      {{-- <section class="py-7 position-relative">
        <div id="carousel-testimonials" class="carousel slide carousel-team">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="container">
                <div class="row align-items-center">
                  <div class="col-md-5 me-lg-auto position-relative">
                    <h6 class="opacity-7 text-uppercase font-weight-bolder text-sm fadeIn4 fadeInBottom">Galeri</h6>
                    <strong class="text-dark font-weight-bolder fadeIn2 fadeInBottom">Foto Warisan Budaya</strong>
                    
                  </div>
                  <div class="col-md-5 ms-lg-auto">
                    <div class="p-3">
                      <img class="w-100 border-radius-md max-height-600 fadeIn2 fadeInBottom" src="{{asset('upload/'.$warisan_budaya->foto)}}" alt="First slide">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="container">
                <div class="row align-items-center">
                  <div class="col-md-5 me-lg-auto position-relative">
                    <h6 class="opacity-7 text-uppercase font-weight-bolder text-sm fadeIn4 fadeInBottom">Galeri</h6>
                    <strong class="text-dark font-weight-bolder fadeIn2 fadeInBottom">Video Warisan Budaya</strong>
                  </div>
                  <div class="col-md-5 ms-lg-auto">
                    <div class="p-3">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/ql0I3hdKR8U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="position-relative mt-n6">
            <a class="carousel-control-prev text-dark position-absolute bottom-0 start-0" href="#carousel-testimonials" role="button" data-bs-slide="prev">
              <i class="fas fa-2x fa-chevron-left position-absolute start-0 ms-3" aria-hidden="true"></i>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next text-dark position-absolute bottom-0 start-0 ms-4" href="#carousel-testimonials" role="button" data-bs-slide="next">
              <i class="fas fa-2x fa-chevron-right" aria-hidden="true"></i>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </section> --}}
    </div>

  </section>
  
  @endsection
