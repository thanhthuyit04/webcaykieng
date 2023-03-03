<script> 
      document.title = "<?=$name?>";
      document.title; 
</script>
<div class="container">
      

      <div class="tree-container mt-4 mb-4">
        <?php
          extract($onesp);
        ?>
        <div class="tree-title-list-product">
          <h4 class="title-list-product text-success"><?=$name?></h4>
        </div>
        <div class="row m-4">
          <div class="col-sm-6">
            <?php
              $img=$img_path.$img;
              echo '<img class="imgsp" src="'.$img.'"><br>';
            ?>
          </div>
          <div class="col-sm-6 detail_sp">
            <?php
              echo '<div class="prsp">'.$price.'</div>';
              echo '<div class="dessp"><b>Mô tả:</b> '.$mota.'</div>
              <div class="frsp">
              <form action="index.php?act=giohang" method="post">
                <input type="hidden" name="id" value="'.$id.'">
                <input type="hidden" name="name" value="'.$name.'">
                <input type="hidden" name="img" value="'.$img.'">
                <input type="hidden" name="price" value="'.$price.'">
                <input type="number" name="soluong" min="1" max="10" value="1">
                <input class="subsp btn btn-success" type="submit" name="addcart" value="Thêm vào giỏ hàng">
              </form>
              </div>
              ';

            ?>
          </div>
        </div>

        <script>
          src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
        </script> 

        <script>
          $(document).ready(function(){
              $("#binhluan").load("view/binhluan/binhluanform.php", {idpro: <?=$id?>});
          });
        </script>

        <div class="tree-title-list-product">
          <h4 class="title-list-product text-success">Bình luận</h4>
        </div>
        <div class="container" id="binhluan">
    
        </div>

        

        <div class="tree-title-list-product">
          <h4 class="title-list-product text-success">Sản phẩm cùng loại</h4>
        </div>

        <div class="container">
          <div class="row">
            <?php
              foreach($sp_cungloai as $sp_cungloai){
                extract($sp_cungloai);
                $linksp="index.php?act=sanphamct&idsp=".$id;
                $hinh=$img_path.$img;
                echo '<div class="col-sm-3 mt-2">
                        <a href="'.$linksp.'"><img class="imgsp" src="'.$hinh.'" alt=""></a>
                        <div class="insp text-center" >
                          <p class="prsp">$'.$price.'</p>
                          <a class="nasp" href="'.$linksp.'">'.$name.'</a>
                        </div>
                      </div>';;
              }
            ?>
          </div>
        </div>
        
      </div>
</div>