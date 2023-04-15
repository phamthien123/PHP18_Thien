<?php

$xhtml1 = '';
$cateID   = '';

if (isset($this->arrParam['category_id'])) {
  $cateID  = $this->arrParam['category_id'];
}

if (!empty($this->categoryName)) {
  foreach ($this->categoryName as $key => $value) {
    $name = $value['name'];
    $id    = $value['id'];
    $nameURL    = URL::filterURL($name);
    $link       = URL::createLink('shop', 'product', 'index', array('category_id' => $id), "$nameURL-$id.html");
    if ($cateID == $id) {
      $xhtml1  .= '<li class="active"><a href="' . $link . '">' . $name . '</a></li>';
    } else {
      $xhtml1  .= '<li><a href="' . $link . '">' . $name . '</a></li>';
    }
  }
}

$xhtml = '';
if (!empty($this->Items)) {
  foreach ($this->Items  as $key => $value) {
    $name         = $value['name'];
    $price        = $value['price'];
    $sale_off     = $value['sale_off'];
    // $description  = substr($value['description'], 0, 200);
    $bookID      = $value['id'];
    $catID        = $value['category_id'];
    $bookNameURL  = URL::filterURL($name);
    $link  = URL::createLink('shop', 'product', 'detail', array('category_id' => $value['category_id'], 'product_id' => $value['id']));
    $picture      = Helper::createImage('shop', '98x150-', $value['picture']);
    $xhtml .= '<div class="col-lg-4 col-md-6">
                  <div class="single-product">
                    <div class="product-img">
                      <img class="card-img" ' . $picture . '/>
                      <div class="p_icon">
                        <a href="#"><i class="ti-eye"></i></a>
                        <a href="#"><i class="ti-heart"></i></a>
                        <a href="#"><i class="ti-shopping-cart"></i></a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="' . $link . '" class="d-block">
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
$arrStatus			= array('default' => '- Select Status -', 'pa' => 'Giá Tăng dần', 'pd' => 'Giá Giảm dần');
$selectboxStatus	= Helper::cmsSelectbox('filter_price','sorting', $arrStatus);

$paginationHTML		= $this->pagination->showPagination(URL::createLink('shop', 'product', 'index'));

$TitleHead = Helper::ShowHeader('Danh Mục Cho Nam', 'Quần - Áo Uy tín nhất Việt Nam', 'Q&A');
?>
<?= $TitleHead ?>
</select>
<section class="cat_product_area section_gap">
  <div class="container">
    <div class="row flex-row-reverse">
      <div class="col-lg-9">
        <div class="product_top_bar">
          <div class="left_dorp">
            <?= $selectboxStatus ?>
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

          <form name="search_something" action=/index method="get">
            <aside class="left_widgets p_filter_widgets">
              <div class="l_w_title">
                <h3>Product Brand</h3>
              </div>
              <div class="widgets_inner">
                <ul class="list">
                  <input type="checkbox" name="choice" value="choice1">Choice 1<br>
                  <input type="checkbox" name="choice" value="choice2">Choice 2<br>
                  <input type="checkbox" name="choice" value="choice3">Choice 3<br>
                  <input type="checkbox" name="choice" value="choice4">Choice 4<p>
                  <ul>
              </div>
            </aside>

            <aside class="left_widgets p_filter_widgets">
              <div class="l_w_title">
                <h3>Color Filter</h3>
              </div>
              <div class="widgets_inner">
                <!-- <ul class="list">
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
              </ul> -->
                <input type="checkbox" name="price" value="price1">P 1<br>
                <input type="checkbox" name="price" value="price2">P 2<br>
                <input type="checkbox" name="price" value="price3">P 3<br>
                <input type="checkbox" name="price" value="price4">P 4<p>
                  <input type="button" id="btnSearch" value="Search">
              </div>
            </aside>
          </form>
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