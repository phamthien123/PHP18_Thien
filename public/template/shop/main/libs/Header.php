<?php
class Header {
    public static function ShowHeader($title,$desc,$nameLink){
        $xhtml = sprintf('<section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
          <div class="container">
            <div class="banner_content d-md-flex justify-content-between
              align-items-center">
              <div class="mb-3 mb-md-0">
                <h2>%s</h2>
                <h5>%s</h5>
              </div>
              <div class="page_link">
                <a href="index.html">Home</a>
                <a href="category.html">Shop</a>
                <a href="category.html">%s</a>
              </div>
            </div>
          </div>
        </div>
      </section>',$title,$desc,$nameLink);
      return $xhtml;
    }
}
?>