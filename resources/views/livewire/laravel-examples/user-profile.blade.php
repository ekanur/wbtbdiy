<div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">{{ __('Form Pengusulan') }}</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    @if ($showSuccesNotification)
                        <div wire:model="showSuccesNotification"
                            class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                            <span class="alert-text text-white">{{ __('Berhasil menambahkan pengusulan WBTb.') }}</span>
                            <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    @endif

                    <form wire:submit.prevent="save" method="POST" role="form text-left">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-name" class="form-control-label">{{ __('Judul Warisan Budaya') }}</label>
                                    <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="text" placeholder="Judul"
                                            id="user-name">
                                    </div>
                                    @error('user.name') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-email" class="form-control-label">{{ __('Lokasi') }}</label>
                                    <div class="@error('user.email')border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="text"
                                            placeholder="Lokasi" id="user-email">
                                    </div>
                                    @error('user.email') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="user.phone" class="form-control-label">{{ __('Pelaku Warisan Budaya') }}</label>
                                  <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                      <input class="form-control" type="text"
                                          placeholder="Pelaku Warisan Budaya" id="phone">
                                  </div>
                                  @error('user.phone') <div class="text-danger">{{ $message }}</div> @enderror
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label for="user.location" class="form-control-label">{{ __('Domain Warisan Budaya') }}</label>
                                  <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                      <select name="domain" id="" class="form-control">
                                          <optgroup label="Tradisi dan Ekspresi Lisan">
                                            <option value="Bahasa Daerah">Bahasa Daerah</option>
                                            <option value="Naskah Kuno">Naskah Kuno</option>
                                            <option value="Tradisi Lisan">Tradisi Lisan</option>
                                            <option value="Permainan Tradisional">Permainan Tradisional</option>
                                          </optgroup>
                                          <optgroup label="Seni Pertunjukan">
                                            <option value="Seni Tradisi">Seni Tradisi</option>
                                          </optgroup>
                                          <optgroup label="Adat Istiadat Masyarakat, Ritus, dan Perayaan-Perayaan">
                                            <option value="Upacara-Ritus">Upacara-Ritus</option>
                                          </optgroup>
                                          <optgroup label="Pengetahuan dan Kebiasaan Perilaku Mengenai Alam dan Semesta">
                                            <option value="Kearifan Lokal">Kearifan Lokal</option>
                                            <option value="Teknologi Tradisional">Teknologi Tradisional</option>
                                          </optgroup>
                                          <optgroup label="Keterampilan dan Kemahiran Kerajinan Tradisional">
                                            <option value="Arsitektur Tradisional">Arsitektur Tradisional</option>
                                            <option value="Pakaian Adat">Pakaian Adat</option>
                                            <option value="Kain Tradisional">Kain Tradisional</option>
                                            <option value="Kerajinan Tradisional">Kerajinan Tradisional</option>
                                            <option value="Kuliner Tradisional">Kuliner Tradisional</option>
                                            <option value="Senjata Tradisional">Senjata Tradisional</option>

                                          </optgroup>
                                          
                                      </select>
                                  </div>
                                  @error('user.location') <div class="text-danger">{{ $message }}</div> @enderror
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label for="user.location" class="form-control-label">{{ __('Kondisi') }}</label>
                                  <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                      <select name="kondisi" id="" class="form-control">
                                          <option value="">Sedang Berkembang</option>
                                          <option value="">Masih Bertahan</option>
                                          <option value="">Sudah Berkurang</option>
                                          <option value="">Terancam Punah</option>
                                          <option value="">Punah</option>
                                      </select>
                                  </div>
                                  @error('user.location') <div class="text-danger">{{ $message }}</div> @enderror
                              </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="about">{{ 'Deskripsi' }}</label>
                            <div class="@error('user.about')border border-danger rounded-3 @enderror">
                                <textarea class="form-control" id="summernote" rows="3"
                                    placeholder=""></textarea>
                            </div>
                            @error('user.about') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Simpan' }}</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="card my-4">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">{{ __('Daftar Pengusulan') }}</h6>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lokasi</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kondisi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="d-flex px-2 py-1">
                                
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm">Tarian Srimpi Muncar</h6>
                                </div>
                              </div>
                            </td>
                            
                            <td class="align-middle text-center text-sm">
                              <span class="text-xs font-weight-bold"> Kota Yogyakarta </span>
                            </td>
                            <td class="align-middle">
                              <div class="progress-wrapper w-75 mx-auto">
                                <div class="progress-info">
                                  <div class="progress-percentage">
                                    <span class="text-xs font-weight-bold">Sedang Berkembang</span>
                                  </div>
                                </div>
                                {{-- <div class="progress">
                                  <div class="progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> --}}
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex px-2 py-1">
                                
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm">Babad HB IX</h6>
                                </div>
                              </div>
                            </td>
                            
                            <td class="align-middle text-center text-sm">
                              <span class="text-xs font-weight-bold"> Kota Yogyakarta </span>
                            </td>
                            <td class="align-middle">
                              <div class="progress-wrapper w-75 mx-auto">
                                <div class="progress-info">
                                  <div class="progress-percentage">
                                    <span class="text-xs font-weight-bold">Masih Bertahan</span>
                                  </div>
                                </div>
                                {{-- <div class="progress">
                                  <div class="progress-bar bg-gradient-info w-10" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> --}}
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex px-2 py-1">
                                
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm">Sayur Lodeh</h6>
                                </div>
                              </div>
                            </td>
                            
                            <td class="align-middle text-center text-sm">
                              <span class="text-xs font-weight-bold"> - </span>
                            </td>
                            <td class="align-middle">
                              <div class="progress-wrapper w-75 mx-auto">
                                <div class="progress-info">
                                  <div class="progress-percentage">
                                    <span class="text-xs font-weight-bold">Masih Bertahan</span>
                                  </div>
                                </div>
                                {{-- <div class="progress">
                                  <div class="progress-bar bg-gradient-success w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> --}}
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
            </div>
      </div>
    </div>
</div>

@push('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet"/>
@endpush

@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
 $(document).ready(function() {
        $('#summernote').summernote({
          placeholder: 'Deskripsi Warisan Budaya',
          tabsize: 2,
          height: 200,
          toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['picture', 'link', 'video', 'table', 'hr']]
          ],
          dialogsInBody: true,
          dialogsFade: false
        });
        $('.dropdown-toggle').dropdown()
    });
</script>
@endpush
