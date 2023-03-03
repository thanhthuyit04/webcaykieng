<script> 
      document.title = "Xem Đơn Hàng Của Bạn";
      document.title; 
</script>
<div class="tree-container">
      <div class="container">
        <div class="tree-box-newproduct">
          <h4>Xem Đơn Hàng Của Bạn</h4>
        </div>

        <div class="listtypepro ">

            <table class="table my-4">
                <thead class="h-table">
                  <tr>
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Người đặt hàng</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">SDT</th>
                    <th scope="col">Mã SP</th>
                    <th scope="col">Tổng</th>
                  </tr>
                </thead>
                <tbody>
                    <?php                        
                            echo '<tr>
                                    <td>'.$id_donhang.'</td>
                                    <td>'.$name.'</td>
                                    <td>'.$address.'</td>
                                    <td>'.$tel.'</td>
                                    <td>'.$id.'</td>
                                    <td>'.$tong.'</td>
                                <tr>';
                    ?>
                </tbody>
              </table>
        </div>

      
       
      </div>
      