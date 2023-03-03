<?php

    function loadall_taikhoan(){
        $sql="select * from `taikhoan` where `delete`=1 order by id_taikhoan desc";
        $listtaikhoan=pdo_query($sql);
        return $listtaikhoan;
    }

    function delete_taikhoan($id){
        $sql="update `taikhoan` set `delete`=0 where id_taikhoan=".$id;
        pdo_execute($sql);
    }

    function them_tai_khoan($fullname, $email, $password, $rule){
        $sql = "insert into `taikhoan`(hoten, email, matkhau, rule) values('$fullname', '$email', '$password', '$rule')";
        return pdo_execute($sql);
    }

    function kt_hoten($fullname){
        $sql = "select * from `taikhoan` where `hoten`='$fullname'";
        $data = pdo_query($sql);
        if($data){
            return true;
        }else
            return false;
    }

    function kt_email($email){
        $sql = "select * from `taikhoan` where `email`='$email'";
        $data = pdo_query($sql);
        if($data){
            return true;
        }else
            return false;
    }

    function login($email, $password){
        $sql = "SELECT `hoten`,`rule`,`delete`,`id_taikhoan` FROM `taikhoan` WHERE email='$email' and matkhau='$password';";
        $account = pdo_query($sql);
        return $account;
    }

    function getUser($fullname){
        $sql = "select * from `taikhoan` where `hoten`='$fullname'";
        return pdo_query($sql);
    }

    function cap_nhat_tk($username, $email, $address, $tel, $id){
        $sql = "update `taikhoan` set `hoten`='$username', `email`='$email', `address`='$address', `tel`='$tel' where `id_taikhoan`=$id";
        pdo_execute($sql);
    }

    function checkemail($email){
        $sql = "select * from `taikhoan` where `email`='$email'";
        $sp = pdo_query($sql);
        return $sp;
    }
