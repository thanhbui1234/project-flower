<?php require_once './model/categories.php'?>
<?php require_once './model/user.php'?>



<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="" href="/project-flower/index.php"><img src="/project-flower/layout/assets/img/flower.svg"
                alt="..." />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item">
                    <form id="search" action="index.php?act=search" method="post">
                        <input name="search" class="py-1 rounded" type="text">

                        <button id="searchSumit" name="btnSubmitSearch" class="" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>

                    </form>
                </li>
                <li class="nav-item">

                    <div class="dropdown">
                        <?php showCategories()?>

                        <span class=" nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Danh mục
                        </span>
                        <ul class="dropdown-menu">
                            <?Php foreach ($dataCategories as $categories) {?>
                            <li><a class="dropdown-item"
                                    href="/project-flower/index.php?act=category&id=<?Php echo $categories['id'] ?>"><?php echo $categories['name'] ?></a>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#portfolio">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn bg-transparent position-relative">
                        <a href="/project-flower/cart/cart.php">
                            <i class="fa" style="font-size:24px; color:white;">&#xf07a;</i>
                        </a>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary"><?php if (isset($_SESSION['cart']) && sizeof($_SESSION['cart']) > 0) {
    echo sizeof($_SESSION['cart']);
} else {
    echo '0';
}
?></span>
                    </button>
                </li>
                <!-- <li class="nav-item"><a class="nav-link" href="/project-flower/login/login.php">Đăng nhập</a></li> -->
                <?php if (isset($_SESSION['userName'])) {?>
                <li class="nav-item">
                    <div class="dropdown">
                        <span class=" nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">

                            <?php getAvtUser()?>
                            <?php echo $_SESSION['userName'] ?>
                        </span>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/project-flower/index.php?act=profile">Profile</a>
                            </li>
                            <?php echo $_SESSION['role'] == 1 ? '<li><a class="dropdown-item" href="/project-flower/admin">Admin</a>' : ''; ?>
                            <li><a class="dropdown-item" href="index.php?act=order">Đơn mua</a>
                            </li>
                            <li><a class="dropdown-item" href="index.php?act=changepassword">Đổi mật khẩu</a>
                            </li>
                            <li><a class="dropdown-item" href="/project-flower/view/logout/logout.php">Đăng
                                    xuất</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php } else {?>
                <li class="nav-item"><a class="nav-link" href="/project-flower/login/login.php">Đăng nhập</a>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">Thơm phức</div>
        <div class="masthead-heading">Flower </div>
    </div>
</header>

<script src="js/search.js"></script>