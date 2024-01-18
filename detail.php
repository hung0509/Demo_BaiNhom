<?

    require "./inc/init.php";

    $conn = require "./inc/db.php";
    if(!isset($_GET['id_film']) && $_GET['id_film'] == false){
        echo "Lỗi!";
    }else{
    $id = $_GET['id_film'];
    $f= new Film();
    
    $result_film = $f->getId($conn, $id);
    }


    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/styledetail.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
    <div id="main_detail">
        <? require  "./inc/header.php"?>

        <!-- Content -->
        <div id="content_detail">
            <img src= <?= $result_film[0]->imagefile?> alt="Hình ảnh">
            <div class="info">
                <h2 class="name_film_detail"><?= $result_film[0]->name_film?></h2>
                <div class="director">Đạo diễn: <?= $result_film[0]->director?></div>
                <div class="professor">Diễn viên: <?= $result_film[0]->performer?></div>
                <div class="category">Thể loại: 
                <?php if ($result_film[0]->id_category == 1):?>
                    <!-- Cần fix lại -->
                    <?= "Phim tình cảm" ?>
                <?php endif;?>
                </div>
                <div class="nation">Quốc gia: 
                <?php if ($result_film[0]->id_nation == 1):?>
                    <!-- Cần fix lại -->
                    <?= "Hàn quốc" ?>
                <?php endif;?>
                </div>
                <div class="status">Trạng thái: <?= $result_film[0]->status?></div> 
                <button name="play" type="button">Xem phim</button>     
           </div>
           <div class="description_container">
            <h3 class="description_namefilm">Tóm tắt nội dung</h3>
                <p class="description"><?= $result_film[0]->description?></p>
           </div>            
        </div>
    </div>
</body>
</html>