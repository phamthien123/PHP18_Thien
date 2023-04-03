<?php



$xhtml = '';
if (!empty($this->Items)) {
  foreach ($this->Items  as $key => $value) {

    $name         = $value['name'];
    $price        = $value['price'];
    $sale_off     = $value['sale_off'];
    // $description  = substr($value['description'], 0, 200);
    $picture       = Helper::createImage('shop', '98x150-', $value['picture']);
    $xhtml .= '<div class="col-lg-4 col-md-6">
                  <div class="single-product">
                    <div class="product-img">
                      <img class="card-img" ' . $picture . '
                      <div class="p_icon">
                        <a href="#"><i class="ti-eye"></i></a>
                        <a href="#"><i class="ti-heart"></i></a>
                        <a href="#"><i class="ti-shopping-cart"></i></a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4>' . $name . '</h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">$' . $price . '</span>
                        <del>$' . $sale_off . '</del>
                      </div>
                    </div>
                  </div>
            </div>';
  }
}

$xhtml1 = '';
$cateID   = '';

if (isset($this->arrParam['category_id'])) {
  $cateID  = $this->arrParam['category_id'];
}

if (!empty($this->categoryName)) {
  foreach ($this->categoryName as $key => $value) {
    $name = $value['name'];

    if ($cateID == $value['id']) {
      $xhtml1  .= '<li class="active"><a href="#">' . $name . '</a></li>';
    } else {
      $xhtml1  .= '<li><a href="#">' . $name . '</a></li>';
    }
  }
}
$paginationHTML    = $this->pagination->showPagination(URL::createLink('shop', 'product', 'index'));



?>
<!-- <section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container">
      <div class="banner_content d-md-flex justify-content-between
              align-items-center">
        <div class="mb-3 mb-md-0">
          <h2>Danh Mục Cho Nam</h2>
          <h5>Quần - Áo Uy tín nhất Việt Nam</h5>
        </div>
        <div class="page_link">
          <a href="index.html">Home</a>
          <a href="category.html">Shop</a>
          <a href="category.html">Q&A</a>
        </div>
      </div>
    </div>
  </div>
</section> -->

</select>
<section class="cat_product_area section_gap">
  <div class="container">
    <div class="row flex-row-reverse">
      <div class="col-lg-9">
        <div class="product_top_bar">
          <div class="left_dorp">
            <select class="sorting">
              <option value="1">Default sorting</option>
              <option value="2">Default sorting 01</option>
              <option value="4">Default sorting 02</option>
            </select>
            <select class="show">
              <option value="1">Show 12</option>
              <option value="2">Show 14</option>
              <option value="4">Show 16</option>
            </select>
          </div>
        </div>

        <div class="latest_product_inner">
          <div class="row">
            <?= $xhtml ?>
          </div>
        </div>

        <nav class="blog-pagination justify-content-center d-flex">
          <ul class="pagination">
            <li class="page-item">
              <a href="#" class="page-link" aria-label="Previous">
                <span aria-hidden="true">
                  <span class="ti-arrow-left"></span>
                </span>
              </a>
            </li>
            <li class="page-item">
              <a href="#" class="page-link">1</a>
            </li>
            <li class="page-item active">
              <a href="#" class="page-link">2</a>
            </li>
            <li class="page-item">
              <a href="#" class="page-link" aria-label="Next">
                <span aria-hidden="true">
                  <span class="ti-arrow-right"></span>
                </span>
              </a>
            </li>
          </ul>
        </nav>
      </div>

      <div class="col-lg-3">
        <div class="left_sidebar_area">
          <aside class="left_widgets p_filter_widgets">
            <div class="l_w_title">
              <h3>Danh Mục Sẩn Phẩm</h3>
            </div>
            <div class="widgets_inner">
              <ul class="list">
                <?= $xhtml1 ?>
              </ul>
            </div>
          </aside>

          <aside class="left_widgets p_filter_widgets">
            <div class="l_w_title">
              <h3>Product Brand</h3>
            </div>
            <div class="widgets_inner">
            <ul class="list">
              
              <ul>
            </div>
          </aside>

          <aside class="left_widgets p_filter_widgets">
            <div class="l_w_title">
              <h3>Color Filter</h3>
            </div>
            <div class="widgets_inner">
              <ul class="list">
                <li>
                  <a href="#">Black</a>
                </li>
                <li>
                  <a href="#">Black Leather</a>
                </li>
                <li class="active">
                  <a href="#">Black with red</a>
                </li>
                <li>
                  <a href="#">Gold</a>
                </li>
                <li>
                  <a href="#">Spacegrey</a>
                </li>
              </ul>
            </div>
          </aside>
          <aside class="left_widgets p_filter_widgets">
            <div class="l_w_title">
              <h3>Price Filter</h3>
            </div>
            <div class="widgets_inner">
              <div class="range_item">
                <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                <div class="">
                  <p>Value: <span id="demo"></span></p>
                </div>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </div>
</section>

</body>

</html>