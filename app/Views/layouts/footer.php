<footer id="footer">
     <div class="container">
          <div class="row">
               <div class="col-md-4 col-sm-6">
                    <div class="footer-info">
                         <div class="section-title"><h2>Headquarter</h2></div>
                         <address><p>212 Barrington Court<br>New York, ABC 10001</p></address>
                         <ul class="social-icon">
                              <li><a href="#" class="fa fa-facebook-square"></a></li>
                              <li><a href="#" class="fa fa-twitter"></a></li>
                              <li><a href="#" class="fa fa-instagram"></a></li>
                         </ul>
                         <p>Copyright &copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?></p>
                    </div>
               </div>
               <div class="col-md-4 col-sm-6">
                    <div class="footer-info">
                         <div class="section-title"><h2>Quick Links</h2></div>
                         <ul class="footer_menu">
                              <li><a href="<?php echo SITE_URL; ?>/">Home</a></li>
                              <li><a href="<?php echo SITE_URL; ?>/jobs">Jobs</a></li>
                              <li><a href="<?php echo SITE_URL; ?>/about">About</a></li>
                              <li><a href="<?php echo SITE_URL; ?>/contact">Contact</a></li>
                              <li><a href="<?php echo SITE_URL; ?>/terms">Terms</a></li>
                         </ul>
                    </div>
               </div>
               <div class="col-md-4 col-sm-12">
                    <div class="footer-info newsletter-form">
                         <div class="section-title"><h2>Newsletter</h2></div>
                         <form action="<?php echo SITE_URL; ?>/contact" method="post">
                              <input type="email" class="form-control" name="email" placeholder="Enter your email">
                              <br>
                              <input type="submit" class="form-control" value="Subscribe">
                         </form>
                    </div>
               </div>
          </div>
     </div>
</footer>

<script src="<?php echo SITE_URL; ?>/assets/js/jquery.js"></script>
<script src="<?php echo SITE_URL; ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo SITE_URL; ?>/assets/js/owl.carousel.min.js"></script>
<script src="<?php echo SITE_URL; ?>/assets/js/smoothscroll.js"></script>
<script src="<?php echo SITE_URL; ?>/assets/js/custom.js"></script>
</body>
</html>
