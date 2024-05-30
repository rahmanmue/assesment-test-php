<?php
// Koneksi ke database
$mysqli = new mysqli("localhost", "root", "", "asah_otak");

// Cek koneksi
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Memilih kata secara acak dari tabel master_kata
$query = "SELECT * FROM master_kata ORDER BY RAND() LIMIT 1";
$result = $mysqli->query($query);
$row = $result->fetch_assoc();

$kata = $row['kata'];
$clue = $row['clue'];

$length = strlen($kata);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Permainan Asah Otak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .form-control{
            width: 40px;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h2 class="text-center"><?php echo $clue; ?></h2>
        <form method="post">
            <div class="d-flex gap-2 justify-content-center align-items-center my-3">
                <input type="hidden" value="<?php echo $kata; ?>" name="kata">   
                <?php
                
                for ($i = 0; $i < $length; $i++) {
                    $char = $kata[$i];
                    if ($i == 2 || $i == 6) {
                        echo "<input type='text' class='form-control' name='char$i' value='$char' readonly disabled> ";
                    } else {
                        echo "<input type='text' class='form-control' name='char$i'> ";
                    }
                }
                ?>
            
        </div>
        <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-primary w-25" name="submit" value="Jawab">
        </div>
        </form>
    
    </div>
   
    <div class="container">
        <?php
        if (isset($_POST['submit'])) {
            $total_point = 0;
            $kata = $_POST['kata'];
            $len = strlen($kata);
            for ($i = 0; $i < $len; $i++) {
                $input_char = $_POST["char$i"];

                if($i == 2 || $i == 6){
                   continue;
                }

                if ($input_char == $kata[$i]) {
                    $total_point += 10;
                } else {
                    $total_point -= 2;
                }

        
            }
           
            echo "<h5 class='text-center'>Poin yang anda dapat adalah </h5> 
            <h2 class='text-success text-center fw-bold'>$total_point</h2>";
        ?>
    
        <div class="d-flex justify-content-center">
            <form method="post" id="point">
                <input type="hidden" name="final_score" value="<?php echo $total_point; ?>">
                <input type="hidden" name="nama_user" id="nama_user" value="Anonymous">
                <input type="submit" class="btn btn-success" name="save" onclick="simpanPoint()" value="Simpan Poin">
                <input type="submit" class="btn btn-warning" name="retry" value="Ulangi">
            </form>
        </div>
    
        <?php
        }

        if (isset($_POST['save'])) {
            $nama_user = $_POST['nama_user']; 
            $total_point = $_POST['final_score'];
            $tanggal = date("Y-m-d");
            $waktu_selesai = date("H:i:s");

            $stmt = $mysqli->prepare("INSERT INTO point_game (nama_user, total_point, tanggal, waktu_selesai) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("siss", $nama_user, $total_point, $tanggal, $waktu_selesai);
            $stmt->execute();
            $stmt->close();

            echo "<script>alert('Poin anda berhasil disimpan!'); window.location.replace();</script>";
        }

        if (isset($_POST['retry'])) {
            echo "<script>window.location.replace();</script>";
        }

        $mysqli->close();
        ?>
     </div>

    <script>
        function simpanPoint(){
            let nama_user = prompt("Masukan nama Anda :");
            if(nama_user != null && nama_user != ''){
                const form = document.getElementById('point');
                const inputName = document.getElementById('nama_user');
                inputName.value = nama_user;
                form.submit();
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



</body>
</html>
