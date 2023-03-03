<?php
    include "model/pdo.php";
    include "model/danhmuc.php";
    include "model/sanpham.php";
    include "model/taikhoan.php";
    include "model/donhang.php";
    include "model/chitiet_dh.php";
    include "view/header.php";

    include "global.php";

    //if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];

    $spnew=loadall_sanpham_home();
    $dssp=loadall_sanpham("",$iddm=0);

    if((isset($_GET['act'])) && ($_GET['act']!='')){
        $act=$_GET['act'];
        switch($act){
            case 'sanphamct':

                if(isset($_GET['idsp'])&&($_GET['idsp']>0)){
                    $id=$_GET['idsp'];
                    //$iddm = getIddm($id);
                    //extract($iddm);
                    
                    $onesp=loadone_sanpham($id);
                    extract($onesp);
                    $sp_cungloai=load_sanpham_cungloai($id,$iddm);
                    include "view/detailproduct.php";
                }else{
                    include "view/home.php";
                }
                
                break;

            case 'gioithieu':
                include "view/gioithieu.php";
                break;

            case 'lienhe':
                include "view/lienhe.php";
                break;

            case 'sanpham':

                if(isset($_POST['kyw'])&&($_POST['kyw']!=0)){
                    $kyw=$_POST['kyw'];
                }else{
                    $kyw="";
                }

                if(isset($_GET['iddm'])&&($_GET['iddm']>0)){
                    $iddm=$_GET['iddm'];
                    
                }else{
                    $iddm=0;
                }
                $dssp=loadall_sanpham($kyw,$iddm);
                $tendm=load_ten_dm($iddm);
                include "view/sanpham.php";
                break;
            case 'dangky':

                include 'view/dangky.php';
                break;
            case 'dktk':
                if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = md5($_POST['password']);
                    //$rule = 'user';
                    if(kt_hoten($username)){
                        echo "<script>alert('Tên đăng nhập đã được sử dụng!')</script>";
                        include "view/dangky.php";
                    }else
                    if(kt_email($email)){
                        echo "<script>alert('Email đã được sử dụng!')</script>";
                        include "view/dangky.php";
                    }else{
                        them_tai_khoan($username, $email, $password, $rule);
                        echo "<script>alert('Đăng ký tài khoản thành công!')</script>";
                        echo "<script>window.location='index.php?act=dangnhap';</script>";
                    }
                    
                }else{
                    echo "<script>alert('Đăng ký tài khoản không thành công!')</script>";
                    include "view/dangky.php";
                }
                break;
            case 'dangnhap':

                include 'view/dangnhap.php';
                break;
            case 'login':
                if(isset($_POST['email']) && isset($_POST['password'])){
                    $email = $_POST['email'];
                    $password = md5($_POST['password']);

                    $account = login($email, $password);
                    if(isset($account) && $account != null){
                        extract($account[0]);
                        if($delete == 1){
                            $_SESSION['id_user'] = $id_taikhoan;
                            $_SESSION['username'] = $hoten;
                            $_SESSION['rule'] = $rule;
                            echo "<script>alert('Đăng nhập thành công!')</script>";
                            echo "<script>window.location='index.php';</script>";
                        }else{
                            echo "<script>alert('Đăng nhập không thành công!')</script>";
                            include 'view/dangnhap.php';
                        }
                    }else{
                        echo "<script>alert('Đăng nhập không thành công!')</script>";
                        include 'view/dangnhap.php';

                    }
                }


                break;
            case 'logout':
                session_unset();
                echo "<script>window.location='index.php?act=dangnhap';</script>";
                break;

            case 'capnhattk':
                if(isset($_GET['user'])){
                    $fullname = $_GET['user'];
                    $user = getUser($fullname);
                    extract($user[0]);
                    include "view/capnhattk.php";
                }
                if(isset($_POST['username']) && isset($_POST['email'])){ 
                    $id= $_GET['id'];
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    cap_nhat_tk($username, $email, $address, $tel, $id);
                    $_SESSION['user'] = $username;
                    echo "<script>alert('Cập nhật thành công!')</script>";
                }
                
                break;

            case 'quenmk':

                if(isset($_POST['guiemail'])&&($_POST['guiemail'])){
                    $email = $_POST['email'];

                    $checkemail=checkemail($email);

                    if(is_array($checkemail)){
                        // echo '<pre>';
                        // print_r ($checkemail); 
                        $thongbao="Mat khau la: ".$checkemail[0]['matkhau'];
                    }else{
                        $thongbao="Email không tồn tại";
                    }
                }
                include "view/quenmk.php";
                break;
                
            
            case 'giohang':
                include "view/giohang.php";
                break;
            
            case 'taodonhang':
                include "view/taodonhang.php";
                break;

            //case 'addtocart':
            //    if(isset($_POST['addtocart'])&&($_POST['addtocart'])){
            //        $id=$_POST['id'];
             //       $name=$_POST['name'];
             //       $img=$_POST['img'];
             //       $price=$_POST['price'];
             //       $soluong=1;
             //       $ttien=$soluong * $price;
             //       $spadd=[$id,$name,$img,$price,$soluong,$ttien];
             //       array_push($_SESSION['mycart'],$spadd);
                    
             //   }
             //   include "view/giohang.php";
             //   break;

            
            case 'themdonhang':
                if(isset($_SESSION['id_user'])){
                    $id_user = $_SESSION['id_user'];
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $email = $_POST['email'];
                    $tel = $_POST['tel'];
                    $idsps = $_POST['idsp'];
                    $quantitys = $_POST['soluong'];
                    $totals = $_POST['tong'];
                    $tong = 0;
                    foreach($totals as $total){
                        $tong+=$total;
                    }
                    $id_donhang = insert_donhang($id_user,$name,$address,$tel,$email,$tong);
                    foreach($idsps as $index => $id){
                        createChitiet_dh($id_donhang, $id, $quantitys[$index], $totals[$index]);
                    }
                    $_SESSION['mycart'] = [];
                    echo "<script>alert('Đặt hàng thành công vui lòng chờ đợi!')</script>";
                }
                include "view/bill.php";
                break;
                
            case 'xemdonhang':
                if(isset($_GET['id'])){
                    $id=$_GET['id'];

                    $orders=getOderByIdUser($id);
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
                }
                include "view/xemdonhang.php";
                break;

            case 'huydonhang':
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    huy_donhang($id);
                    $orders=getOderByIdUser($_SESSION['id_user']);
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
                }
                include "view/xemdonhang.php";
                break;

            default:
                include "view/home.php";
                break;
        }
    }else{
        include "view/home.php";
    }
    
    include "view/footer.php";
?>