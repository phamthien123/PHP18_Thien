<!DOCTYPE html>
<html lang="en">
  <head>
  <?php require_once 'html/head.php' ?>
  </head>

  <body>
    <!--================Header Menu Area =================-->
    <?php require_once 'html/header.php';
    require_once 'libs/Header.php';
    $TitleHead = Header::ShowHeader('Danh Mục Cho Nữ','Quần - Áo Uy tín nhất Việt Nam','Q&A');
    ?>
    <!--================Header Menu Area =================-->
    <!--================Home Banner Area =================-->
    <?= $TitleHead?>
    <!--================End Home Banner Area =================-->
    <!--================Category Product Area =================-->
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
                <div class="col-lg-4 col-md-6">
                  <div class="single-product">
                    <div class="product-img">
                      <img
                        class="card-img"
                        src="img/product/inspired-product/i1.jpg"
                        alt=""
                        />
                      <div class="p_icon">
                        <a href="#">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="#">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="#">
                          <i class="ti-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4>Latest men’s sneaker</h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">$25.00</span>
                        <del>$35.00</del>
                      </div>
                    </div>
                  </div>
                </div>
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
                  <h3>Browse Categories</h3>
                </div>
                <div class="widgets_inner">
                  <ul class="list">
                    <li>
                      <a href="#">Frozen Fish</a>
                    </li>
                    <li>
                      <a href="#">Dried Fish</a>
                    </li>
                    <li>
                      <a href="#">Fresh Fish</a>
                    </li>
                    <li>
                      <a href="#">Meat Alternatives</a>
                    </li>
                    <li>
                      <a href="#">Fresh Fish</a>
                    </li>
                    <li>
                      <a href="#">Meat Alternatives</a>
                    </li>
                    <li>
                      <a href="#">Meat</a>
                    </li>
                  </ul>
                </div>
              </aside>

              <aside class="left_widgets p_filter_widgets">
                <div class="l_w_title">
                  <h3>Product Brand</h3>
                </div>
                <div class="widgets_inner">
                  <ul class="list">
                    <li>
                      <a href="#">Apple</a>
                    </li>
                    <li>
                      <a href="#">Asus</a>
                    </li>
                    <li class="active">
                      <a href="#">Gionee</a>
                    </li>
                    <li>
                      <a href="#">Micromax</a>
                    </li>
                    <li>
                      <a href="#">Samsung</a>
                    </li>
                  </ul>
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
                    <!-- <label for="amount">Price : </label> -->
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
    <!--================End Category Product Area =================-->
    <!--================ start footer Area  =================-->
    <?php require_once 'html/footer.php' ?>
    <!--================ End footer Area  =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php require_once 'html/script.php' ?>
  </body>
</html>
