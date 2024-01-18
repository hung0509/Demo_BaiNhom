<?
    require "inc/init.php";

    $conn = require "inc/db.php";
    $f = new Film();
    $result_film = $f->getAll($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="./js/main.js"></script>
    <title>MyProject</title>
</head>
<body>
    <div id="main">
        
    <?require "./inc/header.php";?>
        <div id="content">
            <!-- Phim bộ -->
            <div class="container_type_cineme">
                <div class="name_type">PHIM BỘ MỚI
                    <a href="./login.php">Xem thêm</a>
                </div>

                <?php for ($x = 0;$x < 1; $x++):?>
                    <div class="row">
                    <?php for ($i = 0 + $x*4; $i < 4 + $x*4; $i++):?>
                        <div class="col_4">
                        <a href="./detail.php?id_film=<? echo $result_film[$i]->id_film?>">
                            <img src=<?=$result_film[$i]->imagefile?> alt="Hình ảnh minh họa">
                            <div class="name_film"><?=$result_film[$i]->name_film?></div>
                        </a>
                    </div>
                    <?php endfor;?>
                    <div class="clear"></div>
                    </div>
                <?php endfor;?>
                
        </div>


        <div id="footer"></div>
    </div>
</body>
</html>