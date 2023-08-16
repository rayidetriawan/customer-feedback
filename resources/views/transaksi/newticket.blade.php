@extends('layouts.master')
@section('title', 'Create New Request')
@section('nav_active_new_ticket', 'active')
@section('content')


    <div class="row">
        <div class="col-xl-12">
            <form action="{{ route('newticket.simpan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Deskripsikan Masalah Anda</h5>
                    </div>
                    <div class="card-body mb-2">
                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <div>
                                    <label for="validationCustom04"
                                        class="form-label">Nomor Internet <span class="text-danger">*</span></label>
                                    <input type="text" name="nointernet" value="{{ old('nointernet') }}"
                                        class="form-control" id="validationCustom04"
                                        autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div>
                                    <label for="validationCustom04"
                                        class="form-label">Relasi (Pemilik/ Anggota keluarga) <span class="text-danger">*</span></label>
                                    <input type="text" name="relasi" value="{{ old('relasi') }}"
                                        class="form-control" id="validationCustom04"
                                        autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="validationCustom04"
                                        class="form-label">Alamat <span class="text-danger">*</span></label>
                                    <input type="text" name="alamat" value="{{ old('alamat') }}"
                                        class="form-control" id="validationCustom04"
                                        autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div>
                                    <label for="validationCustom04"
                                        class="form-label">Kategori Masalah <span class="text-danger">*</span></label>
                                    <select class="form-control" data-choices name="kategori" id="choices-single-default">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($kategori as $kg)
                                            <option value="{{ $kg->id }}" @if(old('kategori') == $kg->id) selected @endif>{{ $kg->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="pt-2">
                                    <label for="validationCustom04"
                                        class="form-label">Kondisi <span class="text-danger">*</span></label>
                                    <select class="form-control" data-choices name="kondisi" id="choices-single-default">
                                        <option value="">Pilih Kondisi</option>
                                        @foreach ($kondisi as $kn)
                                            <option value="{{ $kn->id }}" @if(old('kategori') == $kn->id) selected @endif>{{ $kn->nama_kondisi }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="pt-2">
                                    <label for="validationCustom02"
                                        class="form-label">Lampiran Gambar <i class="text-muted">(Optional)</i></label>
                                    <input name="foto[]" type="file" 
                                        class="form-control" multiple="multiple">
                                   
                                </div>
                                <div class="pt-2">
                                    <label for="validationCustom02"
                                        class="form-label">Lampiran File <i class="text-muted">(Optional)</i></label>
                                    <input name="file[]" type="file" 
                                        class="form-control" multiple="multiple">
                                   
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div>
                                    <label for="validationCustom04"
                                        class="form-label">Subjek Masalah <span class="text-danger">*</span></label>
                                    <input type="text" name="subjek" value="{{ old('subjek') }}"
                                        class="form-control" id="validationCustom04"
                                        autocomplete="off">
                                </div>
                                <div class="pt-2">
                                    <label for="exampleFormControlTextarea5" class="form-label">Deskripsi Masalah <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="8">{{ old('deskripsi') }}</textarea>
                                    
                                </div>
                            </div>
                            @if($errors->any())
                            <div class="col-xl-12">
                                <hr>
                                    {!! implode('', $errors->all('
                                    
                                        <div class="d-flex mt-0">
                                                <div class="flex-shrink-0 mt-0">
                                                    <i class="ri-information-line text-danger mt-0"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-1 mt-0">
                                                    <p class="mt-0 mb-0 text-danger">:message</p>
                                                </div>
                                            </div>
                                    ')) !!}
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-end mb-4">
                    <button type="submit" class="btn btn-success btn-label waves-effect waves-light">
                        <i class="ri-save-2-line label-icon align-middle fs-16 me-2"></i> Submit
                    </button>
                    <button type="button" id="loading" style="display:none;" class="btn btn-success btn-load" disabled>
                        <span class="d-flex align-items-center">
                            <span class="spinner-border flex-shrink-0" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </span>
                            <span class="flex-grow-1 ms-2">
                                Loading...
                            </span>
                        </span>
                    </button>
                    
                    <button type="reset" class="btn btn-danger btn-label waves-effect waves-light">
                        <i class="ri-restart-line label-icon align-middle fs-16 me-2"></i> Reset
                    </button>
                    
                </div>
            </form>
        </div>
    </div>

@endsection

@push('before-scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
@endpush

@push('center-scripts')
    <script src="{{ asset('assets/libs/list.js/prismjs.min.js') }}"></script>
    <script src="{{ asset('assets/libs/list.js/list.js.min.js') }}"></script>
    <script src="{{ asset('assets/libs/list.js/list.pagination.js.min.js') }}"></script>
    <script src="{{ asset('assets/libs/list.js/listjs.init.js') }}"></script>
    <script src="{{ asset('assets/libs/list.js/list.min.js') }}"></script>

    {{-- <script src="{{ asset('assets/libs/sweetalert2.min.js') }}"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#carirow tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script>
        @if ($errors->any())
            $(document).ready(function() {

                $('#exampleModalgrid').modal('show');

            });
        @endif

        @if ($errors->has('edit_nama'))

            $(document).ready(function() {

                $('#modaledit').modal('show');

            });
        @endif
    </script>

    @if (session('message'))
        <script>
            Toastify({
                text: "{{ session('message') }}",
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #0ab39c, #2982aa)",
                },
                //onClick: function(){} // Callback after click
            }).showToast();
        </script>
    @endif
    <script type="text/javascript">
        $('#btnSubmit').click(function() {
            $(this).css('display', 'none');
            $('#loading').show();
            return true;
        });
    </script>
    <script type="text/javascript">
        $('#btnSubmitedit').click(function() {
            $(this).css('display', 'none');
            $('#loadingedit').show();
            return true;
        });
    </script>
@endpush
