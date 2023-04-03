<?php
$queryRan	= "SELECT `name`,`price`,`picture`,`sale_off` FROM " . TBL_PRODUCTS . " ORDER by RAND() LIMIT 4";
$listRandom	    =  $model->fetchAll($queryRan);

$xhtmlRandom	= '';

if (!empty($listRandom)) {
    foreach ($listRandom as $key => $value) {
        $name  				= $value['name'];
        $price  			= $value['price'];
        $picture         	= Helper::createImage('shop', '98x150-', $value['picture']);
        $xhtmlRandom .= sprintf('<div class="col-lg-3 col-md-6">
        <div class="single-product">
          <div class="product-img">
            <img class="img-fluid w-100" %s
            <div class="p_icon">
              <a href="single-product.php"><i class="ti-eye"></i></a>
              <a href="#"><i class="ti-heart"></i></a>
              <a href="#"><i class="ti-shopping-cart"></i></a>
            </div>
          </div>
          <div class="product-btm">
            <a href="#" class="d-block">
            <h4>%s</h4>
            </a>
            <div class="mt-3">
              <span class="mr-4">$%s</span>
              <del>$35.00</del>
            </div>
          </div>
        </div>
      </div>', $picture, $name, $price);
    }
}
?>
<section class="inspired_product_area section_gap_bottom_custom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2><span>Gợi Ý Hôm Nay</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?= $xhtmlRandom ?>
        </div>
    </div>
</section>
