<script> 
      document.title = "Quên Mật Khẩu";
      document.title; 
</script>
<div class="container">
    <div class="tree-container">
        <div class="tree-box-login">
            <h1 class="title-login bg-success text-white">Quên mật khẩu</h1>
            <form id="form-login" method="post" action="index.php?act=quenmk" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Nhập email">
                </div>
                <input type="submit" class="btn btn-success" name="guiemail" value="Tiếp theo">
            </form>
            <?php
              if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
            ?>
        </div>
    
    </div>
</div>