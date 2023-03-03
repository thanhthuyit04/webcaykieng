<?php
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/binhluan.php";
    include "../model/donhang.php";
    include "../model/chitiet_dh.php";
    include "../model/thongke.php";
    include "header.php";
    //controller

    $dsdm = loadall_danhmuc();
    if(isset($_GET['act'])){
        $act=$_GET['act'];
        switch ($act) {
            case 'adddm':
                //kiểm tra xem user có click vào nút add hay không
                if(isset($_POST['them'])&&($_POST['them'])){
                    $tenloai=$_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao="Thêm thành công";
                }
                include "danhmuc/add.php";
                break;

            case 'listdm':
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php";
                break;

            case 'xoadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_danhmuc($_GET['id']);
                    echo "<script>alert('Xóa thành công!')</script>";
                }
                $sql="select * from danhmuc order by id desc";
                $listdanhmuc=pdo_query($sql);
                include "danhmuc/list.php";
                break;

            case 'suadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $dm=loadone_danhmuc($_GET['id']);
                };
               
                include "danhmuc/update.php";
                break;

            case 'updatedm':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $tenloai=$_POST['tenloai'];
                    $id=$_POST['id'];
                    update_danhmuc($id,$tenloai);
                    $thongbao="Cập nhật thành công";
                }
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php";
                break;

            /*controler sanpham */

            case 'addsp':
                //kiểm tra xem user có click vào nút add hay không
                if(isset($_POST['them'])&&($_POST['them'])){
                    $iddm=$_POST['iddm'];
                    $tensp=$_POST['tensp'];
                    $giasp=$_POST['giasp'];
                    $mota=$_POST['mota'];
                    $hinh=$_FILES['hinh']['name'];
                    $target_dir="../upload/";
                    $target_file=$target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } else {
                        //echo "Sorry, there was an error uploading your file.";
                    }

                    insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm);
                    $thongbao="Thêm thành công";
                }
                $listdanhmuc=loadall_danhmuc();
                include "sanpham/add.php";
                break;

            case 'listsp':
                if(isset($_POST['listok'])&&($_POST['listok'])){
                    $keyw=$_POST['keyw'];
                    $iddm=$_POST['iddm'];
                }else{
                    $keyw='';
                    $iddm=0;
                }
                $listdanhmuc=loadall_danhmuc();
                $listsanpham=loadall_sanpham($keyw,$iddm);
                include "sanpham/list.php";
                break;

            case 'xoasp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_sanpham($_GET['id']);
                }
                $listsanpham=loadall_sanpham();
                include "sanpham/list.php";
                break;

            case 'suasp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $sanpham=loadone_sanpham($_GET['id']);
                };

                $listdanhmuc=loadall_danhmuc();
                include "sanpham/update.php";
                break;

            case 'updatesp':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $id=$_POST['id'];
                    $iddm=$_POST['iddm'];
                    $tensp=$_POST['tensp'];
                    $giasp=$_POST['giasp'];
                    $mota=$_POST['mota'];
                    $hinh=$_FILES['hinh']['name'];
                    $target_dir="../upload/";
                    $target_file=$target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } else {
                        //echo "Sorry, there was an error uploading your file.";
                    }
                    update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh);
                    $thongbao="Cập nhật thành công";
                }
                $listdanhmuc=loadall_danhmuc();
                $listsanpham=loadall_sanpham();
                include "sanpham/list.php";
                break;

            case 'dskh':
                $listtaikhoan=loadall_taikhoan();
                include "taikhoan/list.php";
                break;

            case 'dsbl':
                $listbinhluan=loadall_binhluan(0);
                include "binhluan/list.php";
                break;

            case 'xoabl':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_binhluan($_GET['id']);
                    echo "<script>alert('Xóa thành công!')</script>";
                }
                $sql="select * from binhluan order by id desc";
                $listbinhluan=pdo_query($sql);
                include "binhluan/list.php";
                break;

            case 'xoatk':
                if(isset($_GET['id'])&&($_GET['id']>1)){
                    delete_taikhoan($_GET['id']);
                    echo "<script>alert('Xóa tài khoản thành công!')</script>";
                }else{
                    echo "<script>alert('Không thể xóa tài khoản này!')</script>";
                }
                $listtaikhoan=loadall_taikhoan();
                include "taikhoan/list.php";
                break;
            case 'dsdh':
                $orders = lay_all_donhang();
                $details = [];
                foreach($orders as $order){
                    $datas = lay_chitiet_dh($order['id_donhang']);
                    $newData = [];
                    foreach($datas as $chitiet){
                        $chitiet['name'] = lay_ten_sp($chitiet['id_sanpham']);
                        array_push($newData, $chitiet);
                    }
                    array_push($details, $newData);
                }
                include "donhang/list.php";
                break;
            case 'confirmOrder':
                if(isset($_POST['id_orders'])){
                    $ids = $_POST['id_orders'];
                    foreach($ids as $id){
                        xac_nhan_donhang($id);
                    }   
                }
                break;
            case 'cancelOrder':
                if(isset($_POST['id_orders'])){
                    $ids = $_POST['id_orders'];
                    foreach($ids as $id){
                        huy_donhang($id);
                    }   
                }
                break; 
            
            case 'dstk':
                $listthongke=loadall_thongke();
                // if(isset($_POST['danhmuc'])&&(($_POST[''])>0)){
                //     $madm=$_POST['id'];
                //     $tendm=$_POST['name'];
                //     $countsp=$_POST['countsp'];
                //     $minprice=$_POST('minprice');
                //     $maxprice=$_POST('maxprice');
                //     $avgprice=$_POST('avgprice');
                //     insert_thongke($madm,$tendm,$countsp,$minprice,$maxprice,$avgprice);
                // } 
                
                include "thongke/list.php";
                break;
        }

    }else {
        $listtaikhoan=loadall_taikhoan();
        include "taikhoan/list.php";
    }
 

    include "footer.php";


?>