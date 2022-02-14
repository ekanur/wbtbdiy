@extends('layouts.depan.base')
@section('content')
<section class="py-lg-7">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card overflow-hidden mb-5">
            <div class="row">
              <div class="col-lg-8">
                <form class="p-3" id="contact-form" method="post">
                  <div class="card-header px-4 py-sm-5 py-3">
                    <h2>Pengajuan WBTB</h2>
                    <p class="lead"> oleh publik</p>
                  </div>
                  <div class="card-body pt-1">
                    <div class="row">
                      <div class="col-md-12 pe-2 mb-3">
                        <p class="lead">Karya Budaya</p>
                        <label>Nama Karya Budaya</label>
                        <input class="form-control" placeholder="Full Name" type="text">
                      </div>
                      <div class="col-md-12 pe-2 mb-3">
                        <label>Nama Lain</label>
                        <input class="form-control" placeholder="What you love" type="text">
                      </div>
                      <div class="col-md-12 pe-2 mb-3">
                        <div class="form-group mb-0">
                          <label>Domain</label>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                              Tradisi dan Ekspresi Lain
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                              Seni Pertunjukan
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                              Adat Istiadat Masyarakat, Ritus, dan Perayaan-perayaan
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                              Pengetahuan dan kebiasaan perilaku mengenai alam dan semesta
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                              Keterampilan dan Kemahiran Kerajinan Tradisional
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 pe-2 mb-3">
                        <label>Kondisi Karya Budaya</label>
                        <select name="" id="" class="form-control">
                          <option value="">Sedang Berkembang</option>
                          <option value="">Masih Bertahan</option>
                          <option value="">Sudah Berkurang</option>
                          <option value="">Terancam Punah</option>
                          <option value="">Sudah punah atau tidak berfungsi lagi dalam masyarakat</option>
                        </select>
                      </div>
                      <div class="col-md-12 pe-2 mb-3">
                        <label>Lokasi</label>
                        <select name="" id="" class="form-control">
                          <option value="">Kabupaten Sleman</option>
                          <option value="">Kabupaten Bantul</option>
                          <option value="">Kabupaten Kulonprogo</option>
                          <option value="">Kabupaten Gunung Kidul</option>
                          <option value="">Kota Yogyakarta</option>
                          <option value="">Keraton Yogyakarta</option>
                        </select>
                      </div>
                      <div class="col-md-12 pe-2 mb-3">
                        {{-- <label>Alama</label> --}}
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
                        <table class="table" style="box-sizing: border-box; border: 3px solid #d8d8d8;">
                          <tbody><tr>
                            <td><label class="control-label requiredField" for="nama01"> Nama
                            </label></td>
                            <td>:</td>
                            <td><input class="form-control" name="nama-comunity-1" placeholder="Nama" type="text" required=""></td>
                          </tr>
                          <tr>
                            <td><label class="control-label requiredField" for="alamat01">
                                Alamat </label></td>
                            <td>:</td>
                            <td><input class="form-control" name="alamat-comunity-1" placeholder="Alamat" type="text" required=""></td>
                          </tr>
                          <tr>
                            <td><label class="control-label requiredField" for="alamat01">
                                Kode Pos </label></td>
                            <td>:</td>
                            <td><input class="form-control" name="kode-pos-comunity-1" placeholder="Kode pos" type="number"></td>
                          </tr>
                          <tr>
                            <td><label class="control-label requiredField" for="telp01"> No.
                                Tel/Faks/Ponsel </label></td>
                            <td>:</td>
                            <td><input class="form-control" name="no-telp-comunity-1" placeholder="No. Tel/Faks/Ponsel Anda" type="number" required=""></td>
                          </tr>
                          <tr>
                            <td><label class="control-label requiredField" for="email01">
                                Email </label></td>
                            <td>:</td>
                            <td><input class="form-control" name="email-comunity-1" placeholder="Email Anda" value="" type="text"></td>
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
                            <td><input class="form-control" name="nama-comunity-1" placeholder="Nama" type="text" required=""></td>
                          </tr>
                          <tr>
                            <td><label class="control-label requiredField" for="alamat01">
                                Alamat </label></td>
                            <td>:</td>
                            <td><input class="form-control" name="alamat-comunity-1" placeholder="Alamat" type="text" required=""></td>
                          </tr>
                          <tr>
                            <td><label class="control-label requiredField" for="alamat01">
                                Kode Pos </label></td>
                            <td>:</td>
                            <td><input class="form-control" name="kode-pos-comunity-1" placeholder="Kode pos" type="number"></td>
                          </tr>
                          <tr>
                            <td><label class="control-label requiredField" for="telp01"> No.
                                Tel/Faks/Ponsel </label></td>
                            <td>:</td>
                            <td><input class="form-control" name="no-telp-comunity-1" placeholder="No. Tel/Faks/Ponsel Anda" type="number" required=""></td>
                          </tr>
                          <tr>
                            <td><label class="control-label requiredField" for="email01">
                                Email </label></td>
                            <td>:</td>
                            <td><input class="form-control" name="email-comunity-1" placeholder="Email Anda" value="" type="text"></td>
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
                              <th> View </th>
                              <th></th>
                            </tr>
                          </thead>
                            
                          <tbody>
                            <tr data-value="1" id="latest-row-upload">
                              <td><input id="label-image-1" name="label-image-1" type="text" class="form-control" required=""> </td>
                              <td><input id="image-1" name="image-1" type="file" class="form-control" onchange="imageOnChange(event)" accept=".jpg, .jpeg, .jpe, .jfif, .bmp, .png, .tiff" required=""> </td>
                              <td><a href="" data-lightbox="roadtrip"><img height="50px" data-value="" alt="" id="prev" src="" style="display:none"></a></td>
                              <td>
                                <button type="button" onclick="deleteRowImages(this)" class="btn btn-danger" style="display:none"><i class="glyphicon glyphicon-remove"></i></button>
                                <button type="button" onclick="addRow()" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i></button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <label>Video</label>
                        <div class="col-md-12 main-box-video" style="box-sizing: border-box; border: 3px solid #d8d8d8;">
                          <div class="form-group pull-right">
                            <label class="control-label">Upload video</label>
                            <input type="radio" class="upload-method" name="method-video-1" value="upload" onclick="onchangeVideoMethod(this, 'upload')">
                            <label class="control-label">Embedd video dari youtube</label>
                            <input type="radio" class="embedd-method" name="method-video-1" value="embedd" onclick="onchangeVideoMethod(this, 'embedd')" checked="">
                          </div>
                          <div class="col-md-12">
                            <b>Label Video</b>
                            <div class="form-group">
                              <input class="form-control" name="label-video-1" placeholder="Label Video" type="text">
                            </div>
                            <span class="upload-video" style="display: none">
                              <b>Upload Video</b>
                              <div class="form-group">
                                <input class="form-control" name="upload-video-1" onchange="videoOnchange(event)" placeholder="Label Video" type="file" accept=".flv, .mp4, .avi, .mkv, .mpg, .mpeg, .3gp, .mov, .webm, .amv, .ts, .mts, .vob, .dat" disabled="">
                              </div>
                            </span>
                            <div class="embedd-video">
                              <b>Link Embed Video</b>
                              <div class="form-group">
                                <input class="form-control" name="embedd-video-1" placeholder="Embed Video Dari Youtube" type="text" onblur="onblurInputVideo(this)">
                                <div class="error-message-video" style="display:none"><p class="text-danger">This text represents danger.</p></div>
                              </div>
                            
                              <div class="form-group preview-video" style="display:none;">
                                <iframe width="100%" height="315" src="" frameborder="0" allowfullscreen=""></iframe>
                              </div>
                            </div>
                          </div>
                        </div>
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
                {{-- <div class="position-absolute z-index-2 w-100 h-100 top-0 start-0 d-lg-block d-none">
                  <img src="../assets/img/wave-1.svg" class="h-100 ms-n2" alt="vertical-wave">
                </div> --}}
                <div class="z-index-2 text-center d-flex h-100 w-100 d-flex m-auto justify-content-center">
                  <div class="mask bg-gradient-info opacity-9"></div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection