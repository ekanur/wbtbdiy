<div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">{{ __('Form Pengusulan') }}</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    @if (session()->has('message'))
                        <div class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                            <span class="alert-text text-white">{{ session('message') }}</span>
                        </div>
                    @endif

                    <form wire:submit.prevent="save" method="POST" role="form text-left">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="judul" class="form-control-label">{{ __('Judul Warisan Budaya') }}</label>
                                    <div class="@error('judul')border border-danger rounded-3 @enderror">
                                        <input wire:model='judul' class="form-control" type="text" placeholder="Judul"
                                            id="judul">
                                    </div>
                                    @error('judul') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lokasi" class="form-control-label">{{ __('Lokasi') }}</label>
                                    <div class="@error('lokasi')border border-danger rounded-3 @enderror">
                                        <input wire:model='lokasi' class="form-control" type="text"
                                            placeholder="Lokasi" id="lokasi">
                                    </div>
                                    @error('lokasi') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- one row for default field id pelaku and add field button -->
                        <div class="row">
                            <!-- default field with id pelaku  -->
                            <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="pelaku" class="form-control-label">{{ __('Pelaku Warisan Budaya') }}</label>
                                        <div class="@error('pelaku')border border-danger rounded-3 @enderror">
                                            <input wire:model='pelaku' class="form-control" type="text"
                                                placeholder="Pelaku Warisan Budaya" id="pelaku">
                                        </div>
                                        @error('pelaku') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                            </div>

                            <!-- button for add more field -->
                            <div class="col-md-3">
                                <label class="form-control-label">Tambah Pelaku Warisan Budaya</label>
                                <button class="mt- btn btn-primary" wire:click.prevent="addFields">Tambah</button>
                            </div>    
                        </div>
                        
                        <!-- looping field element by $fieldsAvailable -->
                        <!-- field without error and without wire:model -->
                        @foreach($fieldsAvailable as $index)
                            @if($index % 2 == 1)
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="pelaku{{$index}}" class="form-control-label">Pelaku Warisan Budaya</label>
                                        <div class="@error('pelaku{{$index}}') border border-danger rounded-3 @enderror">
                                        <input wire:model="pelaku{{$index}}" class="form-control" type="text"
                                                    placeholder="Pelaku Warisan Budaya" id="pelaku{{$index}}">
                                        </div>
                                    </div>
                                </div>
                            @endif        
                        @endforeach
                        
                        <div class="row" wire:ignore>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="domain" class="form-control-label">{{ __('Domain Warisan Budaya') }}</label>
                                  <div class="@error('domain') border border-danger rounded-3 @enderror">
                                      <select name="domain" required wire:model='domain' id="domain" class="form-control">
                                            <option>--pilih--</option>  
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
                                  @error('domain') <div class="text-danger">{{ $message }}</div> @enderror
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kondisi" class="form-control-label">{{ __('Kondisi') }}</label>
                                    <div class="@error('kondisi') border border-danger rounded-3 @enderror">
                                        <select name="kondisi" wire:model='kondisi' id="kondisi" class="form-control">
                                            <option>--pilih--</option>  
                                            <option value="berkembang">Sedang Berkembang</option>
                                            <option value="bertahan">Masih Bertahan</option>
                                            <option value="berkurang">Sudah Berkurang</option>
                                            <option value="terancam">Terancam Punah</option>
                                            <option value="punah">Punah</option>
                                        </select>
                                    </div>
                                    @error('kondisi') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group" wire:ignore>
                            <label for="deskripsi">{{ 'Deskripsi' }}</label>
                            <div class="@error('deskripsi') border border-danger rounded-3 @enderror">
                                <textarea wire:model='deskripsi' name="deskripsi" class="form-control" id="deskripsi" rows="3"
                                    placeholder=""></textarea>
                            </div>
                            @error('deskripsi') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Simpan' }}</button>
                        </div>
                    </form>

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
        $('#deskripsi').summernote({
            placeholder: 'Deskripsi Warisan Budaya',
            tabsize: 2,
            height: 350,
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
            dialogsFade: false,
            callbacks: {
                onChange: function(contents, $editable) {
                            @this.set('deskripsi', contents);
                },
                onPaste: function(e){
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    document.execCommand('insertText', false, bufferText);
                }
            }
        });
        $('.dropdown-toggle').dropdown();

    });


</script>
@endpush
