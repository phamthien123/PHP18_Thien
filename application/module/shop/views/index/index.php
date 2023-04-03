<?php

$xhtmlProminent = '';
if (!empty($this->theProminent)) {
    foreach ($this->theProminent as $key => $value) {
        $name  = $value['name'];
        $price  = $value['price'];
        $picture         = Helper::createImage('shop', '98x150-', $value['picture']);
        $xhtmlProminent .= sprintf(' <div class="col-lg-4 col-md-6">
        <div class="single-product">
          <div class="product-img">
            <img class="img-fluid w-100" %s 
            <div class="p_icon">
              <a href="#"><i class="ti-eye"></i></a>
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
$xhtmlProductDesc = '';
if (!empty($this->theProductDesc)) {
    foreach ($this->theProductDesc as $key => $value) {
        $name  = $value['name'];
        $price  = $value['price'];
        $picture         = Helper::createImage('shop', '98x150-', $value['picture']);
        $xhtmlProductDesc .= sprintf('<div class="col-lg-6 col-md-6">
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

$xhtmlNews = '';
if (!empty($this->theListNews)) {
    foreach ($this->theListNews as $key => $value) {
        $title              = $value['title'];
        $content            = $value['content'];
        $picture         = Helper::createImage('news', '60x90-', $value['picture']);
        $xhtmlNews  .= sprintf(' <div class="col-lg-4 col-md-6">
        <div class="single-blog">
            <div class="thumb">
                <img class="img-fluid" %s
            </div>
            <div class="short_details">
                <a class="d-block" href="single-blog.html">
                    <h4>%s</h4>
                </a>
                <div class="text-wrap">
                    <p>%s</p>
                </div>
                <a href="#" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
            </div>
        </div>
    </div>', $picture, $title, $content);
    }
}

?>

 <section class="home_banner_area mb-40">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content row">
                <div class="col-lg-12">
                    <h3><span>DK</span> SHOP <br />Personal <span>Style</span></h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="feature_product_area section_gap_bottom_custom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2><span>Sản Phẩm Nổi Bật</span></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <?= $xhtmlProminent ?>
        </div>
    </div>
</section>


<section class="new_product_area section_gap_top section_gap_bottom_custom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2><span>Sản Phẩm Mới Nhất</span></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="new_product">
                    <h5 class="text-uppercase">collection of 2019</h5>
                    <h3 class="text-uppercase">Men’s summer t-shirt</h3>
                    <div class="product-img">
                        <img class="img-fluid" src="<?php echo $imageURL; ?>/product/feature-product/f-p-3.jpg" alt="" />
                    </div>
                    <h4>$120.70</h4>
                    <a href="#" class="main_btn">Add to cart</a>
                </div>
            </div>

            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="row">
                    <?= $xhtmlProductDesc ?>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="blog-area section-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2><span>Tin Tức</span></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <?= $xhtmlNews ?>
        </div>
    </div>
</section>