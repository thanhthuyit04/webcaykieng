<?php
    session_start();
    include "../../model/pdo.php";
    include "../../model/binhluan.php";
    //echo $_SESSION['id_user'];
    $idpro=$_REQUEST['idpro'];

    $dsbl=loadall_binhluan($idpro);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php
        foreach($dsbl as $bl) {
            extract($bl);
            echo '
                <div class="p-2 cmt-box">
                <div class="row user-box">
        
                    <div class="">
                        <div class="user-shape">
                            <i class="icon fa-solid fa-user"></i>
                        </div>
                    </div>
        
                    <div class="user-title m-2">
                        '.$_SESSION['username'].'
                    </div>
        
                    <div class="col text-muted text-right m-2">
                        '.$ngaybinhluan.'
                    </div>
        
                </div>
        
                <div class="row cmt-user">
                    <div class="col cmt-content">'.$noidung.'</div>
                    <div class="col cmt-rep text-right">
                        <a href="">Trả lời</a>    
                    </div>
                </div>
            </div><hr>
            ';
        }

        

    ?>
    
    <div class="row p-2">
        <div class="col-5 tree-guibinhluan">
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                <input type="hidden" name="idpro" value="<?=$idpro?>">
                <input type="text" name="noidung" placeholder="Nội dung bình luận">
                <input type="submit" name="guibinhluan" class="btn btn-success" value="Gửi">
            </form>
        </div>
    </div>
    <?php
        if(isset($_POST['guibinhluan'])&&($_POST['guibinhluan'])){
            $noidung=$_POST['noidung'];
            $idpro=$_POST['idpro'];
            $iduser=$_SESSION['id_user'];
            $ngaybinhluan=date('h:i:sa d/m/Y');
            insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan);
            header("Location: ".$_SERVER['HTTP_REFERER']);
        } 
    ?>
</body>
</html>