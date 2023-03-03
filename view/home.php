<div class="container">

<!--Phần slide-->
  <div class="tree-slide">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="view/images/slide2.jpg" class="d-block w-100 img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="view/images/slide2.jpg" class="d-block w-100 img-fluid" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </button>
    </div>
  </div>

      <div class="tree-container mt-4 mb-4">

        <div class="tree-title-list-product">
          <h4 class="title-list-product text-success">Giới thiệu</h4>
        </div>
        <div class="media mt-4 mb-4">
          <div class="treelogo_body">
            <a href="index.php?act=gioithieu"><img src="view/images/greengarden.png" class="mr-3 " alt="..." width="150" height="150"></a>
          </div>
          
          <div class="tree-in_body media-body">
            <h5 class="mt-0 text-success">Web cây kiểng</h5>
            <p><b>GREEN GARDEN</b> chuyên cung cấp các loại cây kiểng giá rẻ, đẹp. Đến với <b>GREEN GARDEN</b> khách hàng có thể lựa chọn bất kỳ loại cây nào với giá rẻ vô cùng, không cần phải đến tận nơi mà vẫn có thể mua được.</p>
          </div>
        </div>

        <div class="tree-title-list-product">
          <h4 class="title-list-product text-success">Sản phẩm mới nhất</h4>
        </div>
        <div class="container">
          <div class="row">
            <?php
              foreach($spnew as $sp){
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
                            <input class="subsp btn btn-success" type="submit" name="addcart" value="Thêm">
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
