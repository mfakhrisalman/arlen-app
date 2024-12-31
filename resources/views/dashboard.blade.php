@extends('layouts.main')

@section('container')
    
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->

        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="row mb-xl-10">    
                <div class="col-xl-4">
                    <!--begin::Card widget 3-->
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-70" style="background-color: #50cd89;background-image:url('assets/media/svg/shapes/wave-bg-red.svg')">
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end mb-2">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <span class="fs-2hx text-white fw-bold me-6">Rp.{{ number_format($totalJual, 0, ',', '.') }}</span>
                                <div class="fw-bold fs-6 text-white">
                                </div>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
                            <!--begin::Progress-->
                            <div class="fw-bold text-white py-2">
                                <span class="fs-0 d-block">Total Penjualan Bulan Ini</span>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Card footer-->
                    </div>
                    <!--end::Card widget 3-->
                </div>
                <div class="col-xl-4">
                    <!--begin::Card widget 3-->
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-70" style="background-color: #F1416C;background-image:url('assets/media/svg/shapes/wave-bg-red.svg')">
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end mb-2">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <span class="fs-2hx text-white fw-bold me-6">Rp.{{ number_format($totalBeli, 0, ',', '.') }}</span>
                                <div class="fw-bold fs-6 text-white">
                                </div>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
                            <!--begin::Progress-->
                            <div class="fw-bold text-white py-2">
                                <span class="fs-0 d-block">Total Pembelian Bulan Ini</span>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Card footer-->
                    </div>
                    <!--end::Card widget 3-->
                </div>
                <div class="col-xl-4">
                    <!--begin::Card widget 3-->
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-70" style="background-color: #7239EA;background-image:url('assets/media/svg/shapes/wave-bg-red.svg')">
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end mb-2">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <span class="fs-2hx text-white fw-bold me-6">{{ $totalBarang }}</span>
                                <div class="fw-bold fs-6 text-white">
                                    <span class="d-block">pcs</span>
                                </div>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
                            <!--begin::Progress-->
                            <div class="fw-bold text-white py-2">
                                <span class="fs-0 d-block">Barang Terjual Bulan Ini</span>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Card footer-->
                    </div>
                    <!--end::Card widget 3-->
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <!--begin::Card widget 3-->
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-70" style="background-color: #ea8939;background-image:url('assets/media/svg/shapes/wave-bg-purple.svg')">
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end mb-2">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                @can('admin')
                                <span class="fs-2hx text-white fw-bold me-6">Rp.{{ number_format($totalJualHariIniA, 0, ',', '.') }}</span>
                                @endcan
                                @can('cashier')
                                <span class="fs-2hx text-white fw-bold me-6">Rp.{{ number_format($totalJualHariIni, 0, ',', '.') }}</span>
                                @endcan

                                <div class="fw-bold fs-6 text-white">
                                </div>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
                            <!--begin::Progress-->
                            <div class="fw-bold text-white py-2">
                                @can('cashier')
                                <span class="fs-0 d-block">Total Penjualan Sesi Ini</span>
                                @endcan
                                @can('admin')
                                <span class="fs-0 d-block">Total Penjualan Hari Ini</span>
                                @endcan
                            </div>
                        </div>
                        <!--end::Card footer-->
                    </div>
                    <!--end::Card widget 3-->
                </div>
                <div class="col-xl-4">
                    <!--begin::Card widget 3-->
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-70" style="background-color: #c4ea39;background-image:url('assets/media/svg/shapes/wave-bg-purple.svg')">
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end mb-2">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <span class="fs-2hx text-white fw-bold me-6">Rp.{{ number_format($totalDiskon, 0, ',', '.') }}</span>
                                <div class="fw-bold fs-6 text-white">
                                </div>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
                            <!--begin::Progress-->
                            <div class="fw-bold text-white py-2">
                                <span class="fs-0 d-block">Total Diskon Bulan ini</span>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Card footer-->
                    </div>
                    <!--end::Card widget 3-->
                </div>                
                <div class="col-xl-4">
                    <!--begin::Card widget 3-->
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-70" style="background-color: #ea39d2;background-image:url('assets/media/svg/shapes/wave-bg-purple.svg')">
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end mb-2">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <span class="fs-2hx text-white fw-bold me-6">{{ $totalDibeli }}</span>
                                <div class="fw-bold fs-6 text-white">
                                    <span class="d-block">pcs</span>
                                </div>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
                            <!--begin::Progress-->
                            <div class="fw-bold text-white py-2">
                                <span class="fs-0 d-block">Barang Dibeli Bulan Ini</span>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Card footer-->
                    </div>
                    <!--end::Card widget 3-->
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @can('admin')
                    <!-- Kolom untuk log aktivitas di sebelah kiri -->
                    <div class="col-xl-4 mb-xl-10 mt-4">
                        <!--begin::List widget 16-->
                        <div class="card card-flush h-xl-100">
                            <!--begin::Header-->
                            <div class="card-header pt-7">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-800">Log Aktivitas</span>
                                </h3>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-4 px-0">
                                <!--begin::Tab Content-->
                                <div class="tab-content px-9 hover-scroll-overlay-y pe-7 me-3 mb-2" style="height: 454px">
                                    <!-- Loop untuk produk yang dibuat (created) -->
                                    @foreach ($produk as $item)
                                    <!--begin::Item-->
                                    <div class="m-0">
                                        <!--begin::Timeline-->
                                        <div class="timeline ms-n1">
                                            <!--begin::Timeline item-->
                                            <div class="timeline-item align-items-center mb-4">
                                                <!--begin::Timeline line-->
                                                <div class="timeline-line w-20px mt-9 mb-n14"></div>
                                                <!--end::Timeline line-->
                                                <!--begin::Timeline icon-->
                                                <div class="timeline-icon pt-1" style="margin-left: 0.7px">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen015.svg-->
                                                    <span class="svg-icon svg-icon-2 svg-icon-success">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10ZM6.39999 9.89999C6.99999 8.19999 8.40001 6.9 10.1 6.4C10.6 6.2 10.9 5.7 10.7 5.1C10.5 4.6 9.99999 4.3 9.39999 4.5C7.09999 5.3 5.29999 7 4.39999 9.2C4.19999 9.7 4.5 10.3 5 10.5C5.1 10.5 5.19999 10.6 5.39999 10.6C5.89999 10.5 6.19999 10.2 6.39999 9.89999ZM14.8 19.5C17 18.7 18.8 16.9 19.6 14.7C19.8 14.2 19.5 13.6 19 13.4C18.5 13.2 17.9 13.5 17.7 14C17.1 15.7 15.8 17 14.1 17.6C13.6 17.8 13.3 18.4 13.5 18.9C13.6 19.3 14 19.6 14.4 19.6C14.5 19.6 14.6 19.6 14.8 19.5Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                                <!--end::Timeline icon-->
                                                <!--begin::Timeline content-->
                                                <div class="timeline-content m-0">
                                                    <!--begin::Label-->
                                                    <span class="fs-8 fw-bolder text-success text-uppercase">Created</span> {{ $item->created_at }}
                                                    <!--begin::Label-->
                                                    <!--begin::Title-->
                                                    <a href="#" class="fs-6 text-gray-800 fw-bold d-block text-hover-primary">{{ $item->created_by }}</a>
                                                    <!--end::Title-->
                                                    <!--begin::Title-->
                                                    <span class="fw-semibold text-gray-400">Menambahkan data produk {{ $item->name_product }}</span>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Timeline content-->
                                            </div>
                                            <!--end::Timeline item-->
                                        </div>
                                        <!--end::Timeline-->
                                    </div>
                                    <!--end::Item-->
                                    @endforeach
            
                                    <!-- Loop untuk produk yang diperbarui (updated) -->
                                    @foreach ($produku as $item)
                                    <!--begin::Item-->
                                    <div class="m-0">
                                        <!--begin::Timeline-->
                                        <div class="timeline ms-n1">
                                            <!--begin::Timeline item-->
                                            <div class="timeline-item align-items-center mb-4">
                                                <!--begin::Timeline line-->
                                                <div class="timeline-line w-20px mt-9 mb-n14"></div>
                                                <!--end::Timeline line-->
                                                <!--begin::Timeline icon-->
                                                <div class="timeline-icon pt-1" style="margin-left: 0.7px">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen015.svg-->
                                                    <span class="svg-icon svg-icon-2 svg-icon-info">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10ZM6.39999 9.89999C6.99999 8.19999 8.40001 6.9 10.1 6.4C10.6 6.2 10.9 5.7 10.7 5.1C10.5 4.6 9.99999 4.3 9.39999 4.5C7.09999 5.3 5.29999 7 4.39999 9.2C4.19999 9.7 4.5 10.3 5 10.5C5.1 10.5 5.19999 10.6 5.39999 10.6C5.89999 10.5 6.19999 10.2 6.39999 9.89999ZM14.8 19.5C17 18.7 18.8 16.9 19.6 14.7C19.8 14.2 19.5 13.6 19 13.4C18.5 13.2 17.9 13.5 17.7 14C17.1 15.7 15.8 17 14.1 17.6C13.6 17.8 13.3 18.4 13.5 18.9C13.6 19.3 14 19.6 14.4 19.6C14.5 19.6 14.6 19.6 14.8 19.5Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                                <!--end::Timeline icon-->
                                                <!--begin::Timeline content-->
                                                <div class="timeline-content m-0">
                                                    <!--begin::Label-->
                                                    <span class="fs-8 fw-bolder text-info text-uppercase">Updated</span> {{ $item->updated_at }}
                                                    <!--begin::Label-->
                                                    <!--begin::Title-->
                                                    <a href="#" class="fs-6 text-gray-800 fw-bold d-block text-hover-primary">{{ $item->updated_by }}</a>
                                                    <!--end::Title-->
                                                    <!--begin::Title-->
                                                    <span class="fw-semibold text-gray-400">Mengedit data produk {{ $item->name_product }}</span>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Timeline content-->
                                            </div>
                                            <!--end::Timeline item-->
                                        </div>
                                        <!--end::Timeline-->
                                    </div>
                                    <!--end::Item-->
                                    @endforeach
                                </div>
                                <!--end::Tab Content-->
                            </div>
                            <!--end: Card Body-->
                        </div>
                        <!--end::List widget 16-->
                    </div>
                    @endcan
                    <!-- Kolom untuk grafik di sebelah kanan -->
                    @can('cashier')
                    <div class="col-xl-12 mb-5 mb-xl-10 mt-4">
                    @endcan
                    @can('admin')
                    <div class="col-xl-8 mb-5 mb-xl-10 mt-4">
                    @endcan
                        <div class="row mb-5">
                            <!-- Grafik pertama -->
                                <!--begin::Chart widget 8-->
                                <div class="card card-flush" style="height: 350px">
                                    <!--begin::Header-->
                                    <div class="card-header pt-5">
                                        <!--begin::Title-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold text-dark">Produk Terlaris</span>
                                        </h3>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-6" style="height:350px">
                                        {!! $chart->container() !!}
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Chart widget 8-->
                        </div>
                        <div class="row">
                            <!-- Grafik kedua -->
                                <!--begin::Chart widget 8-->
                                <div class="card card-flush" style="height:350px">
                                    <!--begin::Header-->
                                    <div class="card-header pt-5">
                                        <!--begin::Title-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold text-dark">Total Pendapatan Perbulan</span>
                                        </h3>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-6" style="height:350px" >
                                        {!! $incomeChart->container() !!}
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Chart widget 8-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->

</div>

@can('cashier')
<div class="modal fade" id="modal_open_session" tabindex="-1" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
        
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Opening Cash Control</h2>
                <!--end::Modal title-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="modal_open_session_form" class="form" action="/session" method="POST">
                    @csrf
                    <h4>Masukkan Jumlah Uang</h4>
                    <div class="row mb-12">
                        <!-- Column 1 -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label fs-6 fw-semibold">Rp.500</label>
                            <input type="number" class="form-control" name="input_500" id="input_500" placeholder="0 koin" required>
                        </div>
                        <!-- Column 2 -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label fs-6 fw-semibold">Rp.10.000</label>
                            <input type="number" class="form-control" name="input_10000" id="input_10000" placeholder="0 Lembar" required>
                        </div>
                    </div>
                    <!-- End Row 1 -->

                    <!-- Row 2 -->
                    <div class="row mb-12">
                        <!-- Column 1 -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label fs-6 fw-semibold">Rp.1.000</label>
                            <input type="number" class="form-control" name="input_1000" id="input_1000" placeholder="0 Lembar" required>
                        </div>
                        <!-- Column 2 -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label fs-6 fw-semibold">Rp.20.000</label>
                            <input type="number" class="form-control" name="input_20000" id="input_20000" placeholder="0 Lembar" required>
                        </div>
                    </div>
                    <!-- End Row 2 -->

                    <!-- Row 3 -->
                    <div class="row mb-12">
                        <!-- Column 1 -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label fs-6 fw-semibold">Rp.2.000</label>
                            <input type="number" class="form-control" name="input_2000" id="input_2000" placeholder="0 Lembar" required>
                        </div>
                        <!-- Column 2 -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label fs-6 fw-semibold">Rp.50.000</label>
                            <input type="number" class="form-control" name="input_50000" id="input_50000" placeholder="0 Lembar" required>
                        </div>
                    </div>
                    <!-- End Row 3 -->

                    <!-- Row 4 -->
                    <div class="row mb-12">
                        <!-- Column 1 -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label fs-6 fw-semibold">Rp.5.000</label>
                            <input type="number" class="form-control" name="input_5000" id="input_5000" placeholder="0 Lembar" required>
                        </div>
                        <!-- Column 2 -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label fs-6 fw-semibold">Rp.100.000</label>
                            <input type="number" class="form-control" name="input_100000" id="input_100000" placeholder="0 Lembar" required>
                        </div>
                    </div>
                    <!-- End Row 4 -->
                    <!-- Total Input -->
                    <div class="row mb-12">
                        <div class="col-md-12 mb-2">
                            <label class="form-label fs-6 fw-semibold">Total</label>
                            <input type="text" class="form-control" name="amount_open" id="amount_open" readonly>
                        </div>
                    </div>
                    <!-- End Total Input -->
                    <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                    <input type="hidden" name="status" id="status" value="1">
                    <input type="hidden" name="amount_closed" id="amount_closed">

                    <!-- Actions -->
                    <div class="text-center pt-15">
                        <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">Reset</button>
                        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                            <span class="indicator-label">Open Session</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    <!-- End Actions -->
                </form>
                <!-- End Form -->
            </div>
            <!-- End Modal body -->
        </div>
        <!-- End Modal content -->
    </div>
    <!-- End Modal dialog -->
</div>
@endcan
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Lakukan AJAX request untuk memeriksa status session
    $.ajax({
        url: '/check-session-status', // Ganti dengan URL yang sesuai untuk memeriksa status session
        method: 'GET',
        success: function(response) {
            if (response.sessionExists && response.sessionStatus === 1) {
                // Jika ada session dengan status 1, jangan tampilkan modal

                console.log('Session with status 1 is active. Modal will not be shown.');
            } else {
                // Jika tidak ada atau status tidak 1, tampilkan modal
                $('#modal_open_session').modal('show') ;
            }
        },
        error: function(xhr, status, error) {
            console.error('Error checking session status:', error);
            // Fallback: tampilkan modal secara default jika terjadi kesalahan
            $('#modal_open_session').modal('show');
        }
    });

        // Event listener untuk menghitung total
        $('#modal_open_session_form input').on('input', function() {
            calculateTotal();
        });

        // Fungsi untuk menghitung total
        function calculateTotal() {
            var total = 0;
            // Ambil nilai dari setiap input dan kalikan dengan nilai nominalnya
            total += $('#input_500').val() * 500;
            total += $('#input_10000').val() * 10000;
            total += $('#input_1000').val() * 1000;
            total += $('#input_20000').val() * 20000;
            total += $('#input_2000').val() * 2000;
            total += $('#input_50000').val() * 50000;
            total += $('#input_5000').val() * 5000;
            total += $('#input_100000').val() * 100000;

            // Update nilai input total
            $('#amount_open').val(total);
            $('#amount_closed').val(total);
        }
    });
</script>
<script src="{{ LarapexChart::cdn() }}"></script>
{{ $chart->script() }}
{{ $incomeChart->script() }}
@endsection