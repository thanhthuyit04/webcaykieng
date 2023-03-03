<script> 
      document.title = "Đăng Ký";
      document.title; 
</script>
<div class="container">
        <div class="tree-container">
            <div class="tree-box-login">
                <h1 class="title-login bg-success text-white">Đăng ký</h1>
                <form id="form-register" method="post" action="index.php?act=dktk" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="namelogin">Tên người dùng:</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên người dùng">
                      </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email:</label>
                      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Nhập email đăng ký">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Mật khẩu:</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputRePassword
                        
                        m-control" name="confirm" id="confirm" placeholder="Nhập lại mật khẩu">
                      </div>
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Ghi nhớ tài khoản</label>
                    </div>
                    <button type="submit" class="btn btn-success">Đăng ký</button>
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