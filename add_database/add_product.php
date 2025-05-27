<?php
include "connect.php";
if (isset($_POST['btn'])) {

    $id_dm = $_POST['id_danhmuc'];
    $ten_sanpham = $_POST['ten_sanpham'];
    $price = $_POST['giasp'];
    $soluong = $_POST['soluong'];

    $image = $_FILES['hinhanh']['name'];
    $image_tmp = $_FILES['hinhanh']['tmp_name'];



    $discount = $_POST['giamgia'];
    $dsc_price = $_POST['giadagiam'];
    $daban = $_POST['daban'];
    $rate = $_POST['average_rating'];
    $trangthai = $_POST['trangthaisp'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];


    // Xử lý ảnh
    // $hinhanh = $_FILES['hinhanh']['name'];
    // $target_dir = "uploads/";
    // $target_file = $target_dir . basename($hinhanh);
    // move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file);
    $created_time = time();
    $last_updated = time();

    // Chèn vào DB
    $sql = "INSERT INTO tbl_sanpham(id_danhmuc, tensanpham, giasp, soluong, hinhanh, giamgia, giadagiam, daban, averange_rating, trangthaisp, tomtat, noidung, created_time, last_updated)
            VALUES ('$id_dm', '$ten_sanpham', '$price', '$soluong', '$image','$discount','$dsc_price','$daban','$rate','$trangthai','$tomtat','$noidung','$created_time','$last_updated')";

    mysqLi_query($conn, $sql);
    
}
?>

<form action="add_product.php" method="post" enctype="multipart/form-data">
    <label for="id_danhmuc">ID danh mục:</label><br>
    <input type="number" name="id_danhmuc"><br><br>

    <label for="ten_sanpham">Tên sản phẩm:</label><br>
    <input type="text" name="ten_sanpham"><br><br>

    <label for="giasp">Giá sản phẩm:</label><br>
    <input type="number" name="giasp"><br><br>

    <label for="soluong">Số lượng:</label><br>
    <input type="number" name="soluong"><br><br>

    <label for="hinhanh">Hình ảnh:</label><br>
    <input type="file" name="hinhanh"><br><br>

    <label for="giamgia">Giảm giá:</label><br>
    <input type="number" name="giamgia"><br><br>

    <label for="giadagiam">Giá đã giảm:</label><br>
    <input type="number" name="giadagiam"><br><br>

    <label for="daban"> Đã bán:</label><br>
    <input type="number" name="daban"><br><br>

    <label for="average_rating">Đánh giá trung bình:</label><br>
    <input type="number" name="average_rating"><br><br>

    <label for="trangthaisp">Trạng thái:</label><br>
    <input type="number" name="trangthaisp"><br><br>

    <label for="tomtat">Tóm tắt:</label><br>
    <textarea name="tomtat"></textarea><br><br>

    <label for="noidung">Nội dung:</label><br>
    <textarea name="noidung"></textarea><br><br>


    <button id="submit" name="btn">Gửi</button>
</form>