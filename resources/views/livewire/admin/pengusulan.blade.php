<main>  
    <div class="container-fluid py-4">
<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Daftar Penetapan</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul-Domain</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Oleh</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Lokasi-Kondisi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Pengajuan</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($warisan_budaya as $warisan_budaya)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><a href="{{route("detail", ["wbtb"=>$warisan_budaya->id])}}" target="_blank">{{$warisan_budaya->judul}}</a></h6>
                            <p class="text-xs text-secondary mb-0">{{$warisan_budaya->domain}}</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$warisan_budaya->user->name}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$warisan_budaya->lokasi}}</p>
                        <p class="text-xs text-secondary mb-0">{{$warisan_budaya->kondisi}}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        @if ($warisan_budaya->is_approved == 1)
                          <span class="badge badge-sm bg-gradient-success">Diterima</span>  
                        @else
                          <span class="badge badge-sm bg-gradient-secondary">Diajukan</span>
                        @endif
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$warisan_budaya->created_at}}</span>
                      </td>
                      <td class="align-middle">
                        @if ($warisan_budaya->is_approved == 1)
                        <a href="{{route('detail', ['wbtb' => $warisan_budaya->id])}}"  class="btn btn-sm bg-gradient-dark font-weight-bold text-xs" target="_blank">Show</a>                                  
                        @else
                        <a href="{{route('preview', ['id' => $warisan_budaya->id])}}"  class="btn btn-sm bg-gradient-dark font-weight-bold text-xs" target="_blank">Preview</a>                            
                        @endif
                        
                        <a href="{{route("user.pengusulan.edit", ["pengusulan"=>$warisan_budaya->id])}}" class="btn btn-sm bg-gradient-success font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="5" class="text-center">
                        <h6 class="text-muted">Belum ada Penetapan Warisan Budaya</h6>
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