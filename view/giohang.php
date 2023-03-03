<?php 
    
    //session_start();
    $user=$_SESSION['username'];

    if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];
    if(isset($_GET['delcart'])) unset($_SESSION['mycart']);
    if(isset($_GET['delid'])&&($_GET['delid']>=0)){
      array_splice($_SESSION['mycart'],$_GET['delid'],1);
    }
    //Lay du lieu tu form
    if(isset($_POST['addcart'])&&($_POST['addcart'])){
      $id=$_POST['id'];
      $name=$_POST['name'];
      $img=$_POST['img'];
      $price=$_POST['price'];
      $soluong=$_POST['soluong'];
      //$ttien=$soluong * $price;
      

      //kiem tra san pham co trong gio hang
      $flag=0;//kiem tra sp trung trong gio hang
      for ($i=0; $i<sizeof($_SESSION['mycart']); $i++){
        if($_SESSION['mycart'][$i][1]==$name){
          $flag=1;
          $soluongnew=$soluong+$_SESSION['mycart'][$i][4];
          $_SESSION['mycart'][$i][4]=$soluongnew;
          break;
        }
      }

      if($flag==0){
         //them moi san pham vao gio hang
        $spadd=[$id,$name,$img,$price,$soluong];
        $_SESSION['mycart'][]=$spadd;
      }

     
      //var_dump($_SESSION['mycart']);
    }

    function showgiohang(){
      if(isset($_SESSION['mycart'])&&(is_array($_SESSION['mycart']))){
        $tong=0;
        for ($i=0; $i<sizeof($_SESSION['mycart']); $i++){
          $tt=$_SESSION['mycart'][$i][4] * $_SESSION['mycart'][$i][3];
          $tong+=$tt;
          echo '<tbody>    
                  <tr>
                    <td>'.($i+1).'</td>
                    <td><img src="./view/images/'.$_SESSION['mycart'][$i][2].'" alt="" width="50px"></td>
                    <td>'.$_SESSION['mycart'][$i][1].'</td>
                    <td>'.$_SESSION['mycart'][$i][3].'</td>
                    <td>'.$_SESSION['mycart'][$i][4].'</td>
                    <td>'.$tt.'</td>
                    <td><a href="index.php?act=giohang&&delid='.$i.'"><input class="d-sp_incart btn btn btn-success" type="submit" value="Xóa"></td></a>
                  </tr>
                  
                </tbody>';
        }
        echo '</table>
              <div class="cart-container__footer d-flex justify-content-between px-5">
              <a href="index.php?act=giohang&&delcart=1" class="d-sp_incart btn btn-success">Xóa giỏ hàng</a>
              <span>Tổng đơn hàng: <span class="prsp price-total">'.$tong.'</span></span>
                <a href="index.php?act=taodonhang" class="btn btn-success">Tiếp theo</a>
            </div>';
      }
    }

?>

<script> 
      document.title = "Giỏ Hàng";
      document.title; 
</script>

<div class="container">
      <div class="">
        <div class="tree-title-list-product">
          <h4 class="title-list-product text-success">Giỏ hàng</h4>
        </div>
  
        <div id="cart-container" class="my-4 text-center">

            <div class="cart-container__body">
                <table class="table table-borderless">
                    <thead class="h-table">
                      <tr>
                        <th scope="col">Chọn</th>
                        
                        <th scope="col">Hình</th>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">Đơn Giá</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Thành Tiền</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <?php
                      if(isset($user)){
                        showgiohang();
                      }else{
                        echo "<script>alert('Bạn chưa đăng nhập!')</script>";
                        echo "<script>window.location='index.php?act=dangnhap';</script>";
                      }
                      //showgiohang();
                    ?>
                    <!--<tbody>    
                      <tr>
                        <td><input type="checkbox" class="check-buy"></td>
                        
                        <td><img src="./view/images/caybachmahoangtu.jpg" alt="" width="50px"></td>
                        <td>Cây cảnh</td>
                        <td>2.000.000đ</td>
                        <td><input type="number" value="0" max="10" min="0" width="100px"></td>
                        <td>2.000.000đ</td>
                        <td><input type="submit" value="Xóa"></td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" class="check-buy"></td>
                        <td><img src="./view/images/caybachmahoangtu.jpg" alt="" width="50px"></td>
                        <td>Cây cảnh</td>
                        <td>2.000.000đ</td>
                        <td><input type="number" value="0" max="10" min="0" width="100px"></td>
                        <td>2.000.000đ</td>
                        <td><input type="submit" value="Xóa"></td>
                      </tr>
                    </tbody>
                  </table>-->
                    
                  
            </div>
            <!--<div class="cart-container__footer d-flex justify-content-between px-5">
                <span><input type="checkbox"> Tất cả</span>
                
                <span>Số lượng (<span class="quantity-item text-danger">1</span>) sản phẩm: <span class="price-total text-danger">2.000.000đ</span></span>
                <a href="index.php?act=taodonhang" class="btn btn-success">Đặt Hàng</a>
            </div>
            <img src="./view/images/giohang.png" alt="">
            <h4 class=" mt-2 text-info font-weight-bold">Giỏ hàng trống</h4> -->
        </div>
        


      </div>
      
      
    </div>
    