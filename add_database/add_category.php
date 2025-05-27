<?php
include "connect.php";
if (isset($_POST['btn'])) {
    $ten = $_POST['ten_danhmuc'];
    $trangthai = $_POST['category_status'];
    $mota = $_POST['category_detail'];

    // Xử lý ảnh
    // $hinhanh = $_FILES['hinhanh']['name'];
    // $target_dir = "uploads/";
    // $target_file = $target_dir . basename($hinhanh);
    // move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file);
    $created_time = time();
    $last_updated = time();

    // Chèn vào DB
    $sql = "INSERT INTO tbl_danhmuc(ten_danhmuc, category_status, category_detail, category_created_time, category_last_updated)
            VALUES ('$ten', '$trangthai', '$mota', '$created_time', '$last_updated')";

    mysqli_query($conn, $sql);
}
?>

<form action="add_category.php" method="post" enctype="multipart/form-data">
    <label for="ten_danhmuc">Tên danh mục:</label><br>
    <input type="text" id="ten_danhmuc" name="ten_danhmuc" required><br><br>

    <label for="category_status">Trạng thái :</label><br>
    <input type="number" id="category_status" name="category_status"><br><br>

    <label for="category_detail">Chi tiết danh mục:</label><br>
    <textarea id="category_detail" name="category_detail"></textarea><br><br>

    <button id="submit" name="btn">Gửi</button>
</form>