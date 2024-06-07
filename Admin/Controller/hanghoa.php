<?php
$act = "hanghoa";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'hanghoa':
        include_once "./View/hanghoa.php";
        break;

    case 'insert_hanghoa':
        include_once "./View/edithanghoa.php";
        break;
    case 'insert_action':
        if (isset($_SERVER['REQUEST_METHOD'])=='POST') {
            $mahh=$_POST['mahh'];
            $tenhh=$_POST['tenhh'];
            $maloai=$_POST['maloai'];
            $dacbiet=$_POST['dacbiet'];
            $slx=$_POST['slx'];
            $ngaylap=$_POST['ngaylap'];
            $mota=$_POST['mota'];
            $hh = new hanghoa();
            $check=$hh->insertHangHoa($tenhh,$maloai,$dacbiet,$slx,$ngaylap,$mota);
            if ($check!==false) {
                echo '<script>alert("Thêm dữ liệu thành công");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=hanghoa"/>';
            }else{
                echo '<script>alert("Thêm dữ liệu không thành côngg");</script>';
                include_once "./View/edithanghoa.php";
            }
        }
        case 'update_hanghoa':
            include_once "./View/edithanghoa.php";
        break;
        case 'update_action':
            if (isset($_SERVER['REQUEST_METHOD'])=='POST') {
                $mahh=$_POST['mahh'];
                $tenhh=$_POST['tenhh'];
                $maloai=$_POST['maloai'];
                $dacbiet=$_POST['dacbiet'];
                $slx=$_POST['slx'];
                $ngaylap=$_POST['ngaylap'];
                $mota=$_POST['mota'];
                $hh = new hanghoa();
                $check=$hh->updateHangHoa($mahh,$tenhh,$maloai,$dacbiet,$slx,$ngaylap,$mota);
                if ($check!==false) {
                    echo '<script>alert("Cập nhật thành công");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=hanghoa"/>';
                }else{
                    echo '<script>alert("Cập nhật không thành công");</script>';
                    include_once "./View/edithanghoa.php";
                }
            }
            break;
        case 'delete_hanghoa':
            $mahh=$_GET["id"];
            $hh=new hanghoa();
            $delete=$hh->deleteProduct($mahh);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=hanghoa"/>';
            break;
}

?>