<?php
// $queryMen	= "SELECT `c`.`name` as `category_name` ,`p`.`id` FROM " . TBL_CATEGORY . " AS `c` LEFT JOIN " . TBL_PRODUCTS . " AS `p` on `c`.id = `p`.category_id AND `c`.id LIMIT 7";

$queryMen    = "SELECT `name`,`id`,`fell` FROM " . TBL_CATEGORY . "";
$queryNu    = "SELECT `name` FROM " . TBL_CATEGORYNU . "";
$queryNews    = "SELECT `category` FROM " . TBL_CATEGORYNEWS . "";
$model     = new Model();

$listCATEGORY            =  $model->fetchAll($queryMen);
$theCategoryNu            =  $model->fetchAll($queryNu);
$theCategoryNews        =  $model->fetchAll($queryNews);

$xhtmlCATEGORY        = '';
$xhtmlNu            = '';
$xhtmlCateNews        = '';

if (!empty($listCATEGORY)) {
    foreach ($listCATEGORY as $key => $value) {
        $name           = $value['name'];
        $id             = $value['id'];
        $fell           = $value['fell'];
        $nameURL        = URL::filterURL($name);
        $link             = URL::createLink('shop', 'product', 'index', array('category_id' => $id), "$nameURL-$id.html");
        $xhtmlCATEGORY .= sprintf('<li class="nav-item">
			<a class="nav-link" href="%s">%s</a></li>', $link, $name);
    }
}
$xhtmlNu = '';
if (!empty($theCategoryNu)) {
    foreach ($theCategoryNu as $key => $value) {
        $name  = $value['name'];
        $xhtmlNu .= sprintf('<li class="nav-item">
      <a class="nav-link" href="#">%s</a></li>', $name);
    }
}

$xhtmlCateNews = '';
if (!empty($theCategoryNews)) {
    foreach ($theCategoryNews as $key => $value) {
        $category  = $value['category'];
        $xhtmlCateNews .= sprintf('<li class="nav-item">
      <a class="nav-link" href="#">%s</a></li>', $category);
    }
}
?>
<div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
    <div class="row w-100 mr-0">
        <div class="col-lg-7 pr-0">
            <ul class="nav navbar-nav center_nav pull-right">
                <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sản Phẩm Nam</a>
                    <ul class="dropdown-menu">
                        <?php echo $xhtmlCATEGORY; ?>
                    </ul>
                </li>
                <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sản Phẩm Nữ</a>
                    <ul class="dropdown-menu">
                        <?php echo $xhtmlNu; ?>
                    </ul>
                </li>
                <li class="nav-item submenu dropdown">
                    <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tin Tức Mỗi Ngày</a>
                    <ul class="dropdown-menu">
                        <?php echo $xhtmlCateNews; ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên Hệ</a>
                </li>
            </ul>
        </div>
        <?php
        $cart    = Session::get('cart');

        $totalItems        = 0;
        $totalPrices    = 0;

        if (!empty($cart)) {
            $totalItems        = array_sum($cart['quantity']);
            $totalPrices    = array_sum($cart['price']);
        }
        $linkViewCart        = URL::createLink('shop', 'user', 'cart', null, 'cart.html');
        ?>
        <div class="col-lg-5 pr-0">
            <ul class="nav navbar-nav navbar-right right_nav pull-right">
                <li class="nav-item" style="padding-top: 20px;">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Tìm Sản Phẩm" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $linkViewCart ?>" class="icons">
                        <i class="ti-shopping-cart"></i>
                    </a> <?php echo $totalItems;?> x items
                </li>
            </ul>
        </div>
    </div>
</div>
</nav>
</div>
</div>
</header>