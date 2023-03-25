<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'html/head.php';
   require_once 'libs/Header.php';
   $TitleHead = Header::ShowHeader('Sản Phẩm Yêu Thích','Trang Những Sản Phẩm Yêu Thích','Heart');
   ?>
</head>

<body>
  <!--================Header Menu Area =================-->
  <?php require_once 'html/header.php' ?>
  <!--================Header Menu Area =================-->

  <!--================Home Banner Area =================-->
  <?= $TitleHead?>
  <!--================End Home Banner Area =================-->

  <!--================Cart Area =================-->
  <section class="cart_area">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src="img/product/single-product/cart-1.jpg" alt="" />
                    </div>
                    <div class="media-body">
                      <p>Minimalistic shop for multipurpose use</p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5>$360.00</h5>
                </td>
                <td>
                  <h5>$720.00</h5>
                </td>
                <td>
                  <h5><a href="#"><i class="ti-close"></i></a></h5>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!--================End Cart Area =================-->

  <!--================ start footer Area  =================-->
  <?php require_once 'html/footer.php' ?>
  <!--================ End footer Area  =================-->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <?php require_once 'html/script.php' ?>
</body>

</html>