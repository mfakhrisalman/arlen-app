@extends('layouts.main')

@section('container')

<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Daftar Pembelian</h1>
                <!--end::Title-->
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
                    <li class="breadcrumb-item text-muted">Laporan Pembelian</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->

        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Group actions-->
    <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
        <div class="fw-bold me-5">
        <span class="me-2" ></span></div>
        <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected"></button>
    </div>
    <!--end::Group actions-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Cari Produk" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end gap-2" data-kt-customer-table-toolbar="base">
                            <!--begin::Add customer-->
                                        <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <div class="input-group">
                    <input type="date" id="start_date_pembelian" class="form-control" placeholder="Tanggal Mulai">
                    <input type="date" id="end_date_pembelian" class="form-control" placeholder="Tanggal Selesai">
                    <button class="btn btn-primary" onclick="filterTablePembelian()">Filter</button>
                </div>
                <!--end::Actions-->
            </div>
            <button class="btn btn-danger" onclick="exportToPDFPembelian()">Export to PDF</button>
            <button class="btn btn-success" onclick="exportToExcelPembelian()">Export to Excel</button>
							{{-- <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Tambah Produk</a> --}}
                            <!--end::Add customer-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_pembelian_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_pembelian_table .form-check-input" value="1" />
                                    </div>
                                </th>
                                <th class="min-w-125px text-dark fw-bold">Tanggal Masuk</th>
                                <th class="min-w-125px text-dark fw-bold">Nama Supplier</th>
                                <th class="min-w-125px text-dark fw-bold">Nama Produk</th>
                                <th class="min-w-125px text-dark fw-bold">Kategori Produk</th>
                                <th class="min-w-125px text-dark fw-bold">Jumlah</th>
                                <th class="min-w-100px text-dark fw-bold">Unit</th>
                                <th class="min-w-125px text-dark fw-bold">Harga Satuan</th>
                                <th class="min-w-125px text-dark fw-bold">Total</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-semibold text-gray-600">
                            @foreach ($Lpembelians as $Lpembelian)
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="text-gray-800 text-hover-primary mb-1">{{ $Lpembelian->date }}</a>
                                </td>
                                <td>{{ $Lpembelian->name_supplier }}</td>
                                <td>{{ $Lpembelian->name_product }}</td>
                                <td>{{ $Lpembelian->category }}</td>
                                <td>{{ $Lpembelian->qty }}</td>
                                <td>{{ $Lpembelian->unit }}</td>
                                <td>Rp {{ number_format($Lpembelian->unit_price, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($Lpembelian->total, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
<script>
  function filterTablePembelian() {
        var startDate = document.getElementById("start_date_pembelian").value;
        var endDate = document.getElementById("end_date_pembelian").value;
        var table = document.getElementById("kt_pembelian_table");
        var tr = table.getElementsByTagName("tr");

        for (var i = 1; i < tr.length; i++) {
            var td = tr[i].getElementsByTagName("td")[1]; // Indeks kolom tanggal diubah dari 2 ke 1
            if (td) {
                var date = new Date(td.textContent.trim());
                var showRow = true;

                if (startDate && date < new Date(startDate)) {
                    showRow = false;
                }
                if (endDate && date > new Date(endDate)) {
                    showRow = false;
                }

                tr[i].style.display = showRow ? "" : "none";
            }
        }
    }

    function exportToPDFPembelian() {
        var { jsPDF } = window.jspdf;
        var doc = new jsPDF();
        doc.autoTable({ html: '#kt_pembelian_table' });
        doc.save('daftar_pembelian.pdf');
    }

    function exportToExcelPembelian() {
        var table = document.getElementById("kt_pembelian_table");
        var wb = XLSX.utils.table_to_book(table, { sheet: "Sheet JS" });
        XLSX.writeFile(wb, "daftar_pembelian.xlsx");
    }
</script>

@endsection