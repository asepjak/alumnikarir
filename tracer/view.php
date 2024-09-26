<?php
// Start the session
session_start();

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
$sql = "SELECT * FROM alumni_data";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    echo "<h1>Data Alumni Tracer Study</h1>";
    echo "<table border='1'>
            <tr>
                <th>Nama Lengkap</th>
                <th>NIM</th>
                <th>Tanggal Lahir</th>
                <th>Program Studi</th>
                <th>Tahun Lulus</th>
                <th>Bekerja</th>
                <th>Sumber Daya</th>
                <th>Perguruan Tinggi</th>
                <th>Program Studi Lanjut</th>
                <th>Status</th>
                <th>Alasan Tidak Bekerja</th>
                <th>Perusahaan</th>
                <th>Jabatan</th>
                <th>Pekerjaan Pertama</th>
                <th>Waktu Mencari Pekerjaan</th>
                <th>Kesesuaian Pekerjaan</th>
                <th>Gaji</th>
                <th>Keterampilan</th>
                <th>Keterampilan Tambahan</th>
                <th>Frekuensi Skill</th>
                <th>Opini</th>
            </tr>";
    
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['nama_lengkap']}</td>
                <td>{$row['nim']}</td>
                <td>{$row['tanggal_lahir']}</td>
                <td>{$row['program_studi']}</td>
                <td>{$row['tahun_lulus']}</td>
                <td>{$row['bekerja']}</td>
                <td>{$row['fsda']}</td>
                <td>{$row['univ']}</td>
                <td>{$row['prodi']}</td>
                <td>{$row['status']}</td>
                <td>{$row['alasan_tidak_bekerja']}</td>
                <td>{$row['perusahaan']}</td>
                <td>{$row['jabatan']}</td>
                <td>{$row['first_job']}</td>
                <td>{$row['waktu']}</td>
                <td>{$row['kesesuaian']}</td>
                <td>{$row['gaji']}</td>
                <td>{$row['skill']}</td>
                <td>{$row['keterampilan_tambahan']}</td>
                <td>{$row['frekuensi_skill']}</td>
                <td>{$row['opini']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>