@extends('admin.layouts.master')
@section('css_page')

@endsection

{{-- Content Web --}}
@section('content')

<div class="page-content">


    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
          <h4 class="mb-3 mb-md-0"><i class="mdi mdi-qrcode-scan"></i> QR Code Generator</h4>
        </div>

        <div class="d-flex align-items-center flex-wrap text-nowrap">
            {{-- <a href="{{ route('tukAdd') }}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i><span style="margin-left: 6px">Create QR Code</span></a> --}}

            <button type="button" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="fa fa-plus"></i><span style="margin-left: 6px">Create QR Code</span>
            </button>

            {{-- Modal --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                        </div>


                        <form class="forms-sample" action="/qr-code" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="modal-body">
                              <div class="row mb-3">
                                  <label for="name_qr" class="col-sm-3 col-form-label">Name QR</label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control" id="name_qr" name="name" placeholder="Masukkan Nama QR">
                                  </div>
                              </div>

                              <div class="row mb-3">
                                  <label for="link" class="col-sm-3 col-form-label">Link</label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control" id="link" name="url" placeholder="Masukkan URL/Link">
                                  </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
	<hr>
    <div class="row">
        @foreach ($data_qr as $qr)
          <div class="col-12 col-md-6 col-xl-4">
              <div class="card">
                <div class="card-header">QR Code</div>
                <div class="card-body">

                  <div class="row">
                    <div class="col-xl-6">
                      <h5 class="card-title">{{ $qr->name }}</h5>
                      <p class="card-text mb-3">{{ Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $qr->created_at)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</p>
                      <button type="button" id="downloadButton-{{ $qr->id }}" class="btn btn-warning btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Download QR Code"><i data-feather="download"></i></button>
                      <button type="button" id="deleteButton-{{ $qr->id }}" class="btn btn-danger btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete QR Code"><i data-feather="trash-2"></i></button>
                    </div>
                    <div class="col-xl-6">
                      <img src="{{ asset('img/qr_codes/' . $qr->qr_image) }}" alt="" width="120px">
                    </div>
                  </div>
                </div>
              </div>
          </div>

          {{-- Script Download QR --}}
          <script>
            document.getElementById("downloadButton-{{ $qr->id }}").addEventListener("click", function() {
              var imageUrl = this.closest('.card-body').querySelector('img').getAttribute('src');
              var a = document.createElement('a');
              a.href = imageUrl;
              a.download = 'QR {{ $qr->name }}.png';
              document.body.appendChild(a);
              a.click();
              document.body.removeChild(a);
            });
          </script>
        @endforeach
    </div>

</div>

@endsection

@section('js_partials')

{{-- Sweet Alert --}}
    <script>
        @foreach ($data_qr as $qr)
            document.getElementById("deleteButton-{{ $qr->id }}").addEventListener("click", function() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this QR code!",
                    icon: "warning",
                    showCancelButton: true,
                }).then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        fetch("{{ route('qr-code.destroy', $qr->id) }}", {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            }
                        }).then(response => {
                            if (response.ok) {
                                Swal.fire(
                                'Terhapus',
                                'QR Code Telah Berhasil Dihapus',
                                'success'
                                ).then((result) =>{
                                if (result.isConfirmed){
                                    window.location.href = '/qr-code';
                                }
                                })
                            }
                        })
                    } else {
                        Swal.fire("Hapus QR Dibatalkan");
                    }
                });
            });
        @endforeach
    </script>
{{-- /* End Sweet Alert --}}



@endsection
