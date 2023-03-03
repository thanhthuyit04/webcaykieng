<?php
    function insert_donhang($id_tk,$hoten,$diachi,$sdt,$email,$tong){
        $sql="insert into donhang(id_taikhoan,hoten,diachi,sdt,email,tong) 
        values('$id_tk','$hoten','$diachi','$sdt','$email','$tong')";
        pdo_execute($sql);
        $sql="select `id_donhang` from `donhang` where `id_taikhoan`=$id_tk order by `ngay_tao` desc limit 1";
        $data = pdo_query($sql);
        extract($data[0]);
        return $id_donhang;
    };

    function lay_all_donhang(){
        $sql = "select * from `donhang` order by `id_donhang` desc";
        return pdo_query($sql);
    }

    function getOderByIdUser($id){
        $sql = "select * from `donhang` where `id_taikhoan`=$id order by `id_donhang` desc";
        return pdo_query($sql);
    }

    function xac_nhan_donhang($id){
        $sql ="update `donhang` set `trangthai`=1 where `id_donhang`=$id";
        pdo_execute($sql);
    }
    function huy_donhang($id){
        $sql ="update `donhang` set `trangthai`=2 where `id_donhang`=$id";
        pdo_execute($sql);
    }

    function getRevenueOfMonth($month, $year){
        $sql ="SELECT getRevenueOfMonth($month, $year) as total";
        return pdo_query_one($sql)['total'];
    }

    function numberCustomerOfMonth($month, $year){
        $sql ="SELECT numberCustomerOfMonth($month, $year) as quantity";
        return pdo_query_one($sql)['quantity'];
    }
    function numberProductOfMonth($month, $year){
        $sql ="SELECT numberProductOfMonth($month, $year) as quantity";
        return pdo_query_one($sql)['quantity'];
    }