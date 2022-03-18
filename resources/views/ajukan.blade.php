@extends('layouts.depan.base')
@section('content')
<section class="py-lg-7">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card overflow-hidden mb-5">
            <div class="row">
              <div class="col-lg-8">
                <form enctype="multipart/form-data" class="p-3" id="contact-form" method="post" action="{{url("ajukan")}}">
                  {{ csrf_field() }}
                  <div class="card-header px-4 py-sm-5 py-3">
                    <h2>Pengajuan WBTB</h2>
                    <p class="lead"> oleh 
                      @guest
                        Publik
                      @endguest
                      @auth
                        {{ucwords(auth()->user()->name)}}   
                      @endauth
                  </p>
                  </div>
                  <div class="card-body pt-1">
                    <div class="row">
                      <div class="col-md-12 pe-2 mb-3">
                        @if (session('message'))
                        <div class="mt-3 alert alert-info alert-dismissible fade show" role="alert">
                          {{-- <span class="alert-icon text-white"><i class="fas fa-ban"></i></span> --}}
                          <span class="alert-text text-white">{{session('message')}}</span>
                        </div>
                        @endif
                        <p class="lead">Karya Budaya</p>
                        <label>Nama Karya Budaya</label>
                        <input class="form-control" placeholder="Nama Karya Budaya" name="nama" type="text">
                      </div>
                      <div class="col-md-12 pe-2 mb-3">
                        <label>Nama Lain</label>
                        <input class="form-control" placeholder="Nama lain dari Warisan Budaya" name="nama_lain" type="text">
                      </div>
                      <div class="col-md-12 pe-2 mb-3">
                        <div class="form-group mb-0">
                        <table class="table table-responsive">
                          <tr>
                            <td>
                              <label>Domain</label>
                            </td>
                            <td>
                              <label for="">Prioritas</label>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <input class="form-check-input" name="domain[]" type="checkbox" value="Tradisi dan Ekspresi Lain" id="1">
                                <label class="form-check-label" for="1">
                                  Tradisi dan Ekspresi Lain
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="form-check">
                                <input class="form-check-input" name="prioritas" type="radio" name="prioritas" id="customRadio2" value="
                                Tradisi dan Ekspresi Lain">
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <input class="form-check-input" name="domain[]" type="checkbox" value="Seni Pertunjukan" id="2">
                                <label class="form-check-label" for="2">
                                  Seni Pertunjukan
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="form-check">
                                <input class="form-check-input" name="prioritas" type="radio" name="prioritas" id="customRadio2" value="
                                Tradisi dan Ekspresi Lain">
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <input class="form-check-input" name="domain[]" type="checkbox" value="Adat Istiadat Masyarakat, Ritus, dan Perayaan-perayaan" id="3">
                                <label class="form-check-label" for="3">
                                  Adat Istiadat Masyarakat, Ritus, dan Perayaan-perayaan
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="form-check">
                                <input class="form-check-input" name="prioritas" type="radio" name="prioritas" id="customRadio2" value="
                                Tradisi dan Ekspresi Lain">
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <input class="form-check-input" name="domain[]" type="checkbox" value="Pengetahuan dan kebiasaan perilaku mengenai alam dan semesta" id="4">
                                <label class="form-check-label" for="4">
                                  Pengetahuan dan kebiasaan perilaku mengenai alam dan semesta
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="form-check">
                                <input class="form-check-input" name="prioritas" type="radio" name="prioritas" id="customRadio2" value="
                                Tradisi dan Ekspresi Lain">
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <input class="form-check-input" name="domain[]" type="checkbox" value="Keterampilan dan Kemahiran Kerajinan Tradisional" id="5">
                                <label class="form-check-label" for="5">
                                  Keterampilan dan Kemahiran Kerajinan Tradisional
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="form-check">
                                <input class="form-check-input" name="prioritas" type="radio" name="prioritas" id="customRadio2" value="
                                Tradisi dan Ekspresi Lain">
                              </div>
                            </td>
                          </tr>
                        </table>
                        </div>
                      </div>
                      <div class="col-md-12 pe-2 mb-3">
                        <label>Kondisi Karya Budaya</label>
                        <select name="kondisi" id="" class="form-control">
                          <option value="Sedang Berkembang">Sedang Berkembang</option>
                          <option value="Masih Bertahan">Masih Bertahan</option>
                          <option value="Sudah Berkurang">Sudah Berkurang</option>
                          <option value="Terancam Punah">Terancam Punah</option>
                          <option value="Sudah Punah">Sudah punah atau tidak berfungsi lagi dalam masyarakat</option>
                        </select>
                      </div>
                      <div class="col-md-12 pe-2 mb-3">
                        <label>Lokasi</label>
                        <select name="lokasi" id="" class="form-control">
                          <option value="Kabupaten Sleman">Kabupaten Sleman</option>
                          <option value="Kabupaten Bantul">Kabupaten Bantul</option>
                          <option value="Kabupaten Kulonprogo">Kabupaten Kulonprogo</option>
                          <option value="Kabupaten Gunung Kidul">Kabupaten Gunung Kidul</option>
                          <option value="Kota Yogyakarta">Kota Yogyakarta</option>
                          <option value="Keraton Yogyakarta">Keraton Yogyakarta</option>
                        </select>
                      </div>
                      <div class="col-md-12 pe-2 mb-3">
                        <textarea name="detail_alamat" id="" cols="30" rows="2" class="form-control" placeholder="Desa/Kecamatan/lingkungan"></textarea>
                      </div>
                      <div class="col-md-12 pe-2 mb-3">
                        <p class="lead">Identifikasi dan Definisi</p>
                        <label>Definisi Karya Budaya</label>
                        <textarea name="definisi" id="" cols="30" rows="2" class="form-control" placeholder="Definisi Karya Budaya"></textarea>
                      </div>
                      <div class="col-md-12 pe-2 mb-3">
                        <label>Upaya Pelestarian</label>
                        <textarea name="pelestarian" id="" cols="30" rows="2" class="form-control" placeholder="Definisi Karya Budaya"></textarea>
                      </div>
                      <div class="col-md-12 pe-2 mb-3">
                        <p class="lead">Nama komunitas/ organisasi/ asosiasi/ badan/ paguyuban/ kelompok sosial/ atau perorangan yang bersangkutan</p>
                        <button onclick="addElement()" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button>
                        
                        <table class="table komunitas" style="box-sizing: border-box; border: 3px solid #d8d8d8;">
                          <tbody>
                          <tr>
                            <td><label class="control-label requiredField" for="nama01"> Nama
                            </label></td>
                            <td>:</td>
                            <td><input class="form-control" name="nama_komunitas[]" placeholder="Nama" type="text" required=""></td>
                          </tr>
                          <tr>
                            <td><label class="control-label requiredField" for="alamat01">
                                Alamat </label></td>
                            <td>:</td>
                            <td><input class="form-control" name="alamat_komunitas[]" placeholder="Alamat" type="text" required=""></td>
                          </tr>
                          <tr>
                            <td><label class="control-label requiredField" for="alamat01">
                                Kode Pos </label></td>
                            <td>:</td>
                            <td><input class="form-control" name="kode_pos_komunitas[]" placeholder="Kode pos" type="number"></td>
                          </tr>
                          <tr>
                            <td><label class="control-label requiredField" for="telp01"> No.
                                Tel/Faks/Ponsel </label></td>
                            <td>:</td>
                            <td><input class="form-control" name="no_telp_komunitas[]" placeholder="No. Tel/Faks/Ponsel Anda" type="number" required=""></td>
                          </tr>
                          <tr>
                            <td><label class="control-label requiredField" for="email01">
                                Email </label></td>
                            <td>:</td>
                            <td><input class="form-control" name="email_komunitas[]" placeholder="Email Anda" value="" type="text"></td>
                          </tr>
                        </tbody></table>
                      </div>
                      <div class="col-md-12 pe-2 mb-3">
                        <p class="lead">Guru budaya/maestro</p>
                        <table class="table" style="box-sizing: border-box; border: 3px solid #d8d8d8;">
                          <tbody><tr>
                            <td><label class="control-label requiredField" for="nama01"> Nama
                            </label></td>
                            <td>:</td>
                            <td><input class="form-control" name="nama_maestro" placeholder="Nama" type="text" required=""></td>
                          </tr>
                          <tr>
                            <td><label class="control-label requiredField" for="alamat01">
                                Alamat </label></td>
                            <td>:</td>
                            <td><input class="form-control" name="alamat_maestro" placeholder="Alamat" type="text" required=""></td>
                          </tr>
                          <tr>
                            <td><label class="control-label requiredField" for="alamat01">
                                Kode Pos </label></td>
                            <td>:</td>
                            <td><input class="form-control" name="kode_pos_maestro" placeholder="Kode pos" type="number"></td>
                          </tr>
                          <tr>
                            <td><label class="control-label requiredField" for="telp01"> No.
                                Tel/Faks/Ponsel </label></td>
                            <td>:</td>
                            <td><input class="form-control" name="no_telp_maestro" placeholder="No. Tel/Faks/Ponsel Anda" type="number" required=""></td>
                          </tr>
                          <tr>
                            <td><label class="control-label requiredField" for="email01">
                                Email </label></td>
                            <td>:</td>
                            <td><input class="form-control" name="email_maestro" placeholder="Email Anda" value="" type="text"></td>
                          </tr>
                        </tbody></table>
                      </div>
                      <div class="col-md-12 pe-2 mb-3">
                        <p class="lead">Media</p>
                        <label>Foto</label>
                        <table class="table" id="table-upload-images">
                          <thead>
                            <tr>
                              <th> Label</th>
                              <th> Images </th>
                              <th> Tambah </th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="media" data-value="1" id="latest-row-upload">
                              <td><input id="label_image" name="label_image[]" type="text" class="form-control" required=""> </td>
                              <td><input id="image" name="image[]" type="file" class="form-control" onchange="imageOnChange(event)" accept=".jpg, .jpeg, .jpe, .jfif, .bmp, .png, .tiff" required=""> </td>
                              <td><a href="" data-lightbox="roadtrip"><img height="50px" data-value="" alt="" id="prev" src="" style="display:none"></a></td>
                              <td>
                                <button type="button" onclick="deleteRowImages(this)" class="btn btn-sm btn-danger" style="display:none"><i class="glyphicon glyphicon-remove"></i></button>
                                <button type="button" onclick="addRow()" class="btn btn-sm btn-info"><i class="fas fa-plus"></i></button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <label>Video</label>
                        <div class="col-md-12 main-box-video" style="box-sizing: border-box; border: 3px solid #d8d8d8;">
                          <div class="form-group pull-right">
                            <label class="control-label">Upload video</label>
                            <input type="radio" class="upload-method" name="method_video" value="upload" onclick="onchangeVideoMethod(this, 'upload')">
                            <label class="control-label">Embedd video dari youtube</label>
                            <input type="radio" class="embedd-method" name="method_video" value="embedd" onclick="onchangeVideoMethod(this, 'embedd')"="">
                          </div>
                          <div class="col-md-12">
                            <b>Label Video</b>
                            <div class="form-group">
                              <input class="form-control" name="label_video" placeholder="Label Video" type="text">
                            </div>
                            <span class="upload-video" style="display: none">
                              <b>Upload Video</b>
                              <div class="form-group">
                                <input class="form-control" name="upload_video" onchange="videoOnchange(event)" placeholder="Label Video" type="file" accept=".flv, .mp4, .avi, .mkv, .mpg, .mpeg, .3gp, .mov, .webm, .amv, .ts, .mts, .vob, .dat" disabled="">
                              </div>
                            </span>
                            <div class="embedd-video">
                              <b>Link Embed Video</b>
                              <div class="form-group">
                                <input class="form-control" name="embed_video" placeholder="Embed Video Dari Youtube" type="text" onblur="onblurInputVideo(this)">
                                <div class="error-message-video" style="display:none"><p class="text-danger">This text represents danger.</p></div>
                              </div>
                            
                              <div class="form-group preview-video" style="display:none;">
                                <iframe width="100%" height="315" src="" frameborder="0" allowfullscreen=""></iframe>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12 pe-2 mb-3">
                        <p class="lead">Kajian Akademis</p>
                        {{-- <div class="form-group pull-right">
                          <label class="control-label">Upload PDF</label>
                          <input type="radio" class="upload-method" name="kajian_akademis" value="upload" onclick="onchangeVideoMethod(this, 'upload')">
                          <label class="control-label">Teks Deskripsi</label>
                          <input type="radio" class="embedd-method" name="kajian_akademis" value="embedd" onclick="onchangeVideoMethod(this, 'embedd')"="">
                        </div> --}}
                          <b for="" class="control-label">File PDF</b>                          
                          <input type="file" name="kajian_akademis_file" class="form-control" id="">
                          {{-- <b for="" class="control-label">Deskripsi</b>                          
                          <textarea name="kajian_akademis_text" class="pt-3 form-control" placeholder="Deksripsi Kajian Akademis" id="" cols="30" rows="10"></textarea> --}}
                        
                      </div>
                      <div class="col-md-12 pe-2 mb-3">
                        <p class="lead">Surat Persetujuan</p>                        
                        <input type="file" name="surat_persetujuan" class="form-control" id=""> 
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 text-end ms-auto">
                        <button type="submit" class="btn btn-round bg-gradient-info mb-0">Kirim</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-lg-4 position-relative bg-cover px-0" style="background-image: url('../assets/img/curved-images/curved5.jpg')">
                <div class="z-index-2 text-center d-flex h-100 w-100 d-flex m-auto justify-content-center">
                  <div class="mask bg-gradient-info opacity-9">
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
