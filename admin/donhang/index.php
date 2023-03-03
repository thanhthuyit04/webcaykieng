<?php
    include "../model/donhang.php";
    
    if(isset($_POST['id_orders'])){
     $ids = $_POST['id_orders'];
        foreach($ids as $id){
            xac_nhan_donhang($id);
        }   
    }