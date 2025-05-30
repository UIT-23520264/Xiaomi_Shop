<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>

</head>

<body>
    <div class="main-background"></div>
    <div class="app-container">
        <div class="main" id="main">

            <div class="app-content">
                <div class="app-content-header">
                    <h1 class="app-content-headerText">Khách hàng</h1>
                </div>

                <div class="app-content-actions">
                    <div class="app-content-actions-wrapper" style="margin:0;">
                        <input class="search-bar" placeholder="Tìm kiếm..." type="text">
                    </div>
                    <div class="app-content-actions-wrapper">
                        <div class="filter-button-wrapper">
                            <button class="action-button filter jsFilter"><span>Lọc</span><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-filter">
                                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                                </svg></button>
                            <div class="filter-menu-cate">
                                <label>Ngày tạo</label>
                                <select class="filter_dated">
                                    <option value="2">Tất cả</option>
                                    <option value="1">Mới nhất</option>
                                    <option value="0">Cũ nhất</option>
                                </select>
                                <div class="filter-menu-buttons">
                                    <button type="reset" class="filter-button reset">
                                        Đặt lại
                                    </button>
                                    <button class="filter-button apply">
                                        Áp dụng
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php
                        //if ($row_privilege['delete_all_user'] == 1) {
                        ?>
                        <div class="filter-button-wrapper">
                            <button class="action-button delete-all-product">Xóa tất cả khách hàng</button>
                        </div>
                        <?php // } 
                        ?>
                    </div>
                </div>

                <div class="products-area-wrapper tableView">
                    <div class="products-header">
                        <div class="product-cell col-1-5 image">Thứ tự</div>
                        <div class="product-cell col user">Tên khách hàng</div>
                        <div class="product-cell col user">Số điện thoại</div>
                        <div class="product-cell col sales">Ngày tạo</div>
                        <?php
                        //if ($row_privilege['detail_user'] == 1) {
                        ?>
                        <div class="product-cell col price">Chi tiết</div>
                        <?php // } 
                        ?>
                        <?php
                        // if ($row_privilege['delete_user'] == 1) {
                        ?>
                        <div class="product-cell col-1 price">Xóa</div>
                        <?php // } 
                        ?>

                    </div>
                    <div id="load_user_data"></div>
                    <div id="view-add-user"></div>
                    <div id="view-detail-user"></div>
                    <div id="view-edit-user"></div>
                </div>



            </div>
        </div>
    </div>
</body>

</html>