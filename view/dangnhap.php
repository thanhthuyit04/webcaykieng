<script> 
      document.title = "Đăng Nhập";
      document.title; 
</script>
<div class="container">
    <div class="tree-container">
        <div class="tree-box-login">
            <h1 class="title-login bg-success text-white">Đăng nhập</h1>
            <form id="form-login" method="post" action="index.php?act=login" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Nhập email">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Ghi nhớ tài khoản</label>
                </div>
                <button type="submit" class="btn btn-success">Đăng nhập</button>
                <a href="index.php?act=quenmk" class="float-right  ">Quên mật khẩu</a>
            </form>
        </div>
    
    </div>
</div>
<script>
      
    $.validator.setDefaults({
        submitHandler: function () { return true; }
        
    });

    $(document).ready(function () {
        $("#form-login").validate({
            rules: {
                password: { required: true, minlength: 5 },
                email: { required: true, email: true }
            },
            messages: {
                password: {
                    required: "Bạn chưa nhập mật khẩu",
                    minlength: "Mật khẩu phải có ít nhất 5 ký tự"
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