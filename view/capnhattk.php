<script> 
      document.title = "Cập Nhật Tài Khoản";
      document.title; 
</script>
<div class="container">
        <div class="tree-container">
            <div class="tree-box-login">
                <h1 class="title-login bg-success text-white">Cập Nhật Tài Khoản</h1>

                <?php
                    if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                        extract($_SESSION['user']);
                        // $user = $_SESSION['user'];
                    }
                    if(isset($_SESSION['id_user'])){
                        $id_user= $_SESSION['id_user'];
                    }
                ?>

                <form id="form-register" method="post" action="index.php?act=capnhattk&id=<?=$id_user?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="namelogin">Tên người dùng:</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?=$hoten?>">
                      </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email:</label>
                      <input type="email" class="form-control" id="email" name="email" value="<?=$email?>" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Địa chỉ:</label>
                      <input type="text" class="form-control" name="address" value="<?=$address?>" id="" placeholder="Địa chỉ">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Điện thoại:</label>
                      <input type="text" class="form-control" name="tel" value="<?=$tel?>" id="" placeholder="Số điện thoại">
                    </div>
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Ghi nhớ tài khoản</label>
                    </div>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="submit" value="Cập nhật" name="capnhat" class="btn btn-success">
                        <?php if($rule=='admin'){ ?>
                            <a href="admin/index.php?act=dskh" class="float-right">Admin</a>
                        <?php }?>
                  </form>
            </div>

        
        </div>
    </div>
    <script>
      
      $.validator.setDefaults({
          submitHandler: function () { return true; }
          
      });

      $(document).ready(function () {
          $("#form-register").validate({
              rules: {
                  username: "required",
                  username: { required: true, minlength: 2 },
                  password: { required: true, minlength: 5 },
                  confirm: { required: true, minlength: 5, equalTo: "#password"},
                  email: { required: true, email: true }
              },
              messages: {
                  fullname: "Bạn chưa nhập vào họ của bạn",
                  username: {
                      required: "Bạn chưa nhập vào tên đăng nhập",
                      minlength: "Tên đăng nhập phải có ít nhất 2 ký tự"
                  },
                  password: {
                      required: "Bạn chưa nhập mật khẩu",
                      minlength: "Mật khẩu phải có ít nhất 5 ký tự"
                  },
                  confirm_password: {
                      required: "Bạn chưa nhập mật khẩu",
                      minlength: "Mật khẩu phải có ít nhất 5 ký tự",
                      equalTo: "Mật khẩu không trùng khớp với mật khẩu đã nhập"
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
          
      });
    </script>