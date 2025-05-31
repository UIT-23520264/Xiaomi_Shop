<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <?php include('./js/link.php') ?>
</head>

<body>
    <div class="main" id="main">
        <div class="wrapper">
            <form autocomplete="off" class="form" id="form-2">
                <h3 class="heading">Đăng nhập</h3>

                <div class="spacer"></div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="text" placeholder="Nhập email" class="form-control email-user">
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input id="password" type="password" placeholder="Nhập mật khẩu" class="form-control password-user">
                    <span class="form-message"></span>
                </div>

                <div class="form-group ">
                    <div class="confirm-password-wrapper">
                        <label for="confirm-password" class="form-label">Nhập lại mật khẩu</label>
                        <input id="confirm-password" type="password" placeholder="Nhập lại mật khẩu"
                            class="form-control confirm-password-user">
                        <span class="form-message"></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-checkbox">
                        <input id="show-password" type="checkbox">
                        <label for="show-password">Hiển thị mật khẩu</label>
                        <a class="change-password">Quên mật khẩu?</a>
                    </div>
                </div>

                <button class="form-submit login">Đăng nhập</button>
                <button class="form-submit forgot-password" id="form-change-submit">Xác nhận</button>
                <button class="form-submit back-login">Quay lại</button>
            </form>


        </div>
    </div>
</body>

</html>