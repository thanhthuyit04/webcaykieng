<?php
    if(is_array($dm)){
        extract($dm);
    }
?>
<div class="tree-container">
      <div class="container">
        <div class="tree-box-newproduct">
          <h4>Cập nhật danh mục</h4>
          <form action="index.php?act=updatedm" method="post">
            <div class="form-group">
              <label for="maloai">Mã loại:</label><br>
              <input type="text" name="maloai" disabled>
            </div>
            <div class="form-group">
              <label for="tenloai">Tên loại:</label><br>
              <input type="text" name="tenloai" value="<?php if(isset($name)&&($name!="")) echo $name;?>">
            </div>
            <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id;?>">
            <input type="submit" name="capnhat" id="" value="Cập nhật">
            <input type="reset" name="" id="" value="Hủy">
            <a href="index.php?act=listdm"><input type="button" name="" id="" value="Danh sách"></a>

            <?php
              if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
            ?>

          </form>
        </div>
        
      </div>
      
    </div>