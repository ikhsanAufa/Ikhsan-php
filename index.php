<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "data_taruna";

$koneksi   = mysqli_connect($host,$user,$pass,$db);
if(!$koneksi){ //cek koneksi
    die("tidak bisa terkoneksi ke database");
}
$NIT             = "";
$NAMA            = "";
$UMUR            = "";
$JENIS_KELAMIN   = "";   
$sukses          = "";
$error           = "";

if(isset($_POST['simpan'])){
    $NIT                = $_POST['NIT'];
    $NAMA               = $_POST['NAMA'];
    $UMUR               = $_POST['UMUR'];
    $JENIS_KELAMIN      = $_POST['JENIS_KELAMIN'];

    if($NIT && $NAMA && $UMUR && $JENIS_KELAMIN){
        $sql1 = "insert into absensi(NIT,NAMA,UMUR,JENIS_KELAMIN) values ('$NIT','$NAMA','$UMUR','$JENIS_KELAMIN')";
        $q1   = mysqli_query($koneksi,$sql1);
        if($q1){
            $sukses     = "berhasil memasukan data baru";
        }else{
            $error      = "gagal memasukan data baru";
        }
    }else{
        $error = "silahkan masukan data terlebih dahulu";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data.Taruna</title>
    <link rel="stylesheet" href="index.css">
    <style>
        .mx-auto { width: 200px; }
        .card { margin-top: 10px }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous
</head>
<body>
    <div class="mx-auto">
        <!-- untuk memasukan data -->
        <div class="card">
            <div class="card-header bg-warning">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if($error){
                    ?>
                      <div class="alert alert-danger" role="alert">
                            <?php echo $error ?>
                     </div>
                    <?php
                }
                ?>
                 <?php
                if($sukses){
                    ?>
                      <div class="alert alert-success" role="alert">
                            <?php echo $sukses ?>
                     </div>
                    <?php
                }
                ?>
                <form action="" method="POST">
                     <div class="mb-3 row">
                        <label for="NIT" class="col-sm-2 col-form-label">NIT</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="NIT" name="NIT" value="<?php echo $NIT ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                        <label for="NAMA" class="col-sm-2 col-form-label">NAMA</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="NAMA" name="NAMA" value="<?php echo $NAMA ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                        <label for="UMUR" class="col-sm-2 col-form-label">UMUR</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="UMUR" name="UMUR" value="<?php echo $UMUR ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                        <label for="JENIS_KELAMIN" class="col-sm-2 col-form-label">JENIS KELAMIN</label>
                     <div class="col-sm-10">
                        <select class="form-control" name="JENIS_KELAMIN" id="JENIS_KELAMIN">
                            <option value="">PILIH JENIS_KELAMIN</option>
                            <option value="LAKI-LAKI" <?php if($JENIS_KELAMIN == "LAKI_LAKI") echo "selected"?>>LAKI-LAKI</option>
                            <option value="PEREMPUAN" <?php if($JENIS_KELAMIN == "PEREMPUAN") echo "selected"?>>PEREMPUAN</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary"> 
                </div>
                </form>
           </div>
        </div>
