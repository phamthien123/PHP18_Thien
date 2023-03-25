<!DOCTYPE html>
<html lang="en">
  <head>
  <?php require_once 'html/head.php'; 
   require_once 'libs/Header.php';
   $TitleHead = Header::ShowHeader('Liên Hệ','Hãy Liên Hệ Với Chúng Tôi','Contact');?>
  </head>

  <body>
    <!--================Header Menu Area =================-->
    <?php require_once 'html/header.php' ?>
    <!--================Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    <?= $TitleHead?>
    <!--================End Home Banner Area =================-->

    <!-- ================ contact section start ================= -->
  <section class="section_gap">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Get in Touch</h2>
        </div>
        <div class="col-lg-8 mb-4 mb-lg-0">
          <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder="Enter Message"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject">
                </div>
              </div>
            </div>
            <div class="form-group mt-lg-3">
              <button type="submit" class="main_btn">Send Message</button>
            </div>
          </form>


        </div>

        <div class="col-lg-4">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.6708447263654!2d106.84406731462163!3d10.68263689238521!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31753d9449d9bf53%3A0x609d64f705e2960e!2zTmhhIEjDoG5nIFRp4buHYyBDxrDhu5tpIER1eSBLaGnDqm0!5e0!3m2!1svi!2s!4v1677946903226!5m2!1svi!2s" width="500" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->

    <!--================ start footer Area  =================-->
    <?php require_once 'html/footer.php' ?>
    <!--================ End footer Area  =================-->

    <!--================Contact Success and Error message Area =================-->
    <div id="success" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Thank you</h2>
                    <p>Your message is successfully sent...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals error -->

    <div id="error" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Sorry !</h2>
                    <p> Something went wrong </p>
                </div>
            </div>
        </div>
    </div>
    <!--================End Contact Success and Error message Area =================-->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php require_once 'html/script.php' ?>
</body>

</html>