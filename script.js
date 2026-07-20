/*==========================================
        BUKU TAMU DIGITAL
==========================================*/

document.addEventListener("DOMContentLoaded", function () {

    /*==========================================
            TANGGAL OTOMATIS
    ==========================================*/

    const tanggal = document.getElementById("tanggal");

    if (tanggal) {

        const today = new Date();

        const yyyy = today.getFullYear();

        const mm = String(today.getMonth() + 1).padStart(2, "0");

        const dd = String(today.getDate()).padStart(2, "0");

        tanggal.value = `${yyyy}-${mm}-${dd}`;

    }

    /*==========================================
            PREVIEW IDENTITAS
    ==========================================*/

    const upload = document.getElementById("identitas");

    const preview = document.getElementById("previewImage");

    const fileName = document.getElementById("fileName");

    upload.addEventListener("change", function () {

        const file = this.files[0];

        if (!file) return;

        const maxSize = 2 * 1024 * 1024;

        if (file.size > maxSize) {

            Swal.fire({

                icon: "error",

                title: "Ukuran File Terlalu Besar",

                text: "Ukuran maksimal 2 MB."

            });

            upload.value = "";

            preview.style.display = "none";

            fileName.innerHTML = "";

            return;

        }

        fileName.innerHTML = file.name;

        if (file.type.startsWith("image/")) {

            const reader = new FileReader();

            reader.onload = function (e) {

                preview.src = e.target.result;

                preview.style.display = "block";

            }

            reader.readAsDataURL(file);

        }

        else {

            preview.style.display = "none";

        }

    });

    /*==========================================
            SIGNATURE PAD
    ==========================================*/

    const canvas = document.getElementById("signature-pad");

    const signaturePad = new SignaturePad(canvas, {

        backgroundColor: "rgb(255,255,255)",

        penColor: "black"

    });

    /*==========================================
            RESPONSIVE CANVAS
    ==========================================*/

    function resizeCanvas() {

        const ratio = Math.max(window.devicePixelRatio || 1, 1);

        canvas.width = canvas.offsetWidth * ratio;

        canvas.height = canvas.offsetHeight * ratio;

        canvas.getContext("2d").scale(ratio, ratio);

        signaturePad.clear();

    }

    window.addEventListener("resize", resizeCanvas);

    resizeCanvas();
        /*==========================================
            HAPUS TANDA TANGAN
    ==========================================*/

    document
        .getElementById("clearSignature")
        .addEventListener("click", function () {

            signaturePad.clear();

        });

    /*==========================================
            VALIDASI FORM
    ==========================================*/

    const form = document.getElementById("guestForm");

    form.addEventListener("submit", function (e) {

        if (signaturePad.isEmpty()) {

            e.preventDefault();

            Swal.fire({

                icon: "warning",

                title: "Oops...",

                text: "Silakan isi tanda tangan terlebih dahulu."

            });

            return;

        }

        document.getElementById("signature").value =
            signaturePad.toDataURL("image/png");

        Swal.fire({

            icon: "success",

            title: "Sedang Menyimpan...",

            text: "Mohon tunggu sebentar.",

            timer: 1500,

            showConfirmButton: false

        });

    });

    /*==========================================
            HANYA ANGKA
    ==========================================*/

    const telepon = document.querySelector(
        "input[name='telepon']"
    );

    telepon.addEventListener("input", function () {

        this.value = this.value.replace(/[^0-9]/g, "");

    });

});