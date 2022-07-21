  <!-- ================== Footer  ================== -->

  <!-- <footer>
      <div class="footer-showroom hidden">
          <div class="row">
              <div class="col-sm-8">
                  <h2>Visit our showroom</h2>
                  <p>200 12th Ave, New York, NY 10001, USA</p>
                  <p>
                      Mon - Sat: 10 am - 6 pm &nbsp; &nbsp; | &nbsp; &nbsp; Sun: 12pm
                      - 2 pm
                  </p>
              </div>
              <div class="col-sm-4 text-center">
                  <a href="#" class="btn btn-clean"><span class="icon icon-map-marker"></span> Get directions</a>
                  <div class="call-us h4">
                      <span class="icon icon-phone-handset"></span> 333.278.06622
                  </div>
              </div>
          </div>
      </div>

      <div class="footer-links">
          <div class="row">
              <div class="col-sm-4 col-md-2">
                  <h5>Browse by</h5>
                  <ul>
                      <li><a href="#">Brand</a></li>
                      <li><a href="#">Product</a></li>
                      <li><a href="#">Category</a></li>
                      <li><a href="#">Projects</a></li>
                      <li><a href="#">Sales</a></li>
                  </ul>
              </div>
              <div class="col-sm-4 col-md-2">
                  <h5>Quick links</h5>
                  <ul>
                      <li><a href="#">In-Store Pickup</a></li>
                      <li><a href="#">Gift Cards</a></li>
                      <li><a href="#">Afterpay</a></li>
                      <li><a href="#">Shop</a></li>
                      <li><a href="#">Store Locator</a></li>
                      <li><a href="#">FAQ</a></li>
                  </ul>
              </div>
              <div class="col-sm-4 col-md-2">
                  <h5>Order info</h5>
                  <ul>
                      <li><a href="#">Order Status </a></li>
                      <li><a href="#">Payments</a></li>
                      <li><a href="#">Shipping</a></li>
                      <li><a href="#">Returns</a></li>
                      <li><a href="#">Exchanges</a></li>
                      <li><a href="#">Order history</a></li>
                  </ul>
              </div>
              <div class="col-sm-4 col-md-2">
                  <h5>Customer service</h5>
                  <ul>
                      <li><a href="#">Help Center</a></li>
                      <li><a href="#">Product Recalls</a></li>
                      <li><a href="#">Shipping</a></li>
                      <li><a href="#">Feedback</a></li>
                      <li><a href="#">Store Pickup</a></li>
                      <li><a href="#">Contact us</a></li>
                  </ul>
              </div>
              <div class="col-sm-12 col-md-4">
                  <h5>Sign up for our newsletter</h5>
                  <p>
                      <i>Add your email address to sign up for our monthly emails and
                          to receive promotional offers.</i>
                  </p>
                  <div class="form-group form-newsletter">
                      <input class="form-control" type="text" name="email" value="" placeholder="Email address" />
                      <input type="submit" class="btn btn-main btn-sm" value="Subscribe" />
                  </div>
              </div>
          </div>
      </div>


      <div class="footer-social">
          <div class="row">
              <div class="col-sm-6">
                  <a href="#" target="_blank"><i class="fa fa-download"></i> Download Lager</a>
                  &nbsp; | &nbsp; <a href="#">Sitemap</a> &nbsp; | &nbsp;
                  <a href="#">Privacy policy</a>
              </div>
              <div class="col-sm-6 links">
                  <ul>
                      <li>
                          <a href="#"><i class="fa fa-facebook"></i></a>
                      </li>
                      <li>
                          <a href="#"><i class="fa fa-twitter"></i></a>
                      </li>
                      <li>
                          <a href="#"><i class="fa fa-google-plus"></i></a>
                      </li>
                      <li>
                          <a href="#"><i class="fa fa-youtube"></i></a>
                      </li>
                      <li>
                          <a href="#"><i class="fa fa-instagram"></i></a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </footer> -->
  </div>

  <!--JS files-->
  <!-- <script src="<?= base_url('assets/') ?>js/jquery.min.js"></script> -->
  <!-- <script src="<?= base_url('assets/') ?>js/jquery.bootstrap.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  <script src="<?= base_url('assets/') ?>js/jquery.magnific-popup.js"></script>
  <script src="<?= base_url('assets/') ?>js/jquery.owl.carousel.js"></script>
  <script src="<?= base_url('assets/') ?>js/jquery.ion.rangeSlider.js"></script>
  <script src="<?= base_url('assets/') ?>js/main.js"></script>
  </body>

  </html>

  <script type="text/javascript">
      $(document).ready(function() {
          $('#tmtdate .input-group.date').datepicker({
              todayBtn: "linked",
              keyboardNavigation: false,
              forceParse: false,
              autoclose: true,
              calendarWeeks: true,
              format: "yyyy-mm-dd"
          });
          $('#tmtdate2 .input-group.date').datepicker({
              todayBtn: "linked",
              keyboardNavigation: false,
              forceParse: false,
              autoclose: true,
              calendarWeeks: true,
              format: "yyyy-mm-dd"
          });
      });

      // if (navigator.serviceWorker) {
      //   navigator.serviceWorker.register('<?= base_url() ?>sw.js').then(function(registration) {
      //     console.log('ServiceWorker registration successful with scope:',  registration.scope);
      //   }).catch(function(error) {
      //     console.log('ServiceWorker registration failed:', error);
      //   });
      // }
      const Installer = function(root) {
          let promptEvent;

          const install = function(e) {
              if (promptEvent) {
                  promptEvent.prompt();
                  promptEvent.userChoice
                      .then(function(choiceResult) {
                          // The user actioned the prompt (good or bad).
                          // good is handled in
                          promptEvent = null;
                          root.classList.remove('available');
                      })
                      .catch(function(installError) {
                          // Boo. update the UI.
                          promptEvent = null;
                          root.classList.remove('available');
                      });
              }
          };

          const installed = function(e) {
              promptEvent = null;
              // This fires after onbeforinstallprompt OR after manual add to homescreen.
              root.classList.remove('available');
          };

          const beforeinstallprompt = function(e) {
              promptEvent = e;
              promptEvent.preventDefault();
              root.classList.add('available');
              return false;
          };

          // window.addEventListener('beforeinstallprompt', beforeinstallprompt);
          // window.addEventListener('appinstalled', installed);

          // root.addEventListener('click', install.bind(this));
          // root.addEventListener('touchend', install.bind(this));
      };

      new Installer(document.getElementById('installer'));
  </script>


  <!-- Mainly scripts -->
  <script src="<?= base_url('assets/') ?>js/popper.min.js"></script>
  <script src="<?= base_url('assets/') ?>js/bootstrap.js"></script>
  <script src="<?= base_url('assets/') ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
  <script src="<?= base_url('assets/') ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

  <!-- Date Picker-->
  <script src="<?php echo base_url('assets'); ?>/js/plugins/datapicker/bootstrap-datepicker.js"></script>

  <!-- Custom and plugin javascript -->
  <script src="<?= base_url('assets/') ?>js/inspinia.js"></script>
  <script src="<?= base_url('assets/') ?>js/plugins/pace/pace.min.js"></script>

  <script src="<?= base_url('assets/') ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

  <script src="<?php echo base_url('assets'); ?>/js/plugins/jquery-autocomplete.js"></script>

  <script>
      <?= $this->session->flashdata('msg') ?>
  </script>
  </body>

  </html>