<?php
    function createChitiet_dh($id_donhang, $id_sp, $sl, $tong){
        $sql="insert into chitiet_dh(id_donhang,id_sanpham,soluong,tong) 
        values('$id_donhang','$id_sp','$sl','$tong')";
        pdo_execute($sql);
    }

    function lay_chitiet_dh($id_donhang){
        $sql="select * from `chitiet_dh` where `id_donhang`=$id_donhang";
        return pdo_query($sql);
    }