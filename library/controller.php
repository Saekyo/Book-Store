<?php

class controller{

    function login($con, $tabel, $username, $password, $akses)
    {
        $sql = "SELECT * FROM tbl_user WHERE username = '$username' and password = '$password' ";
        $jalan = mysqli_query($con, $sql);
        $cek = mysqli_num_rows($jalan);
        $data = mysqli_fetch_array($jalan);
        // if ($cek > 0) {
        //     echo "<script>alert('Selamat Datang $username');document.location.href='$redirect'</script>";
        // } else {
        //     echo "<script>alert('Gagal login. Cek username & password !!');document.location.href=''</script>";
        // }

        if ($cek === 1) {
            if ($data['akses'] == 'Admin') {
                $_SESSION['akses'] = $akses;
                $_SESSION['username'] = $username;
                echo "<script>alert('Selamat datang $username');document.location.href='dashboard.php'</script>";
            }
            elseif ($data['akses'] == 'Manager') {
                $_SESSION['akses'] = $akses;
                $_SESSION['username'] = $username;
                echo "<script>alert('Selamat datang $username');document.location.href='manager.php'</script>";
            }
            elseif ($data['akses'] == 'Kasir') {
                $_SESSION['akses'] = $akses;
                $_SESSION['username'] = $username;
                echo "<script>alert('Selamat datang $username');document.location.href='kasir.php'</script>";
            }
            else {
                echo "<script>alert('Gagal login. Cek username & password !');document.location.href='index.php'</script>";
            }
        }
    }

    function simpan($con, $tabel, array $field, $redirect){
        $sql = "INSERT into $tabel SET ";
    
        foreach($field as $key => $value){
            $sql.=" $key = '$value',";
        }
        
        $sql = rtrim($sql, ',');

        $jalan = mysqli_query($con, $sql);
        if($jalan){
            echo "<script>alert('Berhasil disimpan');document.location.href='$redirect'</script>";
        }else{
            echo "<script>alert('Gagal disimpan');document.location.href='$redirect'</script>";
        }
    }

    function tampil($con, $tabel){
        $sql = "SELECT * FROM $tabel";
        $jalan = mysqli_query($con, $sql);
        while($data = mysqli_fetch_assoc($jalan))
            $sisi[] = $data;
            return @$sisi; 
    }

    function hapus($con, $tabel, $where, $redirect){
        $sql = "DELETE FROM $tabel WHERE $where";
        $jalan = mysqli_query($con, $sql);
        if($jalan){
            echo "<script>alert('Berhasil dihapus');document.location.href='$redirect'</script>";
        }else{
            echo "<script>alert('Gagal dihapus');document.location.href='$redirect'</script>";
        }
    }

    function edit($con, $tabel, $where){
        $sql = "SELECT * FROM $tabel WHERE $where";
        $jalan = mysqli_query($con, $sql);
        $tampung = mysqli_fetch_assoc($jalan);
        return $tampung;
    }

    function ubah($con, $tabel, array $field, $where, $redirect){
        $sql = "UPDATE $tabel SET ";
        foreach($field as $key => $value){
            $sql.=" $key = '$value',";
        }
        $sql = rtrim($sql,',');
        $sql.= " WHERE $where";

        $jalan = mysqli_query($con, $sql);

        if($jalan){
            echo "<script>alert('Berhasil diubah');document.location.href='$redirect'</script>";
        }else{
            echo "<script>alert('Gagal diubah');document.location.href='$redirect'</script>";
        }
    }

    function upload($foto, $tempat){
        $alamat = $foto['tmp_name'];
        $namafile = $foto['name'];
        move_uploaded_file($alamat, "$tempat/$namafile");
        return $namafile;
    }

}

?>