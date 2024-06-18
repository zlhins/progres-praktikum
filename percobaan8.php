<?php
    //membuat variable
    // $nama_mahasiswa = "Ariel Tatum";
    // $nama_kamu = "Andi";

    // if($nama_mahasiswa == "Ariel Tatum"){
    //     $jenis_kelamin = "Perempuan";
    // }else if($nama_mahasiswa == "Andi"){
    //     $jenis_kelamin = "Laki - Laki";
    // }else{
    //     $jenis_kelamin = "??";
    // }

    // echo "Hello ".$nama_mahasiswa." Selamat <br> datang, saya ".$nama_kamu." Jenis kelamin kamu adalah ".$jenis_kelamin;
    // $var1 = $_POST['inputan_pertama'];
    // $var1 = $_GET['inputan_pertama'];
    // echo $var1;
    include "koneksi.php";
    //mengambil data inputan
        $nama_mhs = $_POST['nama']; 
        $prodi_mhs = $_POST['prodi']; 
        $perulangan = $_POST['ulangi'];


        $proses = mysqli_query($koneksi, "INSERT INTO mahasiswa (nama_mahasiswa, prodi) VALUES ('$nama_mhs', '$prodi_mhs')")
        or die (mysqli_error($koneksi));

        if($proses){
            echo "
                <script>
                    alert('Data Berhasil Disimpan')
                    window.location.href='index.php';
                </script>";
        }else echo "
                <script>
                    alert('Data Gagal Disimpan')
                    window.location.href='index.php';
                </script>";

        $search = $_POST['angka'];
        $var = "/^[0-9]*$/";
        if(!preg_match($var,$search)){
        echo "Data tidak sesuai ketentuan, masukan hanya Angka  saja";
        }
        else echo "Input kamu benar";

    // if($nilai_mhs != ""){

    //     if($nilai_mhs >= 85){
    //         $huruf_mutu = 'A';
    //     }else if($nilai_mhs >= 75){
    //         $huruf_mutu = 'B';
    //     }else if($nilai_mhs >= 65){
    //         $huruf_mutu = 'C';
    //     }else{
    //         $huruf_mutu = 'E';
    //     }

    //     for($x = 0; $x <= $perulangan; $x++){
    //         // echo "<script>alert('" .$npm_mhs." Nilai mata kuliah anda adalah : ".$huruf_mutu."')</script>";
    //         echo $npm_mhs." Nilai mata kuliah anda adalah : ".$huruf_mutu."<br>";
    //     }
    // }
?>