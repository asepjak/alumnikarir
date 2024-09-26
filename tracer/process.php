<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tracer";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $sql = "INSERT INTO alumni_data (nama_lengkap, nim, tanggal_lahir, program_studi, tahun_lulus, 
            bekerja, fsda, univ, prodi, status, alasan_tidak_bekerja, perusahaan, jabatan, 
            first_job, waktu, kesesuaian, gaji, skill, keterampilan_tambahan, frekuensi_skill, opini) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    // Check if prepare() succeeded
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ssssissssssssssssssss", 
        $namaLengkap, $nim, $tanggalLahir, $programStudi, $tahunLulus,
        $bekerja, $fsda, $univ, $prodi, $status, $alasanTidakBekerja,
        $perusahaan, $jabatan, $firstJob, $waktu, $kesesuaian, $gaji,
        $skill, $keterampilanTambahan, $frekuensiSkill, $opini
    );

    // Set parameters
    $namaLengkap = $_POST['namaLengkap'];
    $nim = $_POST['nim'];
    $tanggalLahir = $_POST['tanggalLahir'];
    $programStudi = $_POST['programStudi'];
    $tahunLulus = $_POST['tahunLulus'];
    $bekerja = $_POST['bekerja'] ?? '';
    $fsda = $_POST['fsda'] ?? '';
    $univ = $_POST['univ'] ?? '';
    $prodi = $_POST['prodi'] ?? '';
    $status = $_POST['status'] ?? '';
    $alasanTidakBekerja = $_POST['tidak'] ?? '';
    $perusahaan = $_POST['perusahaan'] ?? '';
    $jabatan = $_POST['jabatan'] ?? '';
    $firstJob = $_POST['first_job'] ?? '';
    $waktu = $_POST['waktu'] ?? '';
    $kesesuaian = $_POST['soal4'] ?? '';
    $gaji = $_POST['gaji'] ?? '';
    $skill = implode(", ", $_POST['skill'] ?? []);
    $keterampilanTambahan = $_POST['tambahan'] ?? '';
    $frekuensiSkill = $_POST['soal6'] ?? '';
    $opini = $_POST['opini'] ?? '';

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>