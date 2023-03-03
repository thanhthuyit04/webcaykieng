<?php

    function insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm){
        $sql="insert into sanpham(name,price,img,mota,iddm) values('$tensp','$giasp','$hinh','$mota','$iddm')";
        pdo_execute($sql);
    };

    function delete_sanpham($id){
        $sql="delete from sanpham where id=".$id;
        pdo_execute($sql);
    }

    function loadall_sanpham_home(){
        $sql="select * from sanpham where 1 order by id desc limit 0,8";
        
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }

    function loadall_sanpham($keyw="",$iddm=0){
        $sql="select * from sanpham where 1";
        if($keyw!=""){
            $sql.=" and name like '%".$keyw."%'";
        }
        if($iddm>0){
            $sql.=" and iddm = '".$iddm."'";
        }
        $sql.=" order by id desc";  
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }

    function load_ten_dm($iddm){
        if($iddm>0){
            $sql="select * from danhmuc where id=".$iddm;
            $dm=pdo_query_one($sql);
            extract($dm);
            return $name;
        }else{
            return "";
        }
        
    }

    function loadone_sanpham($id){
        $sql="select * from sanpham where id=".$id;
        $sp=pdo_query_one($sql);
        return $sp;
    }

    function load_sanpham_cungloai($id,$iddm){
        $sql="select * from sanpham where iddm=".$iddm." AND id <> ".$id;
        
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }

    function update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh){
        if($hinh!="")
            $sql="update sanpham set iddm='".$iddm."', name='".$tensp."', price='".$giasp."', mota='".$mota."', img='".$hinh."' where id=".$id;
        else    
            $sql="update sanpham set iddm='".$iddm."', name='".$tensp."', price='".$giasp."', mota='".$mota."' where id=".$id;
        pdo_execute($sql);
    }

    function lay_ten_sp($id){
        $sql = "select `name` from `sanpham` where `id`=$id";
        $data = pdo_query($sql);
        extract($data[0]);
        return $name;
    }


?>