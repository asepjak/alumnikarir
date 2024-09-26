<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="tracerstudy.css" />
    <link rel="stylesheet" href="pertanyaan.css" />
    <title>Alumni POLNEP Tracer Study</title>
</head>

<body>
    <div class="container-tracer">
        <form id="tracerStudyForm" action="process.php" method="POST">
            <h1>Kuesioner Tracer Study Alumni</h1>
            <div class="form-group">
                <label for="namaLengkap">Nama Lengkap</label>
                <input type="text" id="namaLengkap" name="namaLengkap" required>
            </div>
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" id="nim" name="nim" required>
            </div>
            <div class="form-group">
                <label for="tanggalLahir">Tanggal Lahir</label>
                <input type="date" id="tanggalLahir" name="tanggalLahir" required>
            </div>
            <div class="form-group">
                <label for="programStudi">Program Studi</label>
                <select id="programStudi" name="programStudi" required>
                    <option value="">Pilih Program Studi</option>
                    <option value="D3 Teknik Listrik">D3 Teknik Listrik</option>
                    <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
                    <option value="D4 Teknologi Rekayasa Sistem Elektronika">D4 Teknologi Rekayasa Sistem Elektronika</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tahunLulus">Tahun Lulus</label>
                <input type="number" id="tahunLulus" name="tahunLulus" min="1900" max="2099" step="1" required>
            </div>

            <!-- New questions start here -->
            <h2>Kuesioner</h2>
            <div class="question">
                <p>1. Apakah Anda Melanjutkan Study saat ini?</p>
                <div class="radio-group">
                    <input type="radio" id="bekerja_ya" name="bekerja" value="Ya" required>
                    <label for="bekerja_ya">Ya</label>
                    <input type="radio" id="bekerja_tidak" name="bekerja" value="Tidak">
                    <label for="bekerja_tidak">Tidak</label>
                </div>
            </div>
            <div class="question">
                <label for="sda">Sumber Daya</label>
                <select id="sda" name="fsda" required>
                    <option value="" selected disabled></option>
                    <option value="parent">Orang Tua</option>
                    <option value="self">Diri Sendiri</option>
                    <option value="beasiswa">Beasiswa</option>
                    <option value="perusahaan">Ditanggung oleh Perusahaan</option>
                    <option value="other">Lainnya</option>
                </select>
            </div>
            <div class="question">
                <label for="perguruanTinggi">Perguruan Tinggi</label>
                <input type="text" id="univ" name="univ">
            </div>
            <div class="question">
                <label for="prodi">Program Studi</label>
                <input type="text" id="prodi" name="prodi">
            </div>
            <div class="radio-group">
                <p>2. Apakah Anda saat ini bekerja?</p>
                <label><input type="radio" name="status" value="1">Bekerja (fulltime / part time)</label>
                <label><input type="radio" name="status" value="2">Wirausaha</label>
                <label><input type="radio" name="status" value="3">Tidak bekerja</label>
            </div>
            <div class="question">
                <p>Jika Tidak, apa alasan utama Anda belum bekerja?</p>
                <label><input type="radio" name="tidak" value="1">Melanjutkan pendidikan</label>
                <label><input type="radio" name="tidak" value="2">Sedang Mencari Pekerjaan</label>
                <label><input type="radio" name="tidak" value="3">Memilih Tidak Bekerja</label>
                <label><input type="radio" name="tidak" value="4">Alasan Kesehatan</label>
            </div>
            <div class="question">
                <p>Jika Ya, Sebutkan nama Perusahaan dan Jabatan Anda saat ini?</p>
                <label for="perusahaan">Nama Perusahaan</label>
                <input type="text" id="perusahaan" name="perusahaan">
            </div>
            <div class="question">
                <label for="jabatan">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan">
            </div>
            <div class="question">
                <label for="first_job">3. Bagaimana Anda mendapatkan pekerjaan pertama setelah lulus?</label>
                <select id="first_job" name="first_job" required>
                    <option value="" selected disabled></option>
                    <option value="job_fair">Melalui job fair</option>
                    <option value="networking">Melalui teman/kerabat</option>
                    <option value="internet">Melalui internet/job portal</option>
                    <option value="internship">Melalui magang</option>
                    <option value="other">Lainnya</option>
                </select>
            </div>
            <div class="question">
                <p>4. Berapa lama waktu yang Anda butuhkan untuk mendapatkan pekerjaan pertama setelah lulus?</p>
                <label><input type="radio" name="waktu" value="1"> &lt; 1 Bulan</label>
                <label><input type="radio" name="waktu" value="2">1 - 3 Bulan</label>
                <label><input type="radio" name="waktu" value="3">3 - 6 Bulan</label>
                <label><input type="radio" name="waktu" value="4">&gt; 6 Bulan</label>
            </div>
            <div class="question">
                <p>5. Apakah pekerjaan Anda saat ini sesuai dengan bidang studi Anda?</p>
                <label><input type="radio" name="soal4" value="1">Sangat Sesuai</label>
                <label><input type="radio" name="soal4" value="2">Sesuai</label>
                <label><input type="radio" name="soal4" value="3">Kurang Sesuai</label>
                <label><input type="radio" name="soal4" value="4">Tidak Sesuai</label>
            </div>
            <div class="question">
                <p>6. Rata-rata pendapatan Anda perbulan</p>
                <label><input type="radio" name="gaji" value="1">&lt; Rp. 2.000.000</label>
                <label><input type="radio" name="gaji" value="2">Rp. 2.000.000 - Rp. 5.000.000</label>
                <label><input type="radio" name="gaji" value="3">Rp. 5.000.000 - Rp. 10.000.000</label>
                <label><input type="radio" name="gaji" value="4">&gt; Rp. 10.000.000</label>
            </div>
            <div class="question">
                <p>7. Keterampilan apa yang Anda peroleh selama studi di Teknik Informatika yang berguna dalam pekerjaan Anda? (Silakan pilih semua yang relevan)</p>
                <label><input type="checkbox" name="skill[]" value="Pemrograman"> Pemrograman (misalnya, Java, Python)</label><br>
                <label><input type="checkbox" name="skill[]" value="Pengembangan web"> Pengembangan web (HTML, CSS, JavaScript)</label><br>
                <label><input type="checkbox" name="skill[]" value="Basis data"> Basis data (SQL, NoSQL)</label><br>
                <label><input type="checkbox" name="skill[]" value="Jaringan komputer"> Jaringan komputer</label><br>
                <label><input type="checkbox" name="skill[]" value="Keamanan siber"> Keamanan siber</label><br>
                <label><input type="checkbox" name="skill[]" value="Analisis data"> Analisis data</label><br>
                <label><input type="checkbox" name="skill[]" value="Pengembangan aplikasi mobile"> Pengembangan aplikasi mobile</label><br>
                <label><input type="checkbox" name="skill[]" value="Lainnya"> Lainnya: <input type="text" name="other-skill" placeholder=""></label><br>
            </div>
            <div class="question">
                <p>8. Apakah ada keterampilan tambahan yang Anda pelajari setelah lulus yang berguna dalam pekerjaan Anda?</p>
                <label><input type="radio" name="soal5" value="1">Ya</label>
                <label><input type="radio" name="soal5" value="2">Tidak</label>
                <label for="tambahan">Jika Ya, sebutkan:</label>
                <input type="text" id="tambahan" name="tambahan">
            </div>
            <div class="question">
                <p>9. Seberapa sering Anda menggunakan keterampilan yang Anda peroleh selama studi di Teknik Informatika dalam pekerjaan Anda saat ini?</p>
                <label><input type="radio" name="soal6" value="1">Setiap hari</label>
                <label><input type="radio" name="soal6" value="2">Beberapa kali seminggu</label>
                <label><input type="radio" name="soal6" value="3">Beberapa kali sebulan</label>
                <label><input type="radio" name="soal6" value="4">Jarang sekali</label>
            </div>
            <div class="question">
                <label for="opini">10. Bagaimana pendapat Anda mengenai relevansi kurikulum yang diajarkan dengan kebutuhan dunia kerja?</label>
                <textarea id="opini" name="opini"></textarea>
            </div>
            <div class="button-container">
                <button type="submit">Kirim</button>
            </div>
        </form>
    </div>

    <script src="tracer.js"></script>
</body>

</html>