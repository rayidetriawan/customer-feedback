@extends('layouts.master')
@section('title', 'Report Detail Teknisi')
@section('nav_active_report_teknisi', 'active')
@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card crm-widget">
                <div class="card-body p-0">
                    <div class="row row-cols-xxl-5 row-cols-md-3 row-cols-1 g-0">

                        <div class="col">
                            <div class="py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">Total Ticket </h5>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="ri-ticket-2-line display-6 text-muted"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value"
                                                data-target="{{ $total }}">0</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                        <!-- end col -->
                        <!-- end col -->
                        <div class="col">
                            <div class="mt-3 mt-lg-0 py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">Waiting Approval</h5>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="ri-coupon-2-line display-6 text-muted"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value"
                                                data-target="{{ $wateknisi }}">0</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                        <div class="col">
                            <div class="mt-3 mt-lg-0 py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">On Progress</h5>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="ri-coupon-2-line display-6 text-muted"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value"
                                                data-target="{{ $onprogress }}">0</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                        <div class="col">
                            <div class="mt-3 mt-lg-0 py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">Ticket Solved</h5>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="ri-check-double-line display-6 text-muted"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value"
                                                data-target="{{ $sukses }}">0</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                        <div class="col">
                            <div class="mt-3 mt-lg-0 py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">Rating</h5>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="mdi mdi-star display-6 text-muted"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value"
                                                data-target="{{ round($rating->rating, 1) }}">0</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">List Job</h4>
                    {{-- <div class="flex-shrink-0">
                    <div class="dropdown card-header-dropdown">
                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted">02 Nov 2021 to 31 Dec 2021<i class="mdi mdi-chevron-down ms-1"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" style="">
                            <a class="dropdown-item" href="#">Today</a>
                            <a class="dropdown-item" href="#">Last Week</a>
                            <a class="dropdown-item" href="#">Last Month</a>
                            <a class="dropdown-item" href="#">Current Year</a>
                        </div>
                    </div>
                </div> --}}
                </div><!-- end card header -->


                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                            <thead class="table-light">
                                <tr class="text-muted">
                                    <th scope="col">#</th>
                                    <th scope="col">Id Ticket</th>
                                    <th scope="col">Reported</th>
                                    <th scope="col">Subjek Masalah</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Progress</th>
                                    <th scope="col">Rating</th>
                                    <th scope="col">Process Date</th>
                                    <th scope="col">Solved</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $no => $item)
                                <tr>
                                    <td>{{ $data->firstItem() + $no }}</td>
                                    <td><a href="{{ route('detail.ticket',$item->idTiket) }}" class="fw-medium">#{{ $item->idTiket }}</a></td>
                                    <td>{{ $item->karyawan['nama'] }}</td>
                                    <td>{{ $item->subjek_masalah }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge bg-warning"> Menunggu Aproval Internal</span>
                                        @elseif($item->status == 2)
                                            <span class="badge bg-warning"> Aproval Internal</span>
                                        @elseif($item->status == 3)
                                            <span class="badge bg-info"> Menunggu Aproval Teknisi</span>
                                        @elseif($item->status == 4)
                                            <span class="badge bg-primary"> Sedang Dalam Pengerjaan</span>
                                        @elseif($item->status == 5)
                                            <span class="badge bg-danger"> Ditolak</span>
                                        @elseif($item->status == 0)
                                            <span class="badge bg-success"> Solved</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar @if ($item->status != 5) bg-success @else bg-danger @endif"
                                                role="progressbar" style="width: {{ $item->progress }}%"
                                                aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                {{ $item->progress }}%</div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if($item->progress == 100)
                                        <span>
                                            <span class="badge badge-soft-info text-body fs-12 fw-medium">
                                                <i class="mdi mdi-star text-warning me-1"></i>
                                                {{ $item->ratting['rating'] }}
                                            </span>
                                        </span>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if(empty($item->tgl_proses))
                                            -
                                        @else
                                            @tanggal($item->tgl_proses)
                                        @endif
                                    </td>
                                    <td>
                                        @if(empty($item->tgl_solved))
                                            -
                                        @else
                                            @tanggal($item->tgl_solved)
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div><!-- end table responsive -->
                </div><!-- end card body -->
            </div>
        </div>
    </div>
@endsection

@push('before-scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/pages/team.init.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard-crm.init.js') }}"></script>
@endpush
