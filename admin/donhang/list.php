<script> 
      document.title = "Quản Lý Đơn Hàng";
      document.title; 
</script>
<div class="tree-container">
      <div class="container">
        <div class="tree-box-newproduct">
          <h4 class="title-list-product text-success">Đơn Hàng</h4>
        </div>

        <div class="listtypepro ">

            <table class="table">
                <thead class="hh-table">
                  <tr>
                    <th scope="">Chọn</th>
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Tên người mua</th>
                    <th scope="col">Địa chỉ giao hàng</th>
                    <th scope="col">SDT</th>
                    <th scope="col">Tổng</th>
                    <th scope="col">Ngày lập</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Xem chi tiết</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($orders as $index => $order) {
                            extract($order);
                            $chitiet = json_encode($details[$index]);
                            $state = '';
                            if($trangthai == 0) $state = "Chờ xác nhận";
                            if($trangthai == 1) $state = "Đang giao hàng";
                            if($trangthai == 2) $state = "Đã hủy";
                            echo '<tr>
                                    <td><input type="checkbox" class="check-order" value="'.$id_donhang.'"></td>
                                    <td>'.$id_donhang.'</td>
                                    <td>'.$hoten.'</td>
                                    <td>'.$diachi.'</td>
                                    <td>'.$sdt.'</td>
                                    <td>'.$tong.'đ</td>
                                    <td>'.$ngay_tao.'</td>
                                    <td class="text-danger">'.$state.'</td>
                                ';
                            echo "
                                    <td><button class='btn btn-success' data-toggle='modal' data-target='#modal-detail' onclick='handleModal($chitiet)'>Xem</button></td>
                                </tr>
                            ";
                        }
                    ?>
                </tbody>
              </table>
        </div>

        <input type="button" name="" class='btn btn-success' id="" onclick="checkAll()" value="Chọn tất cả">
        <button class="btn btn-info float-right mx-3" onclick="confirmOrder()">Xác nhận đơn hàng</button>
        <button class="btn btn-danger float-right" onclick="cancelOrder()">Hủy đơn hàng</button>
      </div>
      <div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header bg-success d-flex justify-content-center">
                    <h5 class="modal-title text-light" id="exampleModalLabel">CHI TIẾT ĐƠN HÀNG</h5>
                </div>
                <div class="modal-body">
                <table class="table">
                    <thead class="h-table">
                        <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã SP</th>
                        <th scope="col">Tên SP</th>
                        <th scope="col">SL</th>
                        <th scope="col">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody id="body-modal">
                        
                    </tbody>
                    </table>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="d-sp_incart btn btn-success" data-dismiss="modal">Đóng</button>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        function handleModal(details){
            console.log(details);
            const bodyModal = document.querySelector('#body-modal');
            bodyModal.innerHTML = '';
            details.forEach(function(item, index){
                bodyModal.innerHTML += 
                `
                <tr>
                    <th scope="row">${index+1}</th>
                    <td>${item.id_donhang}</td>
                    <td>${item.name}</td>
                    <td>${item.soluong}</td>
                    <td>${item.tong}đ</td>
                </tr>
                `;
            })
        }

        function checkAll(){
            const items = document.querySelectorAll('.check-order');
            items.forEach(function(item){
                item.checked = true;
            })
        }
        function confirmOrder(){
            const items = document.querySelectorAll('.check-order:checked');
            var arr = [];
            items.forEach(function(item){
                arr.push(parseInt(item.value));
            })
            $.ajax({
            url: "index.php?act=confirmOrder",
            method: "POST",
            data: { id_orders: arr },
            cache: false,
            error: function(xhr ,text){
                alert('Đã có lỗi: ' + text);
            }
            });
            alert("Đã xác nhận " + (items.length) + " đơn hàng !");
            location.reload();
        }
        function cancelOrder(){
            const items = document.querySelectorAll('.check-order:checked');
            var arr = [];
            items.forEach(function(item){
                arr.push(parseInt(item.value));
            })
            $.ajax({
            url: "index.php?act=cancelOrder",
            method: "POST",
            data: { id_orders: arr },
            cache: false,
            error: function(xhr ,text){
                alert('Đã có lỗi: ' + text);
            }
            });
            alert("Đã hủy " + (items.length) + " đơn hàng !");
            location.reload();
        }
    </script>