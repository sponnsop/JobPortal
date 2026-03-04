<?php require BASE_PATH . '/app/Views/layouts/header.php'; ?>
<section style="padding:60px 0">
     <div class="container">
          <div class="row">
               <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-default" style="border-top:5px solid #29ca8e;box-shadow:0 2px 15px rgba(0,0,0,.1)">
                         <div class="panel-heading text-center" style="background:#3f51b5;padding:26px;border-radius:0">
                              <h3 style="margin:0;color:#fff;font-family:'Muli',sans-serif">Forgot Password</h3>
                              <p style="color:rgba(255,255,255,.75);margin:5px 0 0;font-size:13px">We'll send you a reset link</p>
                         </div>
                         <div class="panel-body" style="padding:30px">
                              <?php if ($success): ?><div class="alert alert-success"><?php echo $success; ?></div><?php endif; ?>
                              <?php if ($error):   ?><div class="alert alert-danger"><?php echo $error; ?></div><?php endif; ?>
                              <?php if (!$success): ?>
                              <form action="<?php echo SITE_URL; ?>/forgot-password" method="post">
                                   <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter your registered email" required autofocus>
                                   </div>
                                   <button type="submit" class="section-btn btn btn-default btn-block">Send Reset Link</button>
                              </form>
                              <?php endif; ?>
                              <hr>
                              <div class="text-center" style="font-size:13px">
                                   <a href="<?php echo SITE_URL; ?>/login"><i class="fa fa-arrow-left"></i> Back to Login</a>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</section>
<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>
