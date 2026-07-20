<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Guest Book</title>

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- CSS -->

    <link rel="stylesheet"
        href="style.css">

</head>

<body>

<div class="container mt-5 mb-5">

<div class="card shadow-lg border-0">

    <!-- HEADER -->
   <div class="guest-header">

    <div class="header-left">

        <img src="logo.png" class="logo-bpk" alt="Logo BPK">

        <div class="header-info">

            <h4>BPK RI</h4>

            <p>
                PERWAKILAN PROVINSI<br>
                SULAWESI BARAT
            </p>

        </div>

    </div>

    <div class="header-center">

        <h1>GUEST BOOK</h1>

    </div>

</div>

    <!-- BODY -->
    <div class="card-body">

<form
id="guestForm"
action="simpan.php"
method="POST"
enctype="multipart/form-data">
</div> <!-- card-body -->

</div> <!-- card -->


<div class="mb-3">

<label class="form-label">

Tanggal Kunjungan

<span class="text-danger">*</span>

</label>

<input
type="date"
class="form-control"
id="tanggal"
name="tanggal"
required>

</div>

<!-- Nama -->

<div class="mb-3">

<label class="form-label">

Nama

<span class="text-danger">*</span>

</label>

<input
type="text"
class="form-control"
name="nama"
placeholder="Masukkan Nama"
required>

</div>

<!-- Instansi -->

<div class="mb-3">

<label class="form-label">

Asal Instansi

<span class="text-danger">*</span>

</label>

<input
type="text"
class="form-control"
name="instansi"
placeholder="Masukkan Instansi"
required>

</div>

<!-- Email -->

<div class="mb-3">

<label class="form-label">

Alamat Email

</label>

<input
type="email"
class="form-control"
name="email"
placeholder="email@gmail.com">

</div>

<!-- Telepon -->

<div class="mb-3">

<label class="form-label">

No Telepon

<span class="text-danger">*</span>

</label>

<input
type="text"
class="form-control"
name="telepon"
placeholder="08xxxxxxxxxx"
required>

</div>

<!-- Jumlah -->

<div class="mb-3">

<label class="form-label">

Jumlah Tamu

</label>

<input
type="number"
class="form-control"
name="jumlah"
value="1"
min="1">

</div>

<!-- Keperluan -->

<div class="mb-3">

<label class="form-label">

Keperluan

<span class="text-danger">*</span>

</label>

<textarea

class="form-control"

name="keperluan"

rows="4"

required>

</textarea>

</div>

<div class="row">

<div class="col-md-6">

<label class="form-label">

Identitas

</label>

<select

class="form-select"

name="jenis_identitas">

<option>KTP</option>

<option>SIM</option>

<option>ID Card</option>

<option>Tanda Pengenal</option>

</select>

</div>

<div class="col-md-6">

<label class="form-label">

Upload Identitas

</label>

<input

type="file"

class="form-control"

id="identitas"

name="identitas"

accept=".jpg,.jpeg,.png,.pdf"

required>

</div>

</div>

<div class="mt-4">

<h6>

Preview Identitas

</h6>

<div class="preview-box">

<img

id="previewImage"

src=""

style="display:none;">

<p

id="fileName"

class="mt-2">

</p>

</div>

</div>

<!-- ============================
     TANDA TANGAN
============================= -->

<div class="mt-4">

    <label class="form-label fw-bold">

        Paraf / Tanda Tangan

        <span class="text-danger">*</span>

    </label>

    <div class="signature-container">

        <canvas
            id="signature-pad"
            width="900"
            height="220">
        </canvas>

    </div>

    <small class="text-muted">

        Gunakan pen atau sentuh layar untuk menandatangani.

    </small>

    <input
        type="hidden"
        name="signature"
        id="signature">

</div>

<!-- ============================
     BUTTON
============================= -->

<div class="row mt-4">

    <div class="col-md-6 mb-2">

        <button

            type="button"

            id="clearSignature"

            class="btn btn-danger w-100">

            <i class="fa-solid fa-trash"></i>

            Hapus Tanda Tangan

        </button>

    </div>

    <div class="col-md-6 mb-2">

        <button

            type="submit"

            class="btn btn-primary w-100">

            <i class="fa-solid fa-floppy-disk"></i>

            Simpan Data

        </button>

    </div>

</div>

</form>

</div>

</div>

</div>

<!-- ============================
     MODAL BERHASIL
============================= -->

<div

class="modal fade"

id="successModal"

tabindex="-1">

<div class="modal-dialog modal-dialog-centered">

<div class="modal-content">

<div class="modal-header bg-success text-white">

<h5 class="modal-title">

Berhasil

</h5>

</div>

<div class="modal-body">

Data Buku Tamu berhasil disimpan.

</div>

<div class="modal-footer">

<button

class="btn btn-success"

data-bs-dismiss="modal">

OK

</button>

</div>

</div>

</div>

</div>

<!-- Bootstrap -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Signature Pad -->

<script src="https://cdn.jsdelivr.net/npm/signature_pad@5.0.2/dist/signature_pad.umd.min.js"></script>

<!-- Javascript -->

<script src="script.js"></script>

</body>

</html>