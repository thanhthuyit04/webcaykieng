<script> 
      document.title = "Quản Lý Tài Khoản";
      document.title; 
</script>
<div class="tree-container">
      <div class="container">
        <div class="tree-box-newproduct">
          <h4 class="title-list-product text-success">Danh sách tài khoản</h4>
        </div>

        <div class="listtypepro">
            <table class="table">
                <thead class="hh-table">
                  <tr>
                    <th scope="">#</th>
                    <th scope="col">Mã tk</th>
                    <th scope="col">Tên tk</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mật khẩu</th>
                    <th scope="col">Rule</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">SĐT</th>
                    
                    <th scope="col"></th>
                  </tr>
                </thead>

                <tbody class="scroll-h">
                    <?php
                        foreach ($listtaikhoan as $taikhoan) {
                            extract($taikhoan);
                            $suatk="index.php?act=suatk&id=".$id_taikhoan;
                            $xoatk="index.php?act=xoatk&id=".$id_taikhoan;
                            echo '<tr>
                                    <th scope=""><input type="checkbox" name="" id=""></th>
                                    <td>'.$id_taikhoan.'</td>
                                    <td>'.$hoten.'</td>
                                    <td>'.$email.'</td>
                                    <td>'.$matkhau.'</td>
                                    <td>'.$rule.'</td>
                                    <td>'.$address.'</td>
                                    <td>'.$tel.'</td>
                                    
                                    <td><a href="'.$xoatk.'"><input class="d-sp_incart btn btn-success" type="button" value="Xóa"></a></td>
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
        <a href="index.php?act=dskh"><input class="btn btn-info" type="button" name="" id="" value="Thêm mới tài khoản"></a>
      </div>
      
    </div>