<?php
if(isset($_SESSION['thongbaothem'])){
    echo $_SESSION['thongbaothem'];
    unset($_SESSION['thongbaothem']);
}
if(isset($_SESSION['thongbaoxoa'])){
    echo $_SESSION['thongbaoxoa'];
    unset($_SESSION['thongbaoxoa']);
}
if(isset($_SESSION['thongbaosua'])){
    echo $_SESSION['thongbaosua'];
    unset($_SESSION['thongbaosua']);
}
?>