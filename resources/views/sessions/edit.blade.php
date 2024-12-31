@extends('layouts.main')

@section('container')

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Edit Session</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="/dashboard" class="text-muted text-hover-primary">Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="/session" class="text-muted text-hover-primary">Session</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Edit Session</li>
                </ul>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card card-flush h-lg-100" id="kt_contacts_main">
                <div class="card-body pt-5">
                    <form class="form fv-plugins-bootstrap5 fv-plugins-framework" action="/session/{{ $session->id }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <div class="col">
                                <div class="fv-row mb-4 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label ">
                                        <span class="required">Waktu Open</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="created_at" id="created_at" value="{{ old('created_at', $session->created_at) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            
                            <div class="col">
                                <div class="fv-row mb-4 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label ">
                                        <span class="required">Waktu Closed</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="updated_at" id="updated_at" value="{{ old('updated_at', $session->updated_at) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>  

                        <div class="row">
                            <div class="col-md-3 col-lg-3">
                                <div class="fv-row mb-4 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label">
                                        <span class="required">Rp.500</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="input_500" id="input_500" value="{{ old('input_500', $session->input_500) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="fv-row mb-4 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label">
                                        <span class="required">Rp.1.000</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="input_1000" id="input_1000" value="{{ old('input_1000', $session->input_1000) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="fv-row mb-4 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label">
                                        <span class="required">Rp.500</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="input_500_c" id="input_500_ce" value="{{ old('input_500_c', $session->input_500_c) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="fv-row mb-4 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label">
                                        <span class="required">Rp.1.000</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="input_1000_c" id="input_1000_ce" value="{{ old('input_1000_c', $session->input_1000_c) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>                                              
                        <div class="row">
                            <div class="col-md-3 col-lg-3">
                                <div class="fv-row mb-4 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label">
                                        <span class="required">Rp.2.000</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="input_2000" id="input_2000" value="{{ old('input_2000', $session->input_2000) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="fv-row mb-4 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label">
                                        <span class="required">Rp.5.000</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="input_5000" id="input_5000" value="{{ old('input_5000', $session->input_5000) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="fv-row mb-4 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label">
                                        <span class="required">Rp.2.000</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="input_2000_c" id="input_2000_ce" value="{{ old('input_2000_c', $session->input_2000_c) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="fv-row mb-4 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label">
                                        <span class="required">Rp.5.000</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="input_5000_c" id="input_5000_ce" value="{{ old('input_5000_c', $session->input_5000_c) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-lg-3">
                                <div class="fv-row mb-4 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label">
                                        <span class="required">Rp.10.000</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="input_10000" id="input_10000" value="{{ old('input_10000', $session->input_10000) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="fv-row mb-4 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label">
                                        <span class="required">Rp.20.000</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="input_20000" id="input_20000" value="{{ old('input_20000', $session->input_20000) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="fv-row mb-4 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label">
                                        <span class="required">Rp.10.000</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="input_10000_c" id="input_10000_ce" value="{{ old('input_10000_c', $session->input_10000_c) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="fv-row mb-4 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label">
                                        <span class="required">Rp.20.000</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="input_20000_c" id="input_20000_ce" value="{{ old('input_20000_c', $session->input_20000_c) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-lg-3">
                                <div class="fv-row mb-4 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label">
                                        <span class="required">Rp.50.000</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="input_50000" id="input_50000" value="{{ old('input_50000', $session->input_50000) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="fv-row mb-4 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label">
                                        <span class="required">Rp.100.000</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="input_100000" id="input_100000" value="{{ old('input_100000', $session->input_100000) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="fv-row mb-4 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label">
                                        <span class="required">Rp.50.000</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="input_50000_c" id="input_50000_ce" value="{{ old('input_50000_c', $session->input_50000_c) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="fv-row mb-4 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label">
                                        <span class="required">Rp.100.000</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="input_100000_c" id="input_100000_ce" value="{{ old('input_100000_c', $session->input_100000_c) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <div class="fv-row mb-4 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label ">
                                        <span class="required">Jumlah Open</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="amount_open" id="amount_opene" value="{{ old('amount_open', $session->amount_open) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="fv-row mb-4 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label ">
                                        <span class="required">Jumlah Closed</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="amount_closed" id="amount_closede" value="{{ old('amount_closed', $session->amount_closed) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>                            
                            <div class="col">
                                <div class="fv-row mb-4 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label ">
                                        <span class="required">Selisih</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="gap" id="gape" value="{{ old('gap', $session->gap) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>

                        <div class="fv-row mb-4 fv-plugins-icon-container">
                            <label class="fs-6 fw-semibold form-label ">
                                <span class="required">Keterangan</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" name="information" value="{{ old('information', $session->information) }}">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="separator mb-6"></div>
                        <div class="d-flex justify-content-end">
                            <button type="reset" data-kt-contacts-type="cancel" class="btn btn-light me-3">Batal</button>
                            <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                                <span class="indicator-label">Simpan</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    <div></div></form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Menyimpan nilai awal dari semua input dan amount_open/amount_closed/gap
    var initialInput500 = parseInt("{{ $session->input_500 }}") || 0;
    var initialInput1000 = parseInt("{{ $session->input_1000 }}") || 0;
    var initialInput2000 = parseInt("{{ $session->input_2000 }}") || 0;
    var initialInput5000 = parseInt("{{ $session->input_5000 }}") || 0;
    var initialInput10000 = parseInt("{{ $session->input_10000 }}") || 0;
    var initialInput20000 = parseInt("{{ $session->input_20000 }}") || 0;
    var initialInput50000 = parseInt("{{ $session->input_50000 }}") || 0;
    var initialInput100000 = parseInt("{{ $session->input_100000 }}") || 0;
    var initialAmountOpen = parseInt("{{ $session->amount_open }}") || 0;

    var initialInput500_c = parseInt("{{ $session->input_500_c }}") || 0;
    var initialInput1000_c = parseInt("{{ $session->input_1000_c }}") || 0;
    var initialInput2000_c = parseInt("{{ $session->input_2000_c }}") || 0;
    var initialInput5000_c = parseInt("{{ $session->input_5000_c }}") || 0;
    var initialInput10000_c = parseInt("{{ $session->input_10000_c }}") || 0;
    var initialInput20000_c = parseInt("{{ $session->input_20000_c }}") || 0;
    var initialInput50000_c = parseInt("{{ $session->input_50000_c }}") || 0;
    var initialInput100000_c = parseInt("{{ $session->input_100000_c }}") || 0;
    var initialAmountClosed = parseInt("{{ $session->amount_closed }}") || 0;

    // Fungsi untuk memperbarui nilai amount_open dan gap
    function updateAmountOpen() {
        var input500 = parseInt(document.getElementById('input_500').value) || 0;
        var input1000 = parseInt(document.getElementById('input_1000').value) || 0;
        var input2000 = parseInt(document.getElementById('input_2000').value) || 0;
        var input5000 = parseInt(document.getElementById('input_5000').value) || 0;
        var input10000 = parseInt(document.getElementById('input_10000').value) || 0;
        var input20000 = parseInt(document.getElementById('input_20000').value) || 0;
        var input50000 = parseInt(document.getElementById('input_50000').value) || 0;
        var input100000 = parseInt(document.getElementById('input_100000').value) || 0;

        // Hitung perubahan nilai untuk setiap input
        var difference500 = input500 - initialInput500;
        var difference1000 = input1000 - initialInput1000;
        var difference2000 = input2000 - initialInput2000;
        var difference5000 = input5000 - initialInput5000;
        var difference10000 = input10000 - initialInput10000;
        var difference20000 = input20000 - initialInput20000;
        var difference50000 = input50000 - initialInput50000;
        var difference100000 = input100000 - initialInput100000;

        // Hitung amount_open baru berdasarkan perubahan
        var newAmountOpen = initialAmountOpen
            + (difference500 * 500)
            + (difference1000 * 1000)
            + (difference2000 * 2000)
            + (difference5000 * 5000)
            + (difference10000 * 10000)
            + (difference20000 * 20000)
            + (difference50000 * 50000)
            + (difference100000 * 100000);

        // Perbarui amount_open dengan nilai baru
        document.getElementById('amount_opene').value = newAmountOpen;

        // Simpan nilai baru sebagai nilai awal untuk iterasi berikutnya
        initialInput500 = input500;
        initialInput1000 = input1000;
        initialInput2000 = input2000;
        initialInput5000 = input5000;
        initialInput10000 = input10000;
        initialInput20000 = input20000;
        initialInput50000 = input50000;
        initialInput100000 = input100000;
        initialAmountOpen = newAmountOpen;

        // Update gap
        updateGap();
    }

    // Fungsi untuk memperbarui nilai amount_closed dan gap
    function updateAmountClosed() {
        var input500_c = parseInt(document.getElementById('input_500_ce').value) || 0;
        var input1000_c = parseInt(document.getElementById('input_1000_ce').value) || 0;
        var input2000_c = parseInt(document.getElementById('input_2000_ce').value) || 0;
        var input5000_c = parseInt(document.getElementById('input_5000_ce').value) || 0;
        var input10000_c = parseInt(document.getElementById('input_10000_ce').value) || 0;
        var input20000_c = parseInt(document.getElementById('input_20000_ce').value) || 0;
        var input50000_c = parseInt(document.getElementById('input_50000_ce').value) || 0;
        var input100000_c = parseInt(document.getElementById('input_100000_ce').value) || 0;

        // Hitung perubahan nilai untuk setiap input
        var difference500_c = input500_c - initialInput500_c;
        var difference1000_c = input1000_c - initialInput1000_c;
        var difference2000_c = input2000_c - initialInput2000_c;
        var difference5000_c = input5000_c - initialInput5000_c;
        var difference10000_c = input10000_c - initialInput10000_c;
        var difference20000_c = input20000_c - initialInput20000_c;
        var difference50000_c = input50000_c - initialInput50000_c;
        var difference100000_c = input100000_c - initialInput100000_c;

        // Hitung amount_closed baru berdasarkan perubahan
        var newAmountClosed = initialAmountClosed
            + (difference500_c * 500)
            + (difference1000_c * 1000)
            + (difference2000_c * 2000)
            + (difference5000_c * 5000)
            + (difference10000_c * 10000)
            + (difference20000_c * 20000)
            + (difference50000_c * 50000)
            + (difference100000_c * 100000);

        // Perbarui amount_closed dengan nilai baru
        document.getElementById('amount_closede').value = newAmountClosed;

        // Simpan nilai baru sebagai nilai awal untuk iterasi berikutnya
        initialInput500_c = input500_c;
        initialInput1000_c = input1000_c;
        initialInput2000_c = input2000_c;
        initialInput5000_c = input5000_c;
        initialInput10000_c = input10000_c;
        initialInput20000_c = input20000_c;
        initialInput50000_c = input50000_c;
        initialInput100000_c = input100000_c;
        initialAmountClosed = newAmountClosed;

        // Update gap
        updateGap();
    }

    // Fungsi untuk memperbarui nilai gap
    function updateGap() {
        var amountOpen = parseInt(document.getElementById('amount_opene').value) || 0;
        var amountClosed = parseInt(document.getElementById('amount_closede').value) || 0;

        // Hitung gap
        var gap = amountClosed - amountOpen;

        // Perbarui gap dengan nilai baru
        document.getElementById('gape').value = gap;
    }

    // Tambahkan event listener untuk semua input amount_open
    document.getElementById('input_500').addEventListener('input', updateAmountOpen);
    document.getElementById('input_1000').addEventListener('input', updateAmountOpen);
    document.getElementById('input_2000').addEventListener('input', updateAmountOpen);
    document.getElementById('input_5000').addEventListener('input', updateAmountOpen);
    document.getElementById('input_10000').addEventListener('input', updateAmountOpen);
    document.getElementById('input_20000').addEventListener('input', updateAmountOpen);
    document.getElementById('input_50000').addEventListener('input', updateAmountOpen);
    document.getElementById('input_100000').addEventListener('input', updateAmountOpen);

    // Tambahkan event listener untuk semua input amount_closed
    document.getElementById('input_500_ce').addEventListener('input', updateAmountClosed);
    document.getElementById('input_1000_ce').addEventListener('input', updateAmountClosed);
    document.getElementById('input_2000_ce').addEventListener('input', updateAmountClosed);
    document.getElementById('input_5000_ce').addEventListener('input', updateAmountClosed);
    document.getElementById('input_10000_ce').addEventListener('input', updateAmountClosed);
    document.getElementById('input_20000_ce').addEventListener('input', updateAmountClosed);
    document.getElementById('input_50000_ce').addEventListener('input', updateAmountClosed);
    document.getElementById('input_100000_ce').addEventListener('input', updateAmountClosed);
</script>

@endsection
