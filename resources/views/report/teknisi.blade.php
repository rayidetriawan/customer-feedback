@extends('layouts.master')
@section('title', 'Report Teknisi')
@section('nav_active_report_teknisi', 'active')
@section('content')

    {{-- <div class="row">
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
                        </div>
                        <div class="col">
                            <div class="mt-3 mt-lg-0 py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">Waiting Approval Internal</h5>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="ri-coupon-2-line display-6 text-muted"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value"
                                                data-target="{{ $wainternal }}">0</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-3 mt-lg-0 py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">Waiting Approval Technition</h5>
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
                        </div>
                        <div class="col">
                            <div class="mt-3 mt-lg-0 py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">Ticket Success</h5>
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
                        </div>
                        <div class="col">
                            <div class="mt-3 mt-lg-0 py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">Ticket Reject</h5>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="ri-close-circle-line display-6 text-muted"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value"
                                                data-target="{{ $tolak }}">0</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>

                    <div id="teamlist">
                        <div class="team-list grid-view-filter row" id="team-member-list">
                            @foreach ($data as $no => $result)
                            <div class="col">
                                <div class="card team-box">
                                    <div class="team-cover "> <img src="{{ asset('assets/images/small/img-6.jpg') }}" alt=""
                                            class="img-fluid"> </div>
                                    <div class="card-body p-4">
                                        <div class="row align-items-center team-row">
                                            <div class="col team-settings">
                                                <div class="row">
                                                    <div class="col text-end dropdown"> <a href="javascript:void(0);"
                                                            data-bs-toggle="dropdown" aria-expanded="false"> <i
                                                                class="ri-more-fill fs-17"></i> </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="team-profile-img mb-0">
                                                    <div class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                        <div
                                                            class="avatar-title border bg-light text-primary rounded-circle text-uppercase">
                                                            <?php
                                                            $s = $result->nama;
                                                            
                                                            if (preg_match_all('/\b(\w)/', strtoupper($s), $m)) {
                                                                $v = implode('', $m[1]);
                                                            }
                                                            
                                                            echo $v;
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="team-content"> <a class="member-name"
                                                            data-bs-toggle="offcanvas" href="#member-overview"
                                                            aria-controls="member-overview">
                                                            <h5>{{ $result->nama }}</h5>
                                                        </a></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="row text-muted text-center">
                                                    <div class="col-12">
                                                        <h5 class="text-muted mb-0">
                                                            <span>
                                                                <span class="badge badge-soft-info text-body fs-5 fw-medium">
                                                                    <i class="mdi mdi-star text-warning me-1"></i>
                                                                    {{ round($result->rating, 1) }}
                                                                </span>
                                                            </span>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col">
                                                <div class="text-end"> <a href="{{ route('report.teknisi.detail', $result->nik) }}"
                                                        class="btn btn-light view-btn">View Detail</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-0 d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Export Report Teknisi</h4>
                    <div class="flex-shrink-0">
                    </div>
                </div><!-- end card header -->

                <div class="card-body border border-dashed border-end-0 border-start-0">
                    <div class="card mb-4 mt-4 bg-light overflow-hidden">
                        <div class="card-body">
                            <form action="{{ route('teknisi.export') }}" method="post">
                            @csrf
                                <div class="row">
                                    <div class="col-md-5 mb-1 mt-3">
                                        Pilih tanggal dari
                                    </div>
                                    <div class="col-md-5 mb-1 mt-3">
                                        Pilih tanggal sampai
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <input type="date" name="from" required class="form-control" placeholder="pilih tanggal dari">
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <input type="date" name="to" required class="form-control" placeholder="pilih tanggal sampai">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <button class="btn btn-primary" id="submit"><i class="ri-file-excel-2-line me-1 align-bottom"></i> Export Report</button>
                                        <div id="loading" style="display:none;">
                                            <button type="button" class="btn btn-primary btn-load" disabled>
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
                            </form>
                        </div>
                        <div class="progress bg-soft-primary rounded-0">
                            <div id="progress" class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><div id="textpercen"></div></div>
                        </div>
                    </div>
                </div>
                <div class="card-body mb-2">
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
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
