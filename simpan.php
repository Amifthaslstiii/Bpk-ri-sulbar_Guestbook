<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi.php";

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tanggal          = $_POST['tanggal'];
    $nama             = $_POST['nama'];
    $instansi         = $_POST['instansi'];
    $email            = $_POST['email'];
    $telepon          = $_POST['telepon'];
    $jumlah_tamu      = $_POST['jumlah'];
    $keperluan        = $_POST['keperluan'];
    $jenis_identitas  = $_POST['jenis_identitas'];
    $tanda_tangan     = $_POST['signature'];

    $folder = "uploads/";

    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    if ($_FILES['identitas']['error'] == 0) {

        $namaFile = time() . "_" . basename($_FILES["identitas"]["name"]);
        $tujuan   = $folder . $namaFile;

        if (move_uploaded_file($_FILES["identitas"]["tmp_name"], $tujuan)) {

            $sql = "INSERT INTO tamu
            (
                tanggal,
                nama,
                instansi,
                email,
                telepon,
                jumlah_tamu,
                keperluan,
                jenis_identitas,
                file_identitas,
                tanda_tangan
            )
            VALUES
            (
                '$tanggal',
                '$nama',
                '$instansi',
                '$email',
                '$telepon',
                '$jumlah_tamu',
                '$keperluan',
                '$jenis_identitas',
                '$namaFile',
                '$tanda_tangan'
            )";

            if (mysqli_query($conn, $sql)) {

                /*=========================================
                    SIMPAN KE FILE EXCEL
                =========================================*/

                $folderExcel = __DIR__ . DIRECTORY_SEPARATOR . "excel";

                if (!is_dir($folderExcel)) {
                    mkdir($folderExcel, 0777, true);
                }

                $fileExcel = $folderExcel . DIRECTORY_SEPARATOR . "buku_tamu.xlsx";

                if (file_exists($fileExcel)) {

                    $spreadsheet = IOFactory::load($fileExcel);

                } else {

                    $spreadsheet = new Spreadsheet();

                    $sheet = $spreadsheet->getActiveSheet();

                    $sheet->setCellValue('A1', 'Tanggal');
                    $sheet->setCellValue('B1', 'Nama');
                    $sheet->setCellValue('C1', 'Instansi');
                    $sheet->setCellValue('D1', 'Email');
                    $sheet->setCellValue('E1', 'Telepon');
                    $sheet->setCellValue('F1', 'Jumlah Tamu');
                    $sheet->setCellValue('G1', 'Keperluan');
                    $sheet->setCellValue('H1', 'Jenis Identitas');
                    $sheet->setCellValue('I1', 'File Identitas');
                    $sheet->setCellValue('J1', 'Tanggal Input');

                }

                $sheet = $spreadsheet->getActiveSheet();

                $baris = $sheet->getHighestRow() + 1;

                $sheet->setCellValue('A'.$baris, $tanggal);
                $sheet->setCellValue('B'.$baris, $nama);
                $sheet->setCellValue('C'.$baris, $instansi);
                $sheet->setCellValue('D'.$baris, $email);
                $sheet->setCellValue('E'.$baris, $telepon);
                $sheet->setCellValue('F'.$baris, $jumlah_tamu);
                $sheet->setCellValue('G'.$baris, $keperluan);
                $sheet->setCellValue('H'.$baris, $jenis_identitas);
                $sheet->setCellValue('I'.$baris, $namaFile);
                $sheet->setCellValue('J'.$baris, date("d-m-Y H:i:s"));

                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save($fileExcel);

                /*=========================================
                    BERHASIL
                =========================================*/

                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>

                <script>

                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data tamu berhasil disimpan!',
                    confirmButtonColor:'#fdb10d'
                }).then(() => {
                    window.location='index.php';
                });

                </script>
                ";

                exit;

            } else {

                die("Error MySQL : " . mysqli_error($conn));

            }

        } else {

            die("Upload file identitas gagal.");

        }

    } else {

        die("File identitas belum dipilih.");

    }

} else {

    header("Location:index.php");
    exit;

}
?>