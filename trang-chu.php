<?php
// Include database config và bắt đầu session (nếu chưa có)
include('admin/config/config.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPM Camera</title>
    <?php
    // Include các link CSS/JS cần thiết (Bootstrap, FontAwesome, Swiper CSS, style.css...)
    include('./js/link.php');
    ?>
    <!-- Link CSS riêng cho trang chủ hoặc theme (đảm bảo file này tồn tại) -->
    <link rel="stylesheet" href="trangchu-css.css">
    <!-- Hoặc có thể là css/dark-theme.css tùy theo cài đặt của bạn -->
    <link rel="stylesheet" href="css/style.css"> <!-- Link đến style.css chung -->
    <link rel="stylesheet" href="css/dark-theme.css"> <!-- Link đến theme tối (nếu dùng) -->


</head>

<body class="container">
    <!-- Thêm class container vào body có thể giúp định dạng dễ hơn -->
    <div class="container">
        <!-- Container chính bao bọc nội dung -->
        <?php
        // Include phần header của trang
        include('pages/header.php');
        ?>
        <div class="main" id="main">
            <?php
       
            ?>
            <div id="home">
                <div class="content">

                    <!-- Ads slide -->
                    <section class="section box__slide_home">
                        <div class="section_content">
                            <div class="row ">
                                <!-- KHỐI MENU DANH MỤC BÊN TRÁI ĐÃ BỊ XÓA -->

                                <!-- Slider quảng cáo - ĐÃ ĐIỀU CHỈNH CLASS -->
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="slide_ads">
                                        <!-- Swiper -->
                                        <div class="swiper mySwiper">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img src="images/ads/qc1.png" alt="Quảng cáo 1">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="images/ads/qc2.png" alt="Quảng cáo 2">
                                                    <!-- Thêm các slide khác nếu cần -->
                                                </div>
                                            </div>
                                            <!-- Nút điều hướng Swiper -->
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                            <!-- Phân trang Swiper (tùy chọn) -->
                                            <!-- <div class="swiper-pagination"></div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Banner (ví dụ: Freeship) -->
                    <section class="section box__banner">
                        <div class="section_content">
                            <div class="freeship_banner">
                                <div class="row">
                                    <div class="col-12">
                                        <img src="images/banner/freeship-banner.png" alt="Banner Freeship">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Sản Phẩm Khuyến Mãi -->
                    <section class="section box__promotion box__product">
                        <div class="section_content row">
                            <!-- Thêm class row để các col bên trong hoạt động -->
                            <!-- Tiêu đề và đếm ngược -->
                            <div class="col col-lg-12 col-md-12 col-12">
                                <div class="container__header">
                                    <h2 class="container__header-title">Sản Phẩm Khuyến Mãi</h2>
                                    <div class="countdown-time">
                                        <p>Chương trình kết thúc trong...</p> <!-- Sẽ được cập nhật bởi JS -->
                                    </div>
                                </div>
                            </div>
                            <!-- Danh sách sản phẩm khuyến mãi -->
                            <div class="col col-lg-12 col-md-12 col-12">
                                <div class="row product--container">
                                    <!-- Bỏ no-wrap nếu muốn xuống dòng tự động -->
                                    <?php
                                    $sql_product_discount = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.soluong > 0 AND trangthaisp=1 AND giamgia > 0 ORDER BY giamgia DESC LIMIT 10";
                                    $query_product_discount = mysqli_query($mysqli, $sql_product_discount);
                                    if ($query_product_discount && mysqli_num_rows($query_product_discount) > 0) {
                                        while ($row_product_discount = mysqli_fetch_array($query_product_discount)) {
                                            $hinhanh_url = './admin/modules/quanlysp/handleEvent/product/' . rawurlencode($row_product_discount['hinhanh']);
                                    ?>
                                    <div class="col col-lg-2-4 col-md-3 col-6 mb-10">
                                        <!-- Class col-lg-2-4 là tùy chỉnh? -->
                                        <div class="row__item item--product">
                                            <div class="row__item-container">
                                                <?php if ($row_product_discount['giamgia'] > 0) { ?>
                                                <!-- MODIFIED HERE -->
                                                <div class="discount-banner">
                                                    -<?php echo intval($row_product_discount['giamgia']); ?>%
                                                </div>
                                                <!-- END MODIFICATION -->
                                                <?php } ?>
                                                <div class="row__item-display br-5">
                                                    <!-- br-5 có thể là border-radius? -->
                                                    <div class="view__product-detail"
                                                        value="<?php echo htmlspecialchars($row_product_discount['id_sanpham']); ?>">
                                                        <div class="row__item-img"
                                                            style="background: url('<?php echo $hinhanh_url; ?>') no-repeat center center / cover;">
                                                            <!-- Đảm bảo thẻ div này có chiều cao (có thể set trong CSS hoặc inline) -->
                                                        </div>
                                                    </div>
                                                    <!-- Nút thêm vào giỏ -->
                                                    <?php if (isset($_SESSION['id_user'])) { ?>
                                                    <button class="add-to-cart-btn"
                                                        value="<?php echo htmlspecialchars($row_product_discount['id_sanpham']); ?>">
                                                        <i class="fa-solid fa-cart-plus"></i>
                                                        <span>Thêm vào giỏ</span> <!-- Text ngắn gọn hơn -->
                                                    </button>
                                                    <?php } else { ?>
                                                    <button class="add-to-cart-btn-not-login"
                                                        value="<?php echo htmlspecialchars($row_product_discount['id_sanpham']); ?>">
                                                        <i class="fa-solid fa-cart-plus"></i>
                                                        <span>Thêm vào giỏ</span>
                                                    </button>
                                                    <?php } ?>
                                                </div>
                                                <div class="row__item-info">
                                                    <div class="view__product-detail"
                                                        value="<?php echo htmlspecialchars($row_product_discount['id_sanpham']); ?>">
                                                        <div class="row__info-name">
                                                            <span
                                                                style="cursor:pointer;"><?php echo htmlspecialchars($row_product_discount['tensanpham']); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="price__wrapper">
                                                        <?php
                                                        if ($row_product_discount['giamgia'] > 0) {
                                                            $discounted_price = $row_product_discount['giasp'] - ($row_product_discount['giasp'] * $row_product_discount['giamgia']) / 100;
                                                        ?>
                                                        <span
                                                            class="price-discount"><?php echo number_format($discounted_price, 0, ',', '.'); ?>đ</span>
                                                        <span
                                                            class="price-normal-discount"><?php echo number_format($row_product_discount['giasp'], 0, ',', '.'); ?>đ</span>
                                                        <?php } else { ?>
                                                        <span
                                                            class="price-normal"><?php echo number_format($row_product_discount['giasp'], 0, ',', '.'); ?>đ</span>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        } // end while discount product
                                    } else {
                                        echo "<div class='col-12'><p style='padding: 20px; text-align: center;'>Hiện không có sản phẩm khuyến mãi.</p></div>";
                                    }
                                    ?>
                                </div> <!-- end .row.product--container -->
                            </div>
                        </div>
                    </section>

                    <!-- Sản Phẩm Bán Chạy -->
                    <section class="section box__product">
                        <div class="section_content row">
                            <!-- Thêm class row -->
                            <!-- Tiêu đề -->
                            <div class="col col-lg-12 col-md-12 col-12">
                                <div class="container__header">
                                    <h2 class="container__header-title">Sản Phẩm Bán Chạy</h2>
                                    <!-- Có thể thêm nút Xem tất cả nếu cần -->
                                </div>
                            </div>
                            <!-- Danh sách sản phẩm -->
                            <div class="col col-lg-12 col-md-12 col-12">
                                <div class="row product--container">
                                    <!-- Bỏ no-wrap nếu muốn xuống dòng -->
                                    <?php
                                    $sql_product_sold = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.soluong > 0 AND trangthaisp=1 ORDER BY daban DESC LIMIT 10";
                                    $query_product_sold = mysqli_query($mysqli, $sql_product_sold);
                                    if ($query_product_sold && mysqli_num_rows($query_product_sold) > 0) {
                                        while ($row_product_sold = mysqli_fetch_array($query_product_sold)) {
                                            $hinhanh_url_sold = './admin/modules/quanlysp/handleEvent/product/' . rawurlencode($row_product_sold['hinhanh']);
                                    ?>
                                    <div class="col col-lg-2-4 col-md-3 col-6 mb-10">
                                        <div class="row__item item--product">
                                            <div class="row__item-container">
                                                <?php if ($row_product_sold['giamgia'] > 0) { ?>
                                                <!-- MODIFIED HERE -->
                                                <div class="discount-banner">
                                                    -<?php echo intval($row_product_sold['giamgia']); ?>%
                                                </div>
                                                <!-- END MODIFICATION -->
                                                <?php } ?>
                                                <div class="row__item-display br-5">
                                                    <div class="view__product-detail"
                                                        value="<?php echo htmlspecialchars($row_product_sold['id_sanpham']); ?>">
                                                        <div class="row__item-img"
                                                            style="background: url('<?php echo $hinhanh_url_sold; ?>') no-repeat center center / cover;">
                                                        </div>
                                                    </div>
                                                    <?php if (isset($_SESSION['id_user'])) { ?>
                                                    <button class="add-to-cart-btn"
                                                        value="<?php echo htmlspecialchars($row_product_sold['id_sanpham']); ?>">
                                                        <i class="fa-solid fa-cart-plus"></i>
                                                        <span>Thêm vào giỏ</span>
                                                    </button>
                                                    <?php } else { ?>
                                                    <button class="add-to-cart-btn-not-login"
                                                        value="<?php echo htmlspecialchars($row_product_sold['id_sanpham']); ?>">
                                                        <i class="fa-solid fa-cart-plus"></i>
                                                        <span>Thêm vào giỏ</span>
                                                    </button>
                                                    <?php } ?>
                                                </div>
                                                <div class="row__item-info">
                                                    <div class="view__product-detail"
                                                        value="<?php echo htmlspecialchars($row_product_sold['id_sanpham']); ?>">
                                                        <div class="row__info-name">
                                                            <span
                                                                style="cursor:pointer;"><?php echo htmlspecialchars($row_product_sold['tensanpham']); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="price__wrapper">
                                                        <?php
                                                        if ($row_product_sold['giamgia'] > 0) {
                                                            $discounted_price_sold = $row_product_sold['giasp'] - ($row_product_sold['giasp'] * $row_product_sold['giamgia']) / 100;
                                                        ?>
                                                        <span
                                                            class="price-discount"><?php echo number_format($discounted_price_sold, 0, ',', '.'); ?>đ</span>
                                                        <span
                                                            class="price-normal-discount"><?php echo number_format($row_product_sold['giasp'], 0, ',', '.'); ?>đ</span>
                                                        <?php } else { ?>
                                                        <span
                                                            class="price-normal"><?php echo number_format($row_product_sold['giasp'], 0, ',', '.'); ?>đ</span>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        } // end while sold product
                                    } else {
                                         echo "<div class='col-12'><p style='padding: 20px; text-align: center;'>Chưa có sản phẩm bán chạy.</p></div>";
                                    }
                                    ?>
                                </div> <!-- end .row.product--container -->
                            </div>
                        </div>
                    </section>

                    <!-- Sản phẩm theo từng Danh Mục -->
                    <?php
                    $sql_category_list = "SELECT * FROM tbl_danhmuc WHERE category_status=1 ORDER BY id_danhmuc ASC LIMIT 10"; // Giới hạn số danh mục hiển thị
                    $query_category_list = mysqli_query($mysqli, $sql_category_list);

                    if ($query_category_list && mysqli_num_rows($query_category_list) > 0) {
                        while ($row_category = mysqli_fetch_array($query_category_list)) {
                            $id_dm = $row_category['id_danhmuc'];
                            // Query sản phẩm cho danh mục hiện tại
                            $sql_product_list = "SELECT * FROM tbl_sanpham
                                                 WHERE soluong > 0 AND trangthaisp = 1 AND id_danhmuc = '$id_dm'
                                                 ORDER BY daban DESC -- Sắp xếp theo bán chạy hoặc mới nhất (tùy ý)
                                                 LIMIT 10"; // Giới hạn số sản phẩm mỗi danh mục
                            $query_product_list = mysqli_query($mysqli, $sql_product_list);

                            // Chỉ hiển thị section nếu có sản phẩm trong danh mục này
                            if ($query_product_list && mysqli_num_rows($query_product_list) > 0) {
                    ?>
                    <section class="section box__product">
                        <div class="section_content row">
                            <!-- Thêm class row -->
                            <!-- Tiêu đề danh mục -->
                            <div class="col col-lg-12 col-md-12 col-12">
                                <div class="container__header">
                                    <h2 class="container__header-title">
                                        <?php echo htmlspecialchars($row_category['ten_danhmuc']); ?></h2>
                                    <div class="view-all">
                                        <!-- Nút Xem tất cả dùng div -->
                                        <div class="view__all-product-with-category"
                                            value="<?php echo htmlspecialchars($row_category['id_danhmuc']); ?>">
                                            Xem tất cả <i class="fa-solid fa-chevron-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Danh sách sản phẩm -->
                            <div class="col col-lg-12 col-md-12 col-12">
                                <div class="row product--container">
                                    <!-- Bỏ no-wrap nếu muốn -->
                                    <?php
                                    while ($row_product = mysqli_fetch_array($query_product_list)) {
                                        $hinhanh_url_cat = './admin/modules/quanlysp/handleEvent/product/' . rawurlencode($row_product['hinhanh']);
                                    ?>
                                    <div class="col col-lg-2-4 col-md-3 col-6 mb-10">
                                        <div class="row__item item--product">
                                            <div class="row__item-container">
                                                <?php if ($row_product['giamgia'] > 0) { ?>
                                                <!-- MODIFIED HERE -->
                                                <div class="discount-banner">
                                                    -<?php echo intval($row_product['giamgia']); ?>%
                                                </div>
                                                <!-- END MODIFICATION -->
                                                <?php } ?>
                                                <div class="row__item-display br-5">
                                                    <div class="view__product-detail"
                                                        value="<?php echo htmlspecialchars($row_product['id_sanpham']); ?>">
                                                        <div class="row__item-img"
                                                            style="background: url('<?php echo $hinhanh_url_cat; ?>') no-repeat center center / cover;">
                                                        </div>
                                                    </div>
                                                    <?php if (isset($_SESSION['id_user'])) { ?>
                                                    <button class="add-to-cart-btn"
                                                        value="<?php echo htmlspecialchars($row_product['id_sanpham']); ?>">
                                                        <i class="fa-solid fa-cart-plus"></i>
                                                        <span>Thêm vào giỏ</span>
                                                    </button>
                                                    <?php } else { ?>
                                                    <button class="add-to-cart-btn-not-login"
                                                        value="<?php echo htmlspecialchars($row_product['id_sanpham']); ?>">
                                                        <i class="fa-solid fa-cart-plus"></i>
                                                        <span>Thêm vào giỏ</span>
                                                    </button>
                                                    <?php } ?>
                                                </div>
                                                <div class="row__item-info">
                                                    <div class="view__product-detail"
                                                        value="<?php echo htmlspecialchars($row_product['id_sanpham']); ?>">
                                                        <div class="row__info-name">
                                                            <span
                                                                style="cursor:pointer;"><?php echo htmlspecialchars($row_product['tensanpham']); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="price__wrapper">
                                                        <?php
                                                        if ($row_product['giamgia'] > 0) {
                                                            $discounted_price_cat = $row_product['giasp'] - ($row_product['giasp'] * $row_product['giamgia']) / 100;
                                                        ?>
                                                        <span
                                                            class="price-discount"><?php echo number_format($discounted_price_cat, 0, ',', '.'); ?>đ</span>
                                                        <span
                                                            class="price-normal-discount"><?php echo number_format($row_product['giasp'], 0, ',', '.'); ?>đ</span>
                                                        <?php } else { ?>
                                                        <span
                                                            class="price-normal"><?php echo number_format($row_product['giasp'], 0, ',', '.'); ?>đ</span>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        } // end while product list
                                    ?>
                                </div> <!-- end .row.product--container -->
                            </div>
                        </div>
                    </section>
                    <?php
                            } // end if có sản phẩm trong danh mục
                        } // end while category list
                    } // end if có danh mục
                    ?>
                </div> <!-- end .content -->
            </div> <!-- end #home -->

        </div> <!-- end .main -->
        <?php
        // Include phần footer
        include('pages/footer.php');
        ?>
    </div> <!-- end .container -->

    <!-- Script JS -->
    <script>
    // Sử dụng DOMContentLoaded để đảm bảo HTML đã sẵn sàng
    document.addEventListener('DOMContentLoaded', function() {

        // --- Khởi tạo Swiper ---
        try {
            var swiper = new Swiper(".mySwiper", {
                loop: true,
                autoplay: {
                    delay: 3000, // Tăng nhẹ delay
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    dynamicBullets: true,
                    clickable: true, // Cho phép click vào dot
                },
                keyboard: {
                    enabled: true,
                    onlyInViewport: false,
                },
            });
        } catch (e) {
            console.error("Swiper initialization failed:", e);
        }

        // --- XỬ LÝ CLICK ĐỂ ĐIỀU HƯỚNG TRANG (ĐÃ SỬA) ---
        const mainContentArea = document.getElementById('main') || document.body;

        mainContentArea.addEventListener('click', function(event) {

            // 1. Click vào chi tiết sản phẩm (hình ảnh hoặc tên)
            const productDetailLink = event.target.closest('.view__product-detail');
            if (productDetailLink) {
                const idDetail = productDetailLink.getAttribute("value");
                if (idDetail) {
                    const url = "san-pham.php?id=" + encodeURIComponent(idDetail);
                    window.location.href = url; // Chuyển trang trực tiếp
                }
                return;
            }

            // 2. Click vào "Xem tất cả" của danh mục
            const viewAllCategoryLink = event.target.closest('.view__all-product-with-category');
            if (viewAllCategoryLink) {
                const idAll = viewAllCategoryLink.getAttribute("value");
                if (idAll) {
                    const url = "danh-muc.php?id=" + encodeURIComponent(idAll);
                    window.location.href = url; // Chuyển trang trực tiếp
                }
                return;
            }

            // 3. Click vào nút danh mục ở menu trái (KHỐI NÀY ĐÃ BỊ XÓA, NHƯNG ĐỂ LẠI LOGIC NÀY NẾU CÓ NÚT TƯƠNG TỰ Ở NƠI KHÁC)
            const categoryButton = event.target.closest(
                '.category__product-btn'
            ); // Khối này đã bị xóa nên event listener này sẽ không còn tác dụng cho menu trái nữa
            if (categoryButton) {
                const idCategory = categoryButton.getAttribute("value");
                if (idCategory) {
                    const url = "danh-muc.php?id=" + encodeURIComponent(idCategory);
                    window.location.href = url; // Chuyển trang trực tiếp
                }
                return;
            }

            // 4. Click vào nút "Thêm vào giỏ" (Cần xử lý AJAX riêng)
            const addToCartBtn = event.target.closest('.add-to-cart-btn');
            if (addToCartBtn) {
                const productId = addToCartBtn.getAttribute('value');
                console.log("Thêm vào giỏ (đăng nhập): " + productId);
                // !!! Thêm logic AJAX của bạn vào đây !!!
                // Ví dụ dùng jQuery (cần include jQuery trước):
                /*
                $.ajax({
                    url: 'pages/ajax_add_to_cart.php', // Đường dẫn file xử lý thêm giỏ hàng
                    method: 'POST',
                    data: { product_id: productId, quantity: 1 }, // Gửi ID và số lượng
                    success: function(response) {
                        // Xử lý kết quả trả về (ví dụ: cập nhật icon giỏ hàng, hiện thông báo)
                        console.log(response);
                        alert('Đã thêm sản phẩm vào giỏ hàng!');
                        // Cập nhật số lượng trên icon giỏ hàng (nếu có)
                        // updateCartCount();
                    },
                    error: function(xhr, status, error) {
                        console.error("Lỗi khi thêm vào giỏ:", error);
                        alert('Có lỗi xảy ra, vui lòng thử lại.');
                    }
                });
                */
                alert('Chức năng Thêm vào giỏ hàng (Đã đăng nhập) cần được cài đặt bằng AJAX!');
                return;
            }

            const addToCartNotLoginBtn = event.target.closest('.add-to-cart-btn-not-login');
            if (addToCartNotLoginBtn) {
                alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!');
                // Chuyển hướng đến trang đăng nhập (tùy chọn)
                // window.location.href = 'login.php';
                return;
            }

        });

        // --- Countdown Timer ---
        const countdownElement = document.querySelector(".countdown-time p");
        if (countdownElement) {
            // !!! THAY ĐỔI NGÀY KẾT THÚC Ở ĐÂY !!!
            const countDownDate = new Date("2024-12-31T23:59:59").getTime(); // Ví dụ: cuối năm 2024

            const updateCountdown = () => {
                const now = new Date().getTime();
                const distance = countDownDate - now;

                if (distance < 0) {
                    clearInterval(countdownInterval);
                    countdownElement.innerHTML = "Chương trình đã kết thúc";
                    // Ẩn luôn cả div chứa nó nếu muốn
                    // countdownElement.closest('.countdown-time').style.display = 'none';
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Hiển thị đẹp hơn
                let output = "Kết thúc sau: ";
                if (days > 0) output += `${days} ngày `;
                output +=
                    `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
                countdownElement.innerHTML = output;
            };

            updateCountdown(); // Chạy lần đầu
            const countdownInterval = setInterval(updateCountdown, 1000);
        } else {
            console.warn("Không tìm thấy phần tử countdown '.countdown-time p'");
        }

        // --- Ẩn loader nếu có (tùy chọn) ---
        const loaderWrapper = document.querySelector('.loader-wrapper');
        if (loaderWrapper) {
            setTimeout(() => {
                loaderWrapper.style.opacity = '0';
                setTimeout(() => {
                    loaderWrapper.style.display = 'none';
                }, 500); // Chờ transition kết thúc
            }, 100); // Delay nhỏ để đảm bảo render xong
        }

    }); // Kết thúc DOMContentLoaded
    </script>
</body>

</html>