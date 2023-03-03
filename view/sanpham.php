<script> 
      document.title = "Sản Phẩm";
      document.title; 
</script>
<div class="container">
    <div class="tree-container ">

            <div class="tree-title-list-product">
            <h4 class="title-list-product text-success">Sản phẩm</h4>
            
            </div>
            <div class="container">
            <div class="row">
                <?php
                foreach($dssp as $sp){
                    extract($sp);
                    $linksp="index.php?act=sanphamct&idsp=".$id;
                    $hinh=$img_path.$img;

                    echo '<div class="col-sm-3 mt-2">
                            <a href="'.$linksp.'"><img class="imgsp" src="'.$hinh.'" alt=""></a>
                            <div class="insp text-center">
                              <p class="prsp">$'.$price.'</p>
                              <a class="nasp" href="'.$linksp.'">'.$name.'</a>
                              <div class="frsp">
                                <form action="index.php?act=giohang" method="post">
                                  <input type="hidden" name="id" value="'.$id.'">
                                  <input type="hidden" name="name" value="'.$name.'">
                                  <input type="hidden" name="img" value="'.$img.'">
                                  <input type="hidden" name="price" value="'.$price.'">
                                  <input type="number" name="soluong" min="1" max="10" value="1">
                                  <input class=" subsp btn btn-success" type="submit" name="addcart" value="Thêm">
                                </form>
                              </div>
                            </div>
                          </div>';  
                        
                    }
                ?>


            </div>
            </div>
            
        </div>
</div>