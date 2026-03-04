<?php require BASE_PATH . '/app/Views/layouts/header.php'; ?>
<section style="padding:60px 0">
     <div class="container">
          <div class="row">
               <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-default" style="border-top:5px solid #29ca8e;box-shadow:0 2px 15px rgba(0,0,0,.1)">
                         <div class="panel-heading text-center" style="background:#3f51b5;padding:26px;border-radius:0">
                              <h3 style="margin:0;color:#fff;font-family:'Muli',sans-serif">Reset Password</h3>
                         </div>
                         <div class="panel-body" style="padding:30px">
                              <?php if ($success): ?><div class="alert alert-success"><?php echo $success; ?></div>
                              <?php elseif ($error): ?><div class="alert alert-danger"><?php echo $error; ?></div>
                              <?php else: ?>
                              <form action="<?php echo SITE_URL; ?>/reset-password?token=<?php echo urlencode($token ?? ''); ?>" method="post">
                                   <div class="form-group">
                                        <label>New Password <small class="text-muted">(min 8 chars)</small></label>
                                        <input type="password" name="password" class="form-control" required autofocus>
                                   </div>
                                   <div class="form-group">
                                        <label>Confirm New Password</label>
                                        <input type="password" name="password2" class="form-control" required>
                                   </div>
                                   <button type="submit" class="section-btn btn btn-default btn-block">Reset Password</button>
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
