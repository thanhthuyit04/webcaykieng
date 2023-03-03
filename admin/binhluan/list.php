<script> 
      document.title = "Quản Lý Bình Luận";
      document.title; 
</script>
<div class="tree-container">
      <div class="container">
        <div class="tree-box-newproduct">
          <h4 class="title-list-product text-success">Danh sách bình luận</h4>
        </div>

        <div class="listtypepro">
            <table class="table">
                <thead class="hh-table">
                  <tr>
                    <th scope="">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nội dung bình luận</th>
                    <th scope="col">IDUSER</th>
                    <th scope="col">IDPRODUCT</th>
                    <th scope="col">Ngày bình luận</th>
                    
                    <th scope="col"></th>
                  </tr>
                </thead>

                <tbody>
                    <?php
                        foreach ($listbinhluan as $binhluan) {
                            extract($binhluan);
                            $xoabl="index.php?act=xoabl&id=".$id;
                            echo '<tr>
                                    <th scope=""><input type="checkbox" name="" id=""></th>
                                    <td>'.$id.'</td>
                                    <td>'.$noidung.'</td>
                                    <td>'.$iduser.'</td>
                                    <td>'.$idpro.'</td>
                                    <td>'.$ngaybinhluan.'</td>
                                    
                                    <td><a href="'.$xoabl.'"><input class="d-sp_incart btn btn-success" type="button" value="Xóa"></a></td>
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
        <!-- <a href="index.php?act=dskh"><input class="btn btn-info" type="button" name="" id="" value="Thêm mới tài khoản"></a> -->
      </div>
      
    </div>