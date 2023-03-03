<?php

$GLOBALS['sl'] = 0;
$GLOBALS['tong'] = 0;
function showgiohang(){
  if(isset($_SESSION['mycart'])&&(is_array($_SESSION['mycart']))){
    $tong=0;
    for ($i=0; $i<sizeof($_SESSION['mycart']); $i++){
      $tt=$_SESSION['mycart'][$i][4] * $_SESSION['mycart'][$i][3];
      $tong+=$tt;
      $GLOBALS['sl']++;
      $GLOBALS['tong'] += $tt;
      echo '    
              <tr>
                <td><img src="./view/images/'.$_SESSION['mycart'][$i][2].'" alt="" width="50px"></td>
                <td>'.$_SESSION['mycart'][$i][1].'</td>
                <td>'.$_SESSION['mycart'][$i][3].'</td>
                <td>'.$_SESSION['mycart'][$i][4].'</td>
                <td>'.$tt.'</td>
                <input type="hidden" value="'.$_SESSION['mycart'][$i][0].'" name="idsp[]">
                <input type="hidden" value="'.$_SESSION['mycart'][$i][4].'" name="soluong[]">
                <input type="hidden" value="'.$tt.'" name="tong[]">
              </tr>
            ';
    }

  }
}
?>
<script> 
      document.title = "Đặt Hàng";
      document.title; 
</script>
<div class="container">
      <div class="tree-container mt-4 mb-4">
        <form id="order" action="index.php?act=themdonhang" method="post" class="container">
          <div class="tree-title-list-product">
            <h4 class="title-list-product text-success">Thông tin khách hàng</h4>
          </div>
          <div class=" mt-4 mb-4">
              
                <?php
                  if(isset($_SESSION[''])){
                    $name=$_SESSION['user']['name'];
                    $address=$_SESSION['user']['address'];
                    $email=$_SESSION['user']['email'];
                    $tel=$_SESSION['user']['tel'];
                  }else{
                    $name="";
                    $address="";
                    $email="";
                    $tel="";
                  }
                ?>
                
                
                <div class="row justify-content-center">
                    <div class="col-8 infor-kh">
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Người đặt hàng:</label>
                        <div class="col-sm-9">
                          <input type="text" required name="name" value="<?=$_SESSION['username']?>" class="form-control" id="">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Địa chỉ:</label>
                        <div class="col-sm-9">
                          <input type="text" required name="address" value="<?=$address?>" class="form-control" id="">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Email:</label>
                        <div class="col-sm-9">
                          <input type="email" required name="email" value="<?=$email?>" class="form-control" id="inputEmail3">
                        </div>
                      </div>
                      
                      <div class="form-group row">
                          <label for="" class="col-sm-3 col-form-label">Điện thoại:</label>
                          <div class="col-sm-9">
                            <input type="text" required name="tel" value="<?=$tel?>" class="form-control" id="">
                          </div>
                      </div>
                    </div>
                </div>
                  
          </div>

          <div class="tree-title-list-product">
            <h4 class="title-list-product text-success">Phương thức thanh toán</h4>
          </div>
          <div class="container mt-4 mb-4">
            <div class="row text-center">
              <div class="col">
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" checked type="radio" name="thanhtoan" id="inlineRadio1" value="tienmat">
                      <label class="form-check-label" for="inlineRadio1">Thanh toán tiền mặt</label>
                    </div>
                    
              </div>
              <div class="col">
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" disabled type="radio" name="thanhtoan" id="inlineRadio2" value="app">
                      <label class="form-check-label"  for="inlineRadio2">Thanh toán qua app</label>
                    </div>
              </div>
              <div class="col">
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" disabled type="radio" name="thanhtoan" id="inlineRadio2" value="khac">
                      <label class="form-check-label" for="inlineRadio2">Phương thứ khác</label>
                    </div>
              </div>
              
            </div>
          </div>
          
          <div class="tree-title-list-product">
              <h4 class="title-list-product text-success">Thông tin sản phẩm</h4>
          </div>

          <div id="cart-container" class="my-4 text-center">

              <div class="cart-container__body">
                  <table class="table table-borderless">
                      <thead class="h-table">
                        <tr>
                          <th scope="col">Hình</th>
                          <th scope="col">Tên Sản Phẩm</th>
                          <th scope="col">Đơn Giá</th>
                          <th scope="col">Số Lượng</th>
                          <th scope="col">Thành Tiền</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        showgiohang();

                        ?>
                        
                        
                      </tbody>
                    </table>
              </div>
              <div class="cart-container__footer d-flex justify-content-between px-5">
                  
                  
                  <span>Tổng giá sản phẩm: <span class="prsp price-total"><?= $GLOBALS['tong'] ?>đ</span></span>
              
                  <button type="submit" class="btn btn-success">Đặt Hàng</button>
              </div>
              <!-- <img src="./view/images/giohang.png" alt="">
              <h4 class=" mt-2 text-info font-weight-bold">Giỏ hàng trống</h4> -->
          </div>

        </form>
      
      </div>

      
    </div>
    <script>
      $.validator.setDefaults({
        submitHandler: function () { return true; } 
      });

      $(document).ready(function(){
        $("#order").validate({
          rules: {
            name: "required",
            address: "required",
            tel: {required: true ,minlength:10, maxlength:10},
            email: { required: true, email: true }
          },
          messages: {
            name: "Bạn chưa nhập vào họ của bạn",
            address: "Bạn chưa nhập địa chỉ giao hàng",
            tel: {
              required: "Số điện thoại không hợp lệ",
              minlength: "Số điện thoại phải 10 số",
              maxlength: "Số điện thoại phải 10 số"
            },
            email: "Hộp thư điện tử không hợp lệ"
          },
          errorElement: "div",
          errorPlacement: function (error, element) {
              error.addClass("invalid-feedback");
              if (element.prop("type") === "checkbox"){
                  error.insertAfter(element.siblings("label"));
              } else {
                  error.insertAfter(element);
              }
          },
          highlight: function(element, errorClass, validClass){
              $(element).addClass("is-invalid").removeClass("is-valid");
          },
          unhighlight: function(element, errorClass, validClass){
              $(element).addClass("is-valid").removeClass("is-invalid");
          },
      });
      })
    </script>