@extends('layouts.depan.base')
@section('content')
<header class="header-2">
  <div class="page-header min-vh-100" style="background-image: url('{{ asset('assets/img/home.jpg') }}')">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 text-center mx-auto">
          {{-- <h1 class="text-white pt-3 mt-n5">WBTb DIY</h1> --}}
          <img src="{{ asset('assets/img/logo.png') }}" class="mb-4" alt="" width='200' height="100">
          <p class="lead text-white mt-3">Database penyimpanan dan profile karya Warisan Budaya TakBenda Daerah Istimewa Yogyakarta.</p>
        </div>
      </div>
    </div>
    <div class="position-absolute w-100 z-index-1 bottom-0">
      <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
        <defs>
          <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
        </defs>
        <g class="moving-waves">
          <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />
          <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
          <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
          <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
          <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
          <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,0.95" />
        </g>
      </svg>
    </div>
  </div>
</header>
<section class="pt-3 pb-4" id="count-stats">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 z-index-2 border-radius-xl mt-n10 mx-auto py-3 blur shadow-blur">
        <div class="row">
          <div class="col-md-4 position-relative">
            <div class="p-3 text-center">
              <h1 class="text-gradient text-primary"><span id="state1" countTo="{{$jumlah_warisan_budaya}}">0</span>+</h1>
              <h5 class="mt-3">Pencatatan</h5>
              <p class="text-sm"></p>
            </div>
            <hr class="vertical dark">
          </div>
          <div class="col-md-4 position-relative">
            <div class="p-3 text-center">
              <h1 class="text-gradient text-primary"> <span id="state2" countTo="{{$jumlah_pengusulan}}">0</span>+</h1>
              <h5 class="mt-3">Penetapan</h5>
              <p class="text-sm"></p>
            </div>
            <hr class="vertical dark">
          </div>
          <div class="col-md-4">
            <div class="p-3 text-center">
              <h1 class="text-gradient text-primary" id="state3" countTo="{{$jumlah_user}}">0</h1>
              <h5 class="mt-3">User</h5>
              <p class="text-sm"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="">
  <div class="container">
    <div class="row">
      <div class="row text-center my-sm-5 mt-5">
        <div class="col-lg-6 mx-auto">
          <!-- <h2 class="text-primary text-gradient mb-0">Profile WBTb Terbaru</h2> -->
          <h2 class="">Pencatatan Terbaru</h2>
          {{-- <p class="lead">Pencatatan Warisan Budaya Tak Benda Terbaru di Daerah Istimewa Yogyakarta.</p> --}}
        
        </div>
      </div>
    </div>
    <div class="row">
      <div class="card">
        <div class="table-responsive">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Lokasi</th>
                {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Technology</th> --}}
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengajuan</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              @forelse ($warisan_budaya as $warisan_budaya)
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-xs">{{$warisan_budaya->judul[0]}}</h6>
                      <p class="text-xs text-secondary mb-0">{{$warisan_budaya->judul[1]}}</p>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{$warisan_budaya->lokasi[0]}}</p>
                  <p class="text-xs text-secondary mb-0">{{$warisan_budaya->lokasi[1]}}</p>
                </td>
                {{-- <td class="align-middle text-center text-sm">
                  <span class="badge bg-success">Online</span>  
                </td> --}}
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">{{$warisan_budaya->created_at}}</span>
                </td>
                <td class="align-middle">
                  <a href="{{url('/wbtb/'.$warisan_budaya->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    <i class="fas fa-eye"></i> Lihat
                  </a>
                </td>
              </tr>
              @empty
                  <tr>
                    <td colspan="4" class="text-center">
                      <small class="text-secondary">Belum ada data Pencatatan Warisan Budaya tak Benda</small>
                    </td>
                  </tr>
              @endforelse
              
      
              
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row  text-center my-sm-5 mt-5">
        <div class="col-lg-6 mx-auto">
          <!-- <h2 class="text-primary text-gradient mb-0">Profile WBTb Terbaru</h2> -->
          <h2 class="">Berita WBTB Terbaru</h2>
          <p class="lead">Informasi Warisan Budaya Tak Benda Terbaru di Daerah Istimewa Yogyakarta.</p>
        
        </div>
    </div>
    <div class="row">
    @foreach ($berita as $berita)
      <div class="col-lg-3 col-sm-6">
        <div class="card card-plain card-blog">
          <div class="card-image border-radius-lg position-relative">
            <a href="{{ url('berita/'.$berita->id) }}">
              {{-- <img class="w-100 border-radius-lg move-on-hover shadow" src="{{asset('upload/'.$berita->foto[0])}}"> --}}
            </a>
          </div>
          <div class="card-body px-0">
            <h5>
              <a href="{{ url('berita/'.$berita->id) }}" class="text-dark font-weight-bold">{{$berita->judul}}</a>
            </h5>
            {!!substr(strip_tags($berita->konten, '<p>'),0,270)!!}... <br/>
            <a href="{{ url('berita/'.$berita->id) }}" class="text-info icon-move-right">Lebih Lanjut
              <i class="fas fa-arrow-right text-sm" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
      @endforeach

      <div class="col-lg-3 col-md-12 col-12">
        <div class="card card-blog card-background">
          <div class="full-background" style="background-image: url('https://www.kratonjogja.id/upload/images/peristiwa/img_bdiMBM3.jpg')"></div>
          <div class="card-body">
            <div class="content-left text-start my-auto py-4">
              <a href="{{ url('berita') }}">
                <h2 class="card-title text-white">Lihat Berita Lainnya</h2>
                <p class="card-description text-white">Terdapat lebih dari {{$jumlah_warisan_budaya}} Berita WBTB DIY. </p>
                </a><a href="{{ url('berita') }}" class="text-white icon-move-right">Lihat Semua
                  <i class="fas fa-arrow-right text-sm" aria-hidden="true"></i>
                </a>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<hr class="horizontal dark">
</section>
<!-- -------- START Content Presentation Docs ------- -->
<!-- <div class="container mt-sm-5">
  <div class="page-header section-height-50 my-sm-3 mb-3 border-radius-xl" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master{{ asset('assets') }}/soft-ui-design-system/assets/img/flower.jpg');">
    <span class="mask bg-gradient-dark"></span>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 ms-lg-5">
          <h4 class="text-white mb-0">Built by developers</h4>
          <h1 class="text-white">Complex Documentation</h1>
          <p class="lead text-white opacity-8">From colors, cards, typography to complex elements, you will find the full documentation. Play with the utility classes and you will create unlimited combinations for our components.</p>
          <a href="https://www.creative-tim.com/learning-lab/bootstrap/overview{{ asset('assets') }}/soft-ui-design-system" class="text-white icon-move-right">
            Read docs
            <i class="fas fa-arrow-right text-sm ms-1"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-4">
      <div class="info-horizontal bg-gradient-primary border-radius-xl p-5">
        <div class="icon">
          <svg class="text-white" width="25px" height="25px" viewBox="0 0 46 43" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <title>delivery-fast</title>
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g transform="translate(-2320.000000, -741.000000)" fill="#FFFFFF" fill-rule="nonzero">
                <g transform="translate(1716.000000, 291.000000)">
                  <g id="delivery-fast" transform="translate(604.000000, 450.000000)">
                    <rect class="color-background" opacity="0.601143973" x="0" y="0" width="17.25" height="3.83333333"></rect>
                    <rect class="color-background" opacity="0.601143973" x="3.83333333" y="7.66666667" width="13.4166667" height="3.83333333"></rect>
                    <rect class="color-background" opacity="0.601143973" x="7.66666667" y="15.3333333" width="9.58333333" height="3.83333333"></rect>
                    <rect class="color-background" opacity="0.601888021" x="11.5" y="23" width="5.75" height="3.83333333"></rect>
                    <path class="color-foreground" d="M44.9400833,19.3679167 L38.0611667,15.9294167 L36.3591667,9.1195 C36.1464167,8.26466667 35.37975,7.66666667 34.5,7.66666667 L31.3854167,7.66666667 L21.0833333,7.66666667 C21.0833333,7.66666667 21.0833333,31.5310833 21.0833333,32.5833333 C21.0833333,33.6355833 21.1810833,34.5 21.1810833,34.5 C21.6640833,38.801 25.2808333,42.1666667 29.7083333,42.1666667 C34.1358333,42.1666667 37.7525833,38.801 38.2355833,34.5 L44.0833333,34.5 C45.1413333,34.5 46,33.6413333 46,32.5833333 L46,21.0833333 C46,20.3569167 45.5898333,19.69375 44.9400833,19.3679167 Z M29.7083333,38.3333333 C27.0671667,38.3333333 24.9166667,36.18475 24.9166667,33.5416667 C24.9166667,30.8985833 27.0671667,28.75 29.7083333,28.75 C32.3495,28.75 34.5,30.8985833 34.5,33.5416667 C34.5,36.18475 32.3495,38.3333333 29.7083333,38.3333333 Z M24.9166667,17.25 L24.9166667,11.5 L33.2426667,11.5 L34.5,17.25 L24.9166667,17.25 Z"></path>
                  </g>
                </g>
              </g>
            </g>
          </svg>
        </div>
        <div class="description ps-5">
          <h5 class="text-white">Getting Started</h5>
          <p class="text-white">Check the possible ways of working with our product and the necessary files for building your own project.</p>
          <a href="https://www.creative-tim.com/learning-lab/bootstrap/overview{{ asset('assets') }}/soft-ui-design-system" class="text-white icon-move-right">
            Let's start
            <i class="fas fa-arrow-right text-sm ms-1"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 px-lg-1 mt-lg-0 mt-4">
      <div class="info-horizontal bg-gray-100 border-radius-xl p-5">
        <div class="icon">
          <svg class="text-primary" width="25px" height="25px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <title>document</title>
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                <g transform="translate(1716.000000, 291.000000)">
                  <g transform="translate(154.000000, 300.000000)">
                    <path class="color-foreground" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                    <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                  </g>
                </g>
              </g>
            </g>
          </svg>
        </div>
        <div class="description ps-5">
          <h5>Plugins</h5>
          <p>Get inspiration and have an overview about the plugins that we used to create the Soft UI Design System.</p>
          <a href="https://www.creative-tim.com/learning-lab/bootstrap/datepicker{{ asset('assets') }}/soft-ui-design-system" class="text-primary icon-move-right">
            Read more
            <i class="fas fa-arrow-right text-sm ms-1"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mt-lg-0 mt-4">
      <div class="info-horizontal bg-gray-100 border-radius-xl p-5">
        <div class="icon">
          <svg class="text-primary" width="25px" height="25px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <title>ungroup</title>
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g transform="translate(-2170.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                <g transform="translate(1716.000000, 291.000000)">
                  <g id="ungroup" transform="translate(454.000000, 151.000000)">
                    <path class="color-background" d="M38.1818182,10.9090909 L32.7272727,10.9090909 L32.7272727,30.9090909 C32.7272727,31.9127273 31.9127273,32.7272727 30.9090909,32.7272727 L10.9090909,32.7272727 L10.9090909,38.1818182 C10.9090909,39.1854545 11.7236364,40 12.7272727,40 L38.1818182,40 C39.1854545,40 40,39.1854545 40,38.1818182 L40,12.7272727 C40,11.7236364 39.1854545,10.9090909 38.1818182,10.9090909 Z"></path>
                    <path class="color-foreground" d="M27.2727273,29.0909091 L1.81818182,29.0909091 C0.812727273,29.0909091 0,28.2781818 0,27.2727273 L0,1.81818182 C0,0.814545455 0.812727273,0 1.81818182,0 L27.2727273,0 C28.2781818,0 29.0909091,0.814545455 29.0909091,1.81818182 L29.0909091,27.2727273 C29.0909091,28.2781818 28.2781818,29.0909091 27.2727273,29.0909091 Z"></path>
                  </g>
                </g>
              </g>
            </g>
          </svg>
        </div>
        <div class="description ps-5">
          <h5>Utility Classes</h5>
          <p>Soft UI Design System is giving you a lot of pre-made elements. For those who want flexibility, we included many utility classes.</p>
          <a href="https://www.creative-tim.com/learning-lab/bootstrap/utilities{{ asset('assets') }}/soft-ui-design-system" class="text-primary icon-move-right">
            Read more
            <i class="fas fa-arrow-right text-sm ms-1"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div> -->
<!-- -------- END Content Presentation Docs ------- -->
<section class="py-2">
  <div class="container">
    <div class="row">
      <div class="card">
        <div class="table-responsive">
      <div class="col-lg-12 mx-auto text-center">
        <h2 class="mb-0">Agenda Dinas Kebudayaan DIY</h2>
        <div id="calendar" class='my-5'></div>
      </div>
        </div>
      </div>
    </div>
    
    
    
</section>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- <section class="py-sm-7" id="demografis">
  <div class="bg-gradient-dark position-relative m-3 border-radius-xl overflow-hidden">
    <img src="{{ asset('assets/soft-ui/img/shapes/waves-white.svg') }}" alt="pattern-lines" class="position-absolute start-0 top-md-0 w-100 opacity-6">
    <div class="container py-3 postion-relative z-index-2 position-relative">
      <div class="row">
        <div class="col-md-12 mx-auto text-center">
          <h3 class="text-white mb-0">Demografis</h3>
        </div>
      </div>
    </div>
  </div>
  
</section> -->
<!-- START Section Content W/ 2 images aside of icon title description -->
<!-- <section class="pt-lg-7 pt-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-8 order-2 order-md-2 order-lg-1">
        <div class="position-relative ms-lg-5 mb-0 mb-md-7 mb-lg-0 d-none d-md-block d-lg-block d-xl-block h-75">
          <div class="bg-gradient-primary w-100 h-100 border-radius-xl position-absolute d-lg-block d-none"></div>
          <img src="{{ asset('assets/soft-ui/img/curved-images/curved11.jpg') }}" class="w-100 border-radius-xl mt-6 ms-lg-5 position-relative z-index-5" alt="">
        </div>
      </div>
      <div class="col-lg-5 col-md-12 ms-auto order-1 order-md-1 order-lg-1">
        <div class="p-3 pt-0">
          <div class="icon icon-shape bg-gradient-primary rounded-circle shadow text-center mb-4">
            <i class="ni ni-building"></i>
          </div>
          <h4 class="text-gradient text-primary mb-0">Pengertian & Domain</h4>
          <h4 class="mb-4">Warisan Budaya Tak Benda</h4>
          <p></p>
          
        </div>
      </div>
    </div>
  </div>
</section> -->
<!-- END Section Content -->
<!-- -------   START PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->
  
@endsection

@push('js')
<script src="{{ asset('assets/plugins/fullcalendar/lib/main.min.js') }}"></script>
<script type="text/javascript">
  if (document.getElementById('state1')) {
    const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
    if (!countUp.error) {
      countUp.start();
    } else {
      console.error(countUp.error);
    }
  }
  if (document.getElementById('state2')) {
    const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
    if (!countUp1.error) {
      countUp1.start();
    } else {
      console.error(countUp1.error);
    }
  }
  if (document.getElementById('state3')) {
    const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
    if (!countUp2.error) {
      countUp2.start();
    } else {
      console.error(countUp2.error);
    };
  }


  

document.addEventListener('DOMContentLoaded', function() {
  var event_url = "{{url('/event')}}";
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    timeZone: 'UTC',
    initialView: 'dayGridMonth',
    events: event_url,
    editable: true,
    selectable: true,
    eventClick: function(event){
      console.log(event);
    },
  });

  calendar.render();
});

</script>
@endpush
  
