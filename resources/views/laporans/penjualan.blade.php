@extends('layouts.main')

@section('container')
    
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Daftar Penjualan</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="/dashboard" class="text-muted text-hover-primary">Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Laporan Penjualan</li>
                </ul>
            </div>

        </div>
    </div>
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                </svg>
                            </span>
                            <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Cari Produk" />
                        </div>
                    </div>
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end gap-2" data-kt-customer-table-toolbar="base">
                                <!--begin::Add customer-->
                                <div class="d-flex align-items-center gap-2 gap-lg-3">
                                    <div class="input-group">
                                        <input type="date" id="start_date" class="form-control" placeholder="Tanggal Mulai">
                                        <input type="date" id="end_date" class="form-control" placeholder="Tanggal Selesai">
                                        <button class="btn btn-primary" onclick="filterTable()">Filter</button>
                                    </div>
                    
                                </div>
                                <button class="btn btn-danger" onclick="exportToPDF()">Export to PDF</button>
                                <button class="btn btn-success" onclick="exportToExcel()">Export to Excel</button>
                            <!--end::Add customer-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Card toolbar-->
                </div>

                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                                    </div>
                                </th>
                                <th class="min-w-125px text-dark fw-bold">No Transaksi</th>
                                <th class="min-w-125px text-dark fw-bold">Tanggal Transaksi</th>
                                <th class="min-w-125px text-dark fw-bold">Nama Kasir</th>
                                <th class="min-w-150px text-dark fw-bold">Diskon</th>
                                {{-- <th class="min-w-125px text-dark fw-bold">Uang Tunai</th> --}}
                                {{-- <th class="min-w-125px text-dark fw-bold">Kembalian</th> --}}
                                <th class="min-w-100px text-dark fw-bold">Total Belanja</th>
                                <th class="min-w-125px text-dark fw-bold text-end">Total Bayar</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @foreach ($Lpenjualans as $Lpenjualan)
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td>
                                    <a href="/laporan-penjualan/{{ $Lpenjualan->id }}/edit" class="text-gray-800 text-hover-primary mb-1">{{ $Lpenjualan->no_sale }}</a>
                                </td>
                                <td>{{ $Lpenjualan->date }}</td>
                                <td>{{ $Lpenjualan->name_cashier }}</td>
                                <td>Rp {{ number_format($Lpenjualan->discount, 0, ',', '.') }}</td>
                                {{-- <td>Rp {{ number_format($Lpenjualan->cash, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($Lpenjualan->return, 0, ',', '.') }}</td> --}}
                                <td>Rp {{ number_format($Lpenjualan->subtotal, 0, ',', '.') }}</td>
                                <td class="text-end">Rp {{ number_format($Lpenjualan->total_payment, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>

<script>
    function filterTable() {
        var startDate = document.getElementById("start_date").value;
        var endDate = document.getElementById("end_date").value;
        var table = document.getElementById("kt_customers_table");
        var tr = table.getElementsByTagName("tr");

        for (var i = 1; i < tr.length; i++) {
            var td = tr[i].getElementsByTagName("td");
            var date = new Date(td[2].textContent.trim());
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

    function exportToPDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        var table = document.getElementById("kt_customers_table");
        var tr = table.getElementsByTagName("tr");

        let rowData = [];
        let header = [];
        var th = table.getElementsByTagName("th");
        for (var h = 0; h < th.length; h++) {
            header.push(th[h].textContent.trim());
        }
        rowData.push(header);

        for (var i = 1; i < tr.length; i++) {
            var td = tr[i].getElementsByTagName("td");
            let row = [];
            for (var j = 0; j < td.length; j++) {
                row.push(td[j].textContent.trim());
            }
            rowData.push(row);
        }

        doc.autoTable({
            head: [rowData[0]],
            body: rowData.slice(1),
        });

        doc.save('table-data.pdf');
    }

    function exportToExcel() {
        var table = document.getElementById("kt_customers_table");
        var wb = XLSX.utils.table_to_book(table, {sheet: "Sheet JS"});
        XLSX.writeFile(wb, "table-data.xlsx");
    }
</script>
@endsection
