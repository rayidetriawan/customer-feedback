@extends('layouts.master')
@section('title','Dashboard')
@section('nav_active_dashboard', 'active')
@section('content')
@if($data != null)
<div id="subscribeModals" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 overflow-hidden">
            <div class="row g-0">
                <div class="col-lg-7">
                    <div class="modal-body p-5">
                        <h2 class="lh-base mb-4"> Request <span class="text-danger"> {{ $data->idTiket }}</span> telah selesai dikerjakan !</h2>
                        {{-- <p class="text-muted mb-3">Berikanlah Rating Anda.</p> --}}
                        <div class="input-group mb-4">
                            {{-- <input type="text" class="form-control" placeholder="Enter your email" aria-label="Example text with button addon" aria-describedby="button-addon1"> --}}
                            <a href="{{ route('detail.ticket', $data->idTiket) }}">
                                <button class="btn btn-primary" type="button" id="button-addon1">Berikan Rating Anda Sekarang</button>
                            </a>
                        </div>

                        {{-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">By subscribing to a particular channel or user on YouTube, you can receive instant updates.</label>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="subscribe-modals-cover h-100">
                        <img src="{{ asset('assets/images/auth-one-bg.jpg') }}" alt="" class="h-100 w-100 object-cover" style="clip-path: polygon(100% 0%, 100% 100%, 100% 100%, 0% 100%, 25% 50%, 0% 0%);">
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endif
<div class="row">
    <div class="col-xl-12">
        <div class="card crm-widget">
            <div class="card-body p-0">
                <div class="row row-cols-xxl-5 row-cols-md-3 row-cols-1 g-0">
                    <div class="col">
                        <div class="py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">Total Request </h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-ticket-2-line display-6 text-muted"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0"><span class="counter-value" data-target="{{ $jumlah_tiket }}">0</span></h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col">
                        <div class="mt-3 mt-md-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">On Progress </h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-time-line display-6 text-muted"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0"><span class="counter-value" data-target="{{ $onprogress }}">0</span></h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col">
                        <div class="mt-3 mt-md-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">Solved </h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-check-double-line display-6 text-muted"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0"><span class="counter-value" data-target="{{ $done_tiket }}">0</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end row -->
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->
{{-- <div class="row">
    <div class="col-xxl-3 col-md-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Tickets Solved</h4>
                
            </div>
            <div class="card-body pb-0">
                <div id="sales-forecast-chart" data-colors='["--vz-primary", "--vz-success", "--vz-warning"]' class="apex-charts" dir="ltr"></div>
            </div>
        </div>
    </div>

    <div class="col-xxl-3 col-md-6">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Tickets On Process</h4>
                
            </div>
            <div class="card-body pb-0">
                <div id="deal-type-charts" data-colors='["--vz-warning", "--vz-danger", "--vz-success"]' class="apex-charts" dir="ltr"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl-6">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Feedback users</h4>
                
            </div>
            <div class="card-body px-0">
                
                <div id="revenue-expenses-charts" data-colors='["--vz-success", "--vz-danger"]' class="apex-charts" dir="ltr"></div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@push('before-scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
@endpush

@push('scripts')
@if($data != null)
<script>
    $(document).ready(function() {

        $('#subscribeModals').modal('show');

    });
</script>
@endif


<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/dashboard-crm.init.js')}}"></script>
@endpush