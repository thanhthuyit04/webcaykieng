<script> 
      document.title = "Quản Lý Danh Mục";
      document.title; 
</script>
<div class="tree-container">
      <div class="container">
        <div class="tree-box-newproduct">
          <h4 class="title-list-product text-success">Danh sách danh mục</h4>
        </div>

        <div class="listtypepro">
            <table class="table">
                <thead class="hh-table">
                  <tr>
                    <th scope="">#</th>
                    <th scope="col">Mã loại</th>
                    <th scope="col">Tên loại</th>
                    <th scope="col">Chọn</th>
                  </tr>
                </thead>

                <tbody>
                    <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            $suadm="index.php?act=suadm&id=".$id;
                            $xoadm="index.php?act=xoadm&id=".$id;
                            echo '<tr>
                                    <th scope=""><input type="checkbox" name="" id=""></th>
                                    <td>'.$id.'</td>
                                    <td>'.$name.'</td>
                                    <td><a href="'.$suadm.'"><input class="d-sp_incart btn btn-info" type="button" value="Sửa"></a> | <a href="'.$xoadm.'"><input class="d-sp_incart btn btn-success" type="button" value="Xóa"></a></td>
                                </tr>';
                        }
                    ?>
                  <!--<tr>
                    <th scope="row">1</th>
                    <th scope=""><input type="checkbox" name="" id=""></th>
                    <td>01</td>
                    <td>Cây Phong Thủy</td>
                    <td><input type="button" value="Sửa"> | <input type="button" value="Xóa"></td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <th scope=""><input type="checkbox" name="" id=""></th>
                    <td>02</td>
                    <td>Cây Để Bàn</td>
                    <td><input type="button" value="Sửa"> | <input type="button" value="Xóa"></td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <th scope=""><input type="checkbox" name="" id=""></th>
                    <td>03</td>
                    <td>Cây Thủy Sinh</td>
                    <td><input type="button" value="Sửa"> | <input type="button" value="Xóa"></td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <th scope=""><input type="checkbox" name="" id=""></th>
                    <td>04</td>
                    <td>Cây Tham Khảo</td>
                    <td><input type="button" value="Sửa"> | <input type="button" value="Xóa"></td>
                  </tr>-->
                </tbody>
              </table>
        </div>

        <input type="button" class="btn btn-success" name="" id="" value="Chọn tất cả">
        <input type="reset" class="btn btn-danger" name="" id="" value="Hủy">
        <a href="index.php?act=adddm"><input class="btn btn-info float-right" type="button" name="" id="" value="Thêm mới danh mục"></a>
      </div>
      
    </div>