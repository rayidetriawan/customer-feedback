@extends('layouts.master')
@section('title', 'Detail Request')
@section('nav_active_assigment_ticket', 'active')
@section('content')

<div class="row">
    <div class="col-xl-3">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Request Details</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-borderless align-middle mb-0">
                        <tbody>
                            <tr>
                                <td class="fw-medium">Request</td>
                                <td>{{ $data->idTiket }}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Reported</td>
                                <td id="t-client">{{ $data->customer->nama }}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Teknisi</td>
                                <td>@if($data->id_teknisi !=  null) {{ $data->teknisi->nama }}@else - @endif</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Kategori</td>
                                <td> {{ $data->kategori->nama_kategori }}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Status</td>
                                <td>
                                    @if($data->status == 1)
                                        <span class="badge bg-warning"> Menunggu Aproval Internal</span>
                                    @elseif($data->status == 2)
                                        <span class="badge bg-warning"> Aproval Internal</span>
                                    @elseif($data->status == 3)
                                        <span class="badge bg-info"> Menunggu Aproval Teknisi</span>
                                    @elseif($data->status == 4)
                                        <span class="badge bg-primary"> Sedang Dalam Pengerjaan</span>
                                    @elseif($data->status == 5)
                                        <span class="badge bg-danger"> Ditolak</span>
                                    @elseif($data->status == 0)
                                        <span class="badge bg-success"> Solved</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Progress</td>
                                <td>
                                    <div class="progress animated-progress">
                                        <div class="progress-bar @if($data->status != 5) bg-success @else bg-danger @endif" role="progressbar" style="width: {{ $data->progress }}%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">{{ $data->progress }}%</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Kondisi</td>
                                <td>
                                    <span class="badge bg-info" id="t-priority">{{ $data->kondisi->nama_kondisi  }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Tanggal Proses</td>
                                <td id="c-date">
                                    @if(!empty($data->tgl_proses)) @tanggal($data->tgl_proses)
                                    @else -
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Tanggal Selesai</td>
                                <td>
                                    @if(!empty($data->tgl_solved)) @tanggal($data->tgl_solved)
                                    @else -
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
        <div class="card">
            <div class="card-header">
                <h6 class="card-title fw-semibold mb-0">Files Attachment</h6>
            </div>
            <div class="card-body">
                @if($data->foto)
                @foreach(json_decode($data->dokumenfoto->file) as $foto)
                <div class="d-flex align-items-center border border-dashed p-2 mt-2 rounded">
                    <div class="flex-shrink-0 avatar-sm">
                        <div class="avatar-title bg-light rounded">
                            <i class="ri-image-line fs-20 text-primary"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-1"><a href="javascript:void(0);">{{ $foto }}</a></h6>
                    </div>
                    <div class="hstack gap-3 fs-16">
                        <a href="{{ asset('file_ticket/'.$foto) }}" target="_blank" class="text-muted"><i class="ri-download-2-line"></i></a>
                    </div>
                </div>
                @endforeach
                @endif
                @if($data->file)
                @foreach(json_decode($data->dokumenfile->file) as $file)
                <div class="d-flex align-items-center border border-dashed p-2 mt-2 rounded">
                    <div class="flex-shrink-0 avatar-sm">
                        <div class="avatar-title bg-light rounded">
                            <i class="ri-file-line fs-20 text-primary"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-1"><a href="javascript:void(0);">{{ $file }}</a></h6>
                    </div>
                    <div class="hstack gap-3 fs-16">
                        <a href="{{ asset('file_ticket/'.$file) }}" target="_blank" class="text-muted"><i class="ri-download-2-line"></i></a>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <!--end col-->
    <div class="col-xl-9">
        <div class="card">
            <div class="card-body p-4 mb-0">
                <h6 class="fw-semibold text-uppercase mb-3">Request Discription</h6>
                <p class="text-muted">{{ $data->deskripsi_masalah }}</p>
            </div>
            <!--end card-body-->
            <div class="card-body p-4">
                <h5 class="card-title mb-3">Tracking Request</h5>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tracking as $no => $item)
                            <tr>
                                <td>{{ $tracking->firstItem() + $no }}</td>
                                <td>@tanggal($item->created_at)</td>
                                <td>
                                    @if($item->status == 'Solved')
                                        <div class="text-success">
                                            <i class="ri-checkbox-circle-line fs-17 align-middle"></i> {{ $item->status }}
                                        </div>
                                    @elseif($item->status == 'Ditolak')
                                        <div class="text-danger">
                                            <i class="ri-close-circle-line fs-17 align-middle"></i> {{ $item->status }}
                                        </div>
                                    @else
                                        <div class="text-info">
                                            <i class="ri-checkbox-circle-line fs-17 align-middle"></i> {{ $item->status }}
                                        </div>
                                    @endif
                                </td>
                                <td>@if($item->deskripsi){{ $item->deskripsi }}@else - @endif</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- end table -->
                </div>
                <!-- end table responsive -->
                @if($data->status != 5 AND $data->status != 0)
                <form action="{{ route('ticket.updateStatus.teknisi') }}" method="POST" class="mt-5">
                    @csrf
                    <div @if($data->progress == 100) style="display:none;" @endif>

                        <input type="hidden" value="{{ $data->idTiket }}" name="idTiket">
                        <input type="hidden" value="{{ Auth::user()->username}}" name="idUser">
                        <input type="hidden" value="update_progress" name="aksi">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <label for="exampleFormControlTextarea1" class="form-label @error('progress') text-danger @enderror">Update Progress</label>
                                <select class="form-select @error('progress') is-invalid @enderror" name="progress" aria-label="Default select example" @if($data->progress == 100) disabled @endif @error('progress') autofocus @enderror>
                                    <option value="">Select Progress (%)</option>
                                    <option value="10" @if($data->progress == 10 || old('progress') == 10) selected @endif @if($data->progress > 10) style="display:none;" @endif>Progress 10</option>
                                    <option value="20" @if($data->progress == 20 || old('progress') == 20) selected @endif @if($data->progress > 20) style="display:none;" @endif>Progress 20</option>
                                    <option value="30" @if($data->progress == 30 || old('progress') == 30) selected @endif @if($data->progress > 30) style="display:none;" @endif>Progress 30</option>
                                    <option value="40" @if($data->progress == 40 || old('progress') == 40) selected @endif @if($data->progress > 40) style="display:none;" @endif>Progress 40</option>
                                    <option value="50" @if($data->progress == 50 || old('progress') == 50) selected @endif @if($data->progress > 50) style="display:none;" @endif>Progress 50</option>
                                    <option value="60" @if($data->progress == 60 || old('progress') == 60) selected @endif @if($data->progress > 60) style="display:none;" @endif>Progress 60</option>
                                    <option value="70" @if($data->progress == 70 || old('progress') == 70) selected @endif @if($data->progress > 70) style="display:none;" @endif>Progress 70</option>
                                    <option value="80" @if($data->progress == 80 || old('progress') == 80) selected @endif @if($data->progress > 80) style="display:none;" @endif>Progress 80</option>
                                    <option value="90" @if($data->progress == 90 || old('progress') == 90) selected @endif @if($data->progress > 90) style="display:none;" @endif>Progress 90</option>
                                    <option value="100" @if($data->progress == 100 || old('progress') == 100) selected @endif>Progress 100</option>
                                </select>
                                @error('progress')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label for="exampleFormControlTextarea1" class="form-label @error('komentar') text-danger @enderror">Leave a Comments</label>
                                <textarea name="komentar" class="form-control  @error('komentar') is-invalid @enderror" id="komentar" rows="3" placeholder="Enter comments" @error('komentar') autofocus @enderror>{{ old('komentar') }}</textarea>
                                @error('komentar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-12 text-end">
                                <button type="submit" id="btnSubmitedit" class="btn btn-success">Post Comments</button>
                                <div id="loadingedit" style="display:none;">
                                    <button type="button" class="btn btn-success btn-load" disabled>
                                        <span class="d-flex align-items-center">
                                            <span class="spinner-border flex-shrink-0" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </span>
                                            <span class="flex-grow-1 ms-2">
                                                Loading...
                                            </span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
                @endif
            </div>
            <!-- end card body -->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    
</div>
<!--end row-->
@endsection
@push('before-scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
@endpush
@push('scripts')
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