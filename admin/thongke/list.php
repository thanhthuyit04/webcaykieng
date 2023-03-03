<script> 
      document.title = "Thống Kê Sản Phẩm";
      document.title; 
</script>
<div class="tree-container">
      <div class="container">
        <div class="tree-box-newproduct">
          <h4 class="title-list-product text-success">Thống kê sản phẩm theo danh mục</h4>
        </div>

        <div class="listtypepro">
            <table class="table">
                <thead class="hh-table">
                  <tr>
                    <th scope="col">IDDM</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Số lượng sản phẩm</th>
                    <th scope="col">Giá nhỏ nhất</th>
                    <th scope="col">Giá lớn nhất</th>
                    <th scope="col">Giá trung bình</th>
                  </tr>
                </thead>

                <tbody>
                    <?php
                        foreach ($listthongke as $thongke) {
                            extract($thongke);
                            echo '<tr>
                                    
                                    <td>'.$madm.'</td>
                                    <td>'.$tendm.'</td>
                                    <td>'.$countsp.'</td>
                                    <td>'.$minprice.'</td>
                                    <td>'.$maxprice.'</td>
                                    <td>'.$avgprice.'</td>
                                </tr>';
                        }
                    ?>
                </tbody>
              </table>
        </div>

        <!-- <input type="button" name="" id="" value="Chọn tất cả">
        <input type="reset" name="" id="" value="Hủy">
        <a href="index.php?act=dskh"><input type="button" name="" id="" value="Thêm mới tài khoản"></a> -->
      </div>
      
    </div>