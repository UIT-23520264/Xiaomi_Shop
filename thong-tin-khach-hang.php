<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPM Camera</title>
    <?php include('./js/link.php');
    include('admin/config/config.php'); ?>
    <style>
    .profile_wrapper {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        padding: 30px;
    }

    .profile__sidebar {
        background: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .profile__avatar {
        text-align: center;
        margin-bottom: 25px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .profile__avatar i {
        font-size: 64px;
        width: 120px;
        height: 120px;
        background: #fff;
        border: 2px solid #e9ecef;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        color: #6c757d;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .profile__avatar span {
        font-size: 18px;
        font-weight: 600;
        color: #343a40;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        width: 100%;
    }

    .profile__sidebar button {
        width: 100%;
        padding: 12px 20px;
        margin-bottom: 15px;
        border: 2px solid #dee2e6;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 500;
        transition: all 0.3s ease;
        background: #fff;
        color: #495057;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 48px;
        line-height: 1.2;
    }

    .profile__sidebar button:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .profile__sidebar button.active {
        border-color: #0d6efd;
        color: #0d6efd;
        background: rgba(13, 110, 253, 0.05);
    }

    .profile__sidebar button.change-address-btn,
    .profile__sidebar button.add-address-btn {
        border-color: #198754;
        color: #198754;
        background: rgba(25, 135, 84, 0.05);
    }

    .profile__sidebar button.change-password {
        border-color: #dc3545;
        color: #dc3545;
        background: rgba(220, 53, 69, 0.05);
    }

    .profile__content {
        background: #fff;
        border-radius: 8px;
        padding: 40px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        text-align: center;
    }

    .profile__content h1 {
        font-size: 32px;
        color: #333;
        margin-bottom: 40px;
        font-weight: 600;
        position: relative;
        display: inline-block;
    }

    .profile__content h1:after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 2px;
        background: #0d6efd;
    }

    .profile__content-info {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
    }

    .profile__content-item {
        margin-bottom: 25px;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 8px;
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .profile__content-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .profile__content-label {
        font-size: 14px;
        color: #6c757d;
        margin-bottom: 8px;
        display: block;
    }

    .profile__content-value {
        font-size: 16px;
        color: #333;
        font-weight: 500;
    }

    .profile__content-avatar {
        width: 120px;
        height: 120px;
        margin: 0 auto 30px;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid #e9ecef;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .profile__content-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile__main-header {
        text-align: center;
        margin-bottom: 40px;
        padding-bottom: 20px;
        border-bottom: 2px solid #e9ecef;
    }

    .profile__main-header h1 {
        font-size: 32px;
        color: #333;
        margin-bottom: 0;
        font-weight: 600;
    }

    .profile__main-info {
        max-width: 700px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }

    .profile__info-block {
        padding: 20px;
        background: #f8f9fa;
        border-radius: 8px;
        border: 1px solid #e9ecef;
    }

    .profile__info-block h3 {
        font-size: 16px;
        color: #6c757d;
        margin-bottom: 10px;
        font-weight: 500;
    }

    .profile__info-block p {
        font-size: 18px;
        color: #333;
        margin: 0;
        font-weight: 500;
    }

    .breadcrumb {
        background: transparent;
        padding: 0;
        margin: 20px 0;
        text-align: center;
    }

    .breadcrumb-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-size: 15px;
        color: #6c757d;
    }

    .view__home span {
        color: #0d6efd;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .view__home span:hover {
        color: #0a58ca;
    }

    .breadcrumb_last {
        color: #343a40;
        font-weight: 500;
    }

    /* Form Styles */
    .form-group {
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .form-control {
        border: 2px solid #dee2e6;
        border-radius: 8px;
        padding: 12px;
        width: 100%;
        transition: all 0.3s ease;
        text-align: center;
    }

    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .profile_wrapper {
            padding: 15px;
        }

        .profile__sidebar {
            margin-bottom: 20px;
        }

        .profile__avatar i {
            width: 100px;
            height: 100px;
            font-size: 48px;
        }

        .profile__main-info {
            grid-template-columns: 1fr;
        }

        .profile__content {
            padding: 20px;
        }

        .profile__content h1 {
            font-size: 24px;
            margin-bottom: 30px;
        }

        .profile__content-info {
            padding: 10px;
        }
    }

    /* Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .profile_wrapper {
        animation: fadeIn 0.3s ease-out;
    }

    .profile__header {
        text-align: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e9ecef;
    }

    .profile__header h1 {
        font-size: 28px;
        color: #343a40;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .profile__info {
        background: #fff;
        border-radius: 8px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .profile__info-item {
        margin-bottom: 15px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .profile__info-label {
        font-size: 14px;
        color: #6c757d;
        margin-bottom: 5px;
    }

    .profile__info-value {
        font-size: 16px;
        color: #343a40;
        font-weight: 500;
    }

    .profile__functions {
        background: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="main" id="main">
            <div id="load__address-modal"></div>
            <?php
            include('pages/header.php');
            ?>
            <!-- Breadcrumb -->
            <div class="breadcrumb breadcrumb-shop">
                <div class="breadcrumb-wrapper">
                    <div class="view__home"><span>Trang chủ </span></div>
                    »
                    <span class="breadcrumb_last">Trang cá nhân</span>
                </div>
            </div>

            <div class="row profile_wrapper">
                <div class="col-lg-3 col-md-3 col profile__sidebar">
                    <div class="profile__info">
                        <div class="profile__avatar">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="profile__info-item">
                            <span class="profile__info-value"><?php
                            $sql_user = "SELECT * FROM tbl_user WHERE id_user='$_SESSION[id_user]'";
                            $query_user = mysqli_query($mysqli, $sql_user);
                            $row_user = mysqli_fetch_array($query_user);
                            echo $row_user['name'] ?></span>
                        </div>
                    </div>

                    <div class="profile__functions">
                        <button class="user-detail active">Thông tin chi tiết</button>

                        <?php
                        $sql_address = "SELECT * FROM tbl_user WHERE id_user='$_SESSION[id_user]' LIMIT 1 ";
                        $query_address = mysqli_query($mysqli, $sql_address);
                        $row_address = mysqli_fetch_array($query_address);

                        $sql_province = "SELECT * FROM province WHERE province_id='$row_address[province_id]' LIMIT 1 ";
                        $query_province = mysqli_query($mysqli, $sql_province);
                        $row_province = mysqli_fetch_array($query_province);

                        $sql_district = "SELECT * FROM district WHERE district_id='$row_address[district_id]' LIMIT 1 ";
                        $query_district = mysqli_query($mysqli, $sql_district);
                        $row_district = mysqli_fetch_array($query_district);

                        $sql_wards = "SELECT * FROM wards WHERE wards_id='$row_address[wards_id]' LIMIT 1 ";
                        $query_wards = mysqli_query($mysqli, $sql_wards);
                        $row_wards = mysqli_fetch_array($query_wards);
                        ?>
                        <?php if (strlen($row_address['tendathang']) && strlen($row_address['phonenumber']) && $row_address['province_id'] != 0 && $row_address['district_id'] != 0 && $row_address['wards_id'] != 0) { ?>
                        <button class="change-address-btn">Đổi thông tin</button>
                        <?php } else { ?>
                        <button class="add-address-btn">Thêm thông tin</button>
                        <?php } ?>

                        <button class="change-password">Đổi mật khẩu</button>
                    </div>
                </div>
                <?php
                $sql_user = "SELECT * FROM tbl_user WHERE id_user='$_SESSION[id_user]'";
                $query_user = mysqli_query($mysqli, $sql_user);
                $row_user = mysqli_fetch_array($query_user);
                ?>
                <div class="col-lg-9 col-md-9 col profile__content">
                    <!-- Content will be loaded via AJAX -->
                </div>
            </div>
            <?php
            include('pages/footer.php');
            ?>
        </div>
    </div>
    <script>
    $(document).ready(() => {
        setTimeout(() => {
            $(window).scrollTop(0);
        }, );
        // Lay du lieu thon tin kh
        view_data();

        function view_data() {
            $.post('pages/profile/userDetail.php',
                function(data) {
                    $('.profile__content').html(data)
                })
        }

        // Quay lai trang chu
        $(document).on("click", '.view__home', function() {
            var url = "trang-chu.php";
            window.history.pushState("new", "title", url);
            $(".container").load("trang-chu.php");
        })

        // Vao trang doi mat khau
        $(document).on("click", '.change-password', function(e) {
            e.preventDefault()
            $.ajax({
                url: "pages/profile/changePasswordPage.php",
                dataType: 'html',
                method: "post",
                cache: true,
                success: function(data) {
                    $('.profile__content').empty();
                    $('.profile__content').html(data)
                }
            })
        })

        // Vao trang thong tin chi tiet
        $(document).on("click", '.user-detail', function(e) {
            e.preventDefault()
            $.ajax({
                url: "pages/profile/userDetail.php",
                dataType: 'html',
                method: "post",
                cache: true,
                success: function(data) {
                    view_data()
                }
            })
        })

        // Xu ly sua mat khau
        $(document).on("click", '.suamatkhau', function(e) {
            e.preventDefault();
            var currentPassword = $('.current-password').val();
            var password = $('.password').val();
            var password_confirmation = $('.password_confirmation').val();

            /** VALIDATE START **/
            let errors = {
                currentPasswordError: '',
                passwordError: '',
                passwordConfirmationError: '',
            }

            // Validate current password
            if (currentPassword.length === 0) {
                errors.currentPasswordError = "Không được để trống hiện mật khẩu hiện tại!";
                $('.current-password').css("border-color", "#f33a58");
                swal("Vui lòng nhập lại", errors.currentPasswordError, "error");
            } else if (currentPassword != <?php echo $row_user['password'] ?>) {
                errors.currentPasswordError = "Mật khẩu hiện tại sai";
                $('.current-password').css("border-color", "#f33a58");
                swal("Vui lòng nhập lại", errors.currentPasswordError, "error");
            } else {
                errors.currentPasswordError = '';
                $('.current-password').css("border-color", "#008000ab");
            }

            // Validate password
            if (password.length === 0) {
                errors.passwordError = "Không được để trống mật khẩu!";
                $('.password').css("border-color", "#f33a58");
                swal("Vui lòng nhập lại", errors.passwordError, "error");
            }
            if (password.length <= 6) {
                errors.passwordError = "Mật khẩu phải nhiều hơn 6 ký tự!";
                $('.password').css("border-color", "#f33a58");
                swal("Vui lòng nhập lại", errors.passwordError, "error");
            } else {
                errors.passwordError = '';
                $('.password').css("border-color", "#008000ab");
            }

            // Validate password confirm
            if (password_confirmation.length === 0) {
                errors.passwordConfirmationError = "Không được để trống nhập lại mật khẩu!";
                $('.password_confirmation').css("border-color", "#f33a58");
                swal("Vui lòng nhập lại", errors.passwordConfirmationError, "error");
            } else if (password_confirmation != password) {
                errors.passwordConfirmationError = "Không trùng khớp với mật khẩu!";
                $('.password_confirmation').css("border-color", "#f33a58");
                swal("Vui lòng nhập lại", errors.passwordConfirmationError, "error");
            } else if (password_confirmation.length <= 6) {
                errors.passwordConfirmationError = "Mật khẩu phải nhiều hơn 6 ký tự!";
                $('.password_confirmation').css("border-color", "#f33a58");
                swal("Vui lòng nhập lại", errors.passwordConfirmationError, "error");
            } else {
                errors.passwordConfirmationError = '';
                $('.password_confirmation').css("border-color", "#008000ab");
            }

            /** VALIDATE END **/

            /** SEND DATA **/
            if (errors.currentPasswordError == '' && errors.passwordError == '' && errors
                .passwordConfirmationError == '') {
                $.ajax({
                    url: "pages/profile/handleEvent/handleChangePass.php",
                    data: {
                        password: password,
                    },
                    dataType: 'json',
                    method: "post",
                    cache: true,
                    success: function(data) {
                        swal("OK!", "Đổi mật khẩu thành công", "success");
                    },
                    error: function() {
                        swal("OK!", "Đổi mật khẩu thành công", "success");
                    }
                })
            }

        })

        $(document).on("click", '.add-address-btn', function() {
            $('#load__address-modal').load('pages/checkout/addressModal.php')
        })

        $(document).on("click", '.change-address-btn', function() {
            $('#load__address-modal').load('pages/checkout/editAddressModal.php')
        })

        $(document).on("click", '.address__modal-background', function() {
            $('.address__modal-container').remove()
        })

        $(document).on("click", '.close-add-address-modal', function() {
            $('.address__modal-container').remove()
        })

        const validatePhoneNumber = (phoneNumber) => {
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            if (vnf_regex.test(phoneNumber) == false) {
                return false;
            } else {
                return true;
            }
        }
        $(document).on("click", '.confirm-address-btn', function() {
            var name = $('.name').val();
            var phonenumber = $('.phonenumber').val();
            var province = $('#province').val();
            var district = $('#district').val();
            var wards = $('#wards').val();
            var addressDetail = $('.address-input').val();

            let errors = {
                nameError: '',
                phoneNumberError: '',
                provinceError: '',
                districtError: '',
                wardsError: '',
            }

            if (name.length === 0) {
                errors.nameError = "Không được để trống họ và tên!";
                $('.name-form').css("border-color", "#f33a58");
                swal("Vui lòng nhập lại họ và tên", errors.nameError,
                    "error");
            } else {
                errors.nameError = '';
                $('.name-form').css("border-color", "#008000ab");
                $('.name-error-message').text(errors.nameError);
            }

            if (phonenumber.length === 0) {
                errors.phoneNumberError = "Không được để trống số điện thoại!";
                $('.phonenumber-form').css("border-color", "#f33a58");
                swal("Vui lòng nhập lại số điện thoại", errors.phoneNumberError,
                    "error");
            } else if (validatePhoneNumber(phonenumber) == false) {
                errors.phoneNumberError =
                    "Số điện thoại không hợp lệ!";
                $('.phonenumber-form').css("border-color", "#f33a58");
                swal("Vui lòng nhập lại số điện thoại", errors.phoneNumberError,
                    "error");
            } else {
                errors.phoneNumberError = '';
                $('.phonenumber-form').css("border-color", "#008000ab");
                $('.phonenumber-error-message').text(errors.phoneNumberError);
            }

            if (province.length === 0) {
                errors.provinceError = "Không được để trống!";
                $('.address-form').css("border-color", "#f33a58");
                swal("Vui lòng chọn tỉnh/thành phố", errors.provinceError,
                    "error");
            } else {
                errors.provinceError = '';
                $('.address-form').css("border-color", "#008000ab");
                $('.address-error-message').text(errors.provinceError);
            }

            if (district.length === 0) {
                errors.districtError = "Không được để trống!";
                $('.address-form').css("border-color", "#f33a58");
                swal("Vui lòng chọn quận/huyện", errors.districtError,
                    "error");
            } else {
                errors.districtError = '';
                $('.address-form').css("border-color", "#008000ab");
                $('.address-error-message').text(errors.districtError);
            }

            if (wards.length === 0) {
                errors.wardsError = "Không được để trống!";
                $('.address-form').css("border-color", "#f33a58");
                swal("Vui lòng chọn xã/phường", errors.wardsError,
                    "error");
            } else {
                errors.wardsError = '';
                $('.address-form').css("border-color", "#008000ab");
                $('.address-error-message').text(errors.wardsError);
            }

            if (errors.nameError == '' && errors.phoneNumberError == '' && errors.provinceError == '' &&
                errors.districtError == '' && errors.wardsError == '') {
                $.ajax({
                    url: "pages/checkout/handleUserAddress.php",
                    data: {
                        name: name,
                        phonenumber: phonenumber,
                        province: province,
                        district: district,
                        wards: wards,
                        addressDetail: addressDetail,
                    },
                    dataType: 'json',
                    method: "post",
                    cache: true,
                    success: function(data) {
                        swal("OK!", "Thêm thông tin thành công", "success");
                        view_data()
                    },
                    error: function() {
                        swal("OK!", "Thêm thông tin thành công", "success");
                        view_data()
                    }
                })
            }
        })

        $(document).on("click", '.edit-address-btn', function() {
            var name = $('.name').val();
            var phonenumber = $('.phonenumber').val();
            var province = $('#province').val();
            var district = $('#district').val();
            var wards = $('#wards').val();
            var addressDetail = $('.address-input').val();

            let errors = {
                nameError: '',
                phoneNumberError: '',
                provinceError: '',
                districtError: '',
                wardsError: '',
            }

            if (name.length === 0) {
                errors.nameError = "Không được để trống họ và tên!";
                $('.name-form').css("border-color", "#f33a58");
                swal("Vui lòng nhập lại họ và tên", errors.nameError,
                    "error");
            } else {
                errors.nameError = '';
                $('.name-form').css("border-color", "#008000ab");
                $('.name-error-message').text(errors.nameError);
            }

            if (phonenumber.length === 0) {
                errors.phoneNumberError = "Không được để trống số điện thoại!";
                $('.phonenumber-form').css("border-color", "#f33a58");
                swal("Vui lòng nhập lại số điện thoại", errors.phoneNumberError,
                    "error");
            } else if (validatePhoneNumber(phonenumber) == false) {
                errors.phoneNumberError =
                    "Số điện thoại không hợp lệ!";
                $('.phonenumber-form').css("border-color", "#f33a58");
                swal("Vui lòng nhập lại số điện thoại", errors.phoneNumberError,
                    "error");
            } else {
                errors.phoneNumberError = '';
                $('.phonenumber-form').css("border-color", "#008000ab");
                $('.phonenumber-error-message').text(errors.phoneNumberError);
            }

            if (province.length === 0) {
                errors.provinceError = "Không được để trống!";
                $('.address-form').css("border-color", "#f33a58");
                swal("Vui lòng chọn tỉnh/thành phố", errors.provinceError,
                    "error");
            } else {
                errors.provinceError = '';
                $('.address-form').css("border-color", "#008000ab");
                $('.address-error-message').text(errors.provinceError);
            }

            if (district.length === 0) {
                errors.districtError = "Không được để trống!";
                $('.address-form').css("border-color", "#f33a58");
                swal("Vui lòng chọn quận/huyện", errors.districtError,
                    "error");
            } else {
                errors.districtError = '';
                $('.address-form').css("border-color", "#008000ab");
                $('.address-error-message').text(errors.districtError);
            }

            if (wards.length === 0) {
                errors.wardsError = "Không được để trống!";
                $('.address-form').css("border-color", "#f33a58");
                swal("Vui lòng chọn xã/phường", errors.wardsError,
                    "error");
            } else {
                errors.wardsError = '';
                $('.address-form').css("border-color", "#008000ab");
                $('.address-error-message').text(errors.wardsError);
            }

            if (errors.nameError == '' && errors.phoneNumberError == '' && errors.provinceError == '' &&
                errors.districtError == '' && errors.wardsError == '') {
                $.ajax({
                    url: "pages/checkout/handleUserAddress.php",
                    data: {
                        name: name,
                        phonenumber: phonenumber,
                        province: province,
                        district: district,
                        wards: wards,
                        addressDetail: addressDetail,
                    },
                    dataType: 'json',
                    method: "post",
                    cache: true,
                    success: function(data) {
                        swal("OK!", "Sửa thông tin thành công", "success");
                        view_data()
                    },
                    error: function() {
                        swal("OK!", "Sửa thông tin thành công", "success");
                        view_data()
                    }
                })
            }
        })
    })
    </script>
</body>

</html>