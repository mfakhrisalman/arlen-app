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
                        <li class="breadcrumb-item text-muted"><a href="/laporan-penjualan" class="text-muted text-hover-primary">Laporan Penjualan</a></li>
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
                                <h2>Data Detail Penjualan</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-5">
                            <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Transaksi #{{ $penjualans->id }}</h2>
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
                                                    <th class="min-w-175px text-dark fw-bold">Item</th>
                                                    <th class="min-w-100px text-end text-dark fw-bold"></th>
                                                    <th class="min-w-70px text-end text-dark fw-bold">Jumlah</th>
                                                    <th class="min-w-100px text-end text-dark fw-bold">Harga</th>
                                                    <th class="min-w-100px text-end text-dark fw-bold">Total</th>
                                                    <th class="min-w-20px text-end text-dark fw-bold">Aksi</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <tbody class="fw-semibold text-gray-600">
                                                <!--begin::Products-->
                                                @foreach ($detail_penjualans as $detail_penjualan)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="ms-5">
                                                                <a href="" class="fw-bold text-gray-600 text-hover-primary">{{ $detail_penjualan->name_product }}</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-end"></td>
                                                    <td class="text-end">{{ $detail_penjualan->qty }}</td>
                                                    <td class="text-end">Rp {{ number_format($detail_penjualan->unit_price , 0, ',', '.') }}</td>
                                                    <td class="text-end">Rp {{ number_format($detail_penjualan->total , 0, ',', '.') }}</td>
                                                    <td class="text-end">
                                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary"  
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#kt_modal_edit_item" 
                                                            data-id="{{ $detail_penjualan->id }}"
                                                            data-name="{{ $detail_penjualan->name_product }}"
                                                            data-qty="{{ $detail_penjualan->qty }}"
                                                            data-price="{{ $detail_penjualan->unit_price }}"
                                                            data-total="{{ $detail_penjualan->total }}"
                                                            data-no_sale="{{ $penjualans->id }}"
                                                            data-subtotal="{{ $penjualans->subtotal }}"
                                                            data-discount="{{ $penjualans->discount }}"
                                                            data-total_payment="{{ $penjualans->total_payment }}">
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                <!--begin::Subtotal-->
                                                <tr>
                                                    <td colspan="4" class="text-end">Subtotal</td>
                                                    <td class="text-end">Rp {{ number_format($penjualans->subtotal , 0, ',', '.') }}</td>
                                                </tr>
                                                <!--end::Subtotal-->
                                                <!--begin::VAT-->
                                                <tr>
                                                    <td colspan="4" class="text-end">Diskon</td>
                                                    <td class="text-end">Rp {{ number_format($penjualans->discount , 0, ',', '.') }}</td>
                                                </tr>
                                                <!--end::VAT-->
                                                <!--begin::Grand total-->
                                                <tr>
                                                    <td colspan="4" class="fs-3 text-dark text-end">Total Bayar</td>
                                                    <td class="text-dark fs-3 fw-bolder text-end">Rp {{ number_format($penjualans->total_payment , 0, ',', '.') }}</td>
                                                </tr>
                                                <!--end::Grand total-->
                                                <tr>
                                                    <td colspan="4" class="fs-3 text-dark text-end"> 
                                                        <form action="/cetak-struk" method="POST" id="printReceiptForm">
                                                            @csrf
                                                            <input type="hidden" name="no_sale" value="{{ $penjualans->id }}">
                                                            <button type="submit" class="btn btn-primary">
                                                                <span class="indicator-label">Cetak Struk</span>
                                                                <span class="indicator-progress">Tunggu sebentar...
                                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!--end::Table head-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Contacts-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
        
    </div>
<!--begin::Modal - Edit Item-->
<div class="modal fade" id="kt_modal_edit_item" tabindex="-1" aria-labelledby="kt_modal_edit_item_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <h5 class="modal-title" id="kt_modal_edit_item_label">Edit Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body py-lg-10 px-lg-10">
                <form class="form fv-plugins-bootstrap5 fv-plugins-framework" action="/update-item" method="post">
                    @csrf
                    <input type="hidden" name="id" id="edit_item_id">
                    <input type="hidden" name="no_sale" id="edit_item_no_sale">
                    <!-- Hidden inputs for additional data -->
                    <input type="hidden" name="subtotal" id="edit_item_subtotal">
                    <input type="hidden" name="discount" id="edit_item_discount">
                    <input type="hidden" name="total_payment" id="edit_item_total_payment">
                    <input type="hidden" name="old_qty" id="edit_item_old_qty">
                    <!--begin::Input group-->
                    <div class="fv-row mb-3 fv-plugins-icon-container">
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">Nama Item</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" name="name" id="edit_item_name">
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-3 fv-plugins-icon-container">
                        <label class="fs-6 fw-semibold form-label mt-1">
                            <span class="required">Jumlah</span>
                        </label>
                        <input type="number" class="form-control form-control-solid" name="qty" id="edit_item_qty">
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-3 fv-plugins-icon-container">
                        <label class="fs-6 fw-semibold form-label mt-1">
                            <span class="required">Harga/Unit</span>
                        </label>
                        <input type="number" class="form-control form-control-solid" name="price" id="edit_item_price">
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-3 fv-plugins-icon-container">
                        <label class="fs-6 fw-semibold form-label mt-1">
                            <span class="required">Total</span>
                        </label>
                        <input type="number" class="form-control form-control-solid" name="total" id="edit_item_total" readonly>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->

                    <!-- Display updated subtotal and total payment -->
                    <div class="mb-3">
                        <label class="fs-6 fw-semibold form-label mt-1">Subtotal</label>
                        <input type="text" class="form-control form-control-solid" id="updated_subtotal" name="updated_subtotal" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="fs-6 fw-semibold form-label mt-1">Total Payment</label>
                        <input type="text" class="form-control form-control-solid" id="updated_total_payment" name="updated_total_payment" readonly>
                    </div>                    '
                    <div class="mb-3">
                        <label class="fs-6 fw-semibold form-label mt-1">Uang yang Harus Dikembalikan</label>
                        <input type="text" class="form-control form-control-solid" id="dikembalikan" name="dikembalikan" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="fs-6 fw-semibold form-label mt-1">Uang yang Harus Dibayarkan</label>
                        <input type="text" class="form-control form-control-solid" id="Dibayarkan" name="Dibayarkan" readonly>
                    </div>

                    <!--begin::Separator-->
                    <div class="separator mb-6"></div>
                    <!--end::Separator-->
                    <!--begin::Action buttons-->
                    <div class="d-flex justify-content-end">
                        <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                            <span class="indicator-label">Simpan</span>
                            <span class="indicator-progress">Tunggu sebentar...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Action buttons-->
                </form>
            </div>
            <!--end::Modal body-->
        </div>
    </div>
</div>
<!--end::Modal - Edit Item-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#kt_modal_edit_item').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var id = button.data('id');
                var noSale = button.data('no_sale');
                var name = button.data('name');
                var qty = button.data('qty');
                var price = button.data('price');
                var total = button.data('total');
                var subtotal = button.data('subtotal'); // Additional data
                var discount = button.data('discount'); // Additional data
                var totalPayment = button.data('total_payment'); // Additional data
        
                var modal = $(this);
                modal.find('#edit_item_id').val(id);
                modal.find('#edit_item_no_sale').val(noSale);
                modal.find('#edit_item_name').val(name);
                modal.find('#edit_item_qty').val(qty);
                modal.find('#edit_item_price').val(price);
                modal.find('#edit_item_total').val(total);
                modal.find('#edit_item_subtotal').val(subtotal); // Set additional data
                modal.find('#edit_item_discount').val(discount); // Set additional data
                modal.find('#edit_item_total_payment').val(totalPayment); // Set additional data
                modal.find('#edit_item_old_qty').val(qty); // Set initial old_qty
        
                // Set initial subtotal and total payment in modal
                modal.find('#updated_subtotal').val(subtotal);
                modal.find('#updated_total_payment').val(totalPayment);
                modal.find('#dikembalikan').val(0);
                modal.find('#Dibayarkan').val(0);
        
                // Update total, subtotal, total payment, and old_qty on qty or price change
                modal.find('#edit_item_qty, #edit_item_price').on('input', function() {
                    var updatedQty = parseInt(modal.find('#edit_item_qty').val(), 10) || 0;
                    var updatedPrice = parseInt(modal.find('#edit_item_price').val(), 10) || 0;
                    var initialQty = parseInt(button.data('qty'), 10);
                    var initialTotal = parseInt(button.data('total'), 10);
        
                    // Update total for the item
                    var updatedTotal = updatedQty * updatedPrice;
                    modal.find('#edit_item_total').val(updatedTotal);
        
                    // Calculate the difference
                    var qtyDifference = updatedQty - initialQty;
                    var priceDifference = updatedPrice - parseInt(button.data('price'), 10);
        
                    // Update subtotal and total payment
                    var newSubtotal = parseInt(subtotal, 10) + (qtyDifference * parseInt(button.data('price'), 10));
                    var newTotalPayment = parseInt(totalPayment, 10) + (qtyDifference * updatedPrice);
        
                    // Update values based on quantity change
                    var dikembalikan = 0;
                    var dibayarkan = 0;
                    
                    if (qtyDifference > 0) {
                        // When quantity is increased
                        dikembalikan = 0;
                        dibayarkan = newTotalPayment - totalPayment;
                    } else if (qtyDifference < 0) {
                        // When quantity is decreased
                        dikembalikan = totalPayment - newTotalPayment;
                        dibayarkan = 0;
                    }
        
                    modal.find('#updated_subtotal').val(newSubtotal);
                    modal.find('#updated_total_payment').val(newTotalPayment);
                    modal.find('#dikembalikan').val(dikembalikan);
                    modal.find('#Dibayarkan').val(dibayarkan);
        
                    // Set old_qty as the difference
                    modal.find('#edit_item_old_qty').val(qtyDifference);
                });
            });
        });
        </script>
        
    
    

    @endsection
