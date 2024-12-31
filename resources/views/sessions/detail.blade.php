@extends('layouts.main')

@section('container')
    
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="/dashboard" class="text-muted text-hover-primary">Beranda</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted"><a href="/session" class="text-muted text-hover-primary">Data Session</a></li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Contacts-->
                <div class="card card-flush h-lg-100" id="kt_contacts_main">
                    <!--begin::Card header-->
                    <div class="card-header pt-7" id="kt_chat_contacts_header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                            <span class="svg-icon svg-icon-1 me-2">
                            </span>
                            <!--end::Svg Icon-->
                            <h2>Data Session</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-5">
                        <!--begin::Form-->
                        <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Session #{{ $sessions->id }}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                <th class="min-w-150px">Jenis</th>
                                                <th class="min-w-70px text-end">Rp.500</th>
                                                <th class="min-w-70px text-end">Rp.1.000</th>
                                                <th class="min-w-70px text-end">Rp.2.000</th>
                                                <th class="min-w-70px text-end">Rp.5.000</th>
                                                <th class="min-w-70px text-end">Rp.10.000</th>
                                                <th class="min-w-70px text-end">Rp.20.000</th>
                                                <th class="min-w-70px text-end">Rp.50.000</th>
                                                <th class="min-w-70px text-end">Rp.100.000</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <tbody class="fw-semibold text-gray-600">
                                            <!--begin::Products-->
                                            <tr>
                                                <td class="min-w-150px">Open</td>
                                                <td class="text-end">{{ $sessions->input_500 }}</td>
                                                <td class="text-end">{{ $sessions->input_1000 }}</td>
                                                <td class="text-end">{{ $sessions->input_2000 }}</td>
                                                <td class="text-end">{{ $sessions->input_5000 }}</td>
                                                <td class="text-end">{{ $sessions->input_10000 }}</td>
                                                <td class="text-end">{{ $sessions->input_20000 }}</td>
                                                <td class="text-end">{{ $sessions->input_50000 }}</td>
                                                <td class="text-end">{{ $sessions->input_100000 }}</td>
                                            </tr>
                                            <tr>
                                                <td class="min-w-175px">Closed</td>
                                                <td class="text-end">{{ $sessions->input_500_c }}</td>
                                                <td class="text-end">{{ $sessions->input_1000_c }}</td>
                                                <td class="text-end">{{ $sessions->input_2000_c }}</td>
                                                <td class="text-end">{{ $sessions->input_5000_c }}</td>
                                                <td class="text-end">{{ $sessions->input_10000_c }}</td>
                                                <td class="text-end">{{ $sessions->input_20000_c }}</td>
                                                <td class="text-end">{{ $sessions->input_50000_c }}</td>
                                                <td class="text-end">{{ $sessions->input_100000_c }}</td>
                                            </tr>
                                            <!--begin::Open Session-->
                                            <tr>
                                                <td colspan="8" class="text-end">Open Session</td>
                                                <td class="text-end">Rp {{ number_format($sessions->amount_open, 0, ',', '.') }}</td>
                                            </tr>
                                            <!--end::Open Session-->
                                            <!--begin::Closed Session-->
                                            <tr>
                                                <td colspan="8" class="text-end">Closed Session</td>
                                                <td class="text-end">Rp {{ number_format($sessions->amount_closed, 0, ',', '.') }}</td>
                                            </tr>
                                            <!--end::Closed Session-->
                                            <!--begin::Selisih-->
                                            <tr>
                                                <td class="fs-3 text-dark">Keterangan</td>
                                                <td colspan="8" class="text-dark fs-3 text-end">{{ $sessions->information }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="8" class="fs-3 text-dark text-end">Selisih</td>
                                                <td class="text-dark fs-3 fw-bolder text-end">Rp {{ number_format($sessions->gap, 0, ',', '.') }}</td>
                                            </tr>
                                            
                                            <!--end::Selisih-->

                                        </tbody>
                                        <!--end::Table head-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Contacts-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
    
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@endsection