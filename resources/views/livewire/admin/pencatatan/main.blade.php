<div>
<main>
    <div class="container-fluid py-4">
        @if ($is_create)
        @include('livewire.admin.pencatatan.create')
        @endif

        @if($is_update)
        @include('livewire.admin.pencatatan.update')
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Pencatatan</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a href='{{route('ajukan')}}' class="btn bg-gradient-dark mb-0"><i class="fas fa-plus"
                                    aria-hidden="true"></i> Buat Baru</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">

                        @if ($this->message)
                        <div class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                        <span class="alert-text text-white">{!! $this->message !!}</span>
                        </div>
                        @endif

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Karya Budaya</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Lokasi</th>
                                            <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Domain</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Pengajuan</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($warisan_budaya as $warisan_budaya)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><a href="{{route("detail",
                                                            ["wbtb"=>$warisan_budaya->id])}}"
                                                            target="_blank">{{$warisan_budaya->judul[0]}}</a></h6>
                                                    
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$warisan_budaya->lokasi[0]}}</p>
                                        </td>
                                        <td class="">
                                            @forelse ($warisan_budaya->domain[0] as $domain)
                                            <p class="text-secondary text-xs font-weight-bold">{{$domain}}</p>
                                            @empty
                                                -
                                            @endforelse
                                            
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$warisan_budaya->created_at}}</p>
                                        </td>
                                        <td class="align-middle">
                                            
                                            <a href="{{route('preview', ['id' => $warisan_budaya->id])}}"
                                                class="btn bg-gradient-dark font-weight-bold text-xs"
                                                target="_blank">Lihat</a>
                                            
                                            
                                            <button wire:click='edit({{$warisan_budaya->id}})' class="btn btn-success font-weight-bold text-xs" data-toggle="tooltip"
                                                data-original-title="Approve">
                                                Approve
                                            </button>
                                            <button wire:click='deleteId({{$warisan_budaya->id}})' class="btn btn-danger font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#delete">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                              </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <h6 class="text-muted">Belum ada Pencatatan Warisan Budaya</h6>
                                            {{-- <a class="btn bg-gradient-dark btn-md mt-4 mb-4" href=""><i
                                                    class="fas fa-plus"></i> </a> --}}
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@push('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet" />
@endpush

@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
  // dashboard pencatatan
  window.addEventListener("create", event => {

    // $('#deskripsi').summernote({
    //         placeholder: 'Deskripsi Warisan Budaya',
    //         tabsize: 2,
    //         height: 350,
    //         toolbar: [
    //             // [groupName, [list of button]]
    //             ['style', ['bold', 'italic', 'underline', 'clear']],
    //             ['font', ['strikethrough', 'superscript', 'subscript']],
    //             ['fontsize', ['fontsize']],
    //             ['color', ['color']],
    //             ['para', ['ul', 'ol', 'paragraph']],
    //             ['height', ['height']],
    //             ['insert', ['picture', 'link', 'video', 'table', 'hr']]
    //         ],
    //         dialogsInBody: true,
    //         dialogsFade: false,
    //         callbacks: {
    //             onChange: function(contents, $editable) {
    //                         @this.set('deskripsi', contents);
    //             },
    //             onPaste: function(e){
    //                 var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
    //                 e.preventDefault();
    //                 document.execCommand('insertText', false, bufferText);
    //             }
    //         }
    //     });

        // fill content
        // $("#deskripsi").summernote('enable');
        $('#deskripsi').summernote('reset');
        $("#deskripsi").summernote('code', '');

    }); 
    
    
    window.addEventListener("edit", event => {
    // $('#deskripsi').summernote({
    //         toolbar: [
    //             // [groupName, [list of button]]
    //             ['style', ['bold', 'italic', 'underline', 'clear']],
    //             ['font', ['strikethrough', 'superscript', 'subscript']],
    //             ['fontsize', ['fontsize']],
    //             ['color', ['color']],
    //             ['para', ['ul', 'ol', 'paragraph']],
    //             ['height', ['height']],
    //             ['insert', ['picture', 'link', 'video', 'table', 'hr']]
    //         ],
    //         // callbacks: {
    //         //     onChange: function(contents, $editable) {
    //         //                 @this.set('deskripsi', contents);
    //         //     },
    //         //     onPaste: function(e){
    //         //         var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
    //         //         e.preventDefault();
    //         //         document.execCommand('insertText', false, bufferText);
    //         //     }
    //         // }
    //     }, event.detail.newName);

        // fill content

        $("#deskripsi").summernote('code', event.detail.newName);
        
        

    });
          

</script>
@endpush

    <div wire:ignore.self class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteLabel">Konfirmasi Hapus Pencatatan</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">x</span>
                    </button>
                </div>
            <div class="modal-body">
                    <p>Apakah anda yakin akan menghapus pencatatan <strong>{{$judul}}</strong> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" wire:click.prevent="delete" class="btn btn-danger close-modal" data-bs-dismiss="modal">Ya</button>
                </div>
            </div>
        </div>
    </div>
</div>