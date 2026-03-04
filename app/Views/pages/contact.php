<?php require BASE_PATH . '/app/Views/layouts/header.php'; ?>
<section><div class="container"><div class="text-center">
     <h1>Contact Us</h1><br>
     <p class="lead">We'd love to hear from you. Send a message and we'll respond as soon as possible.</p>
</div></div></section>

<section id="contact"><div class="container"><div class="row">
     <div class="col-md-6 col-sm-12">
          <?php if ($success ?? ''): ?><div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?></div><?php endif; ?>
          <?php if ($error   ?? ''): ?><div class="alert alert-danger"><i class="fa fa-times-circle"></i> <?php echo $error; ?></div><?php endif; ?>
          <form id="contact-form" action="<?php echo SITE_URL; ?>/contact" method="post">
               <div class="col-md-12">
                    <input type="text"  name="name"    class="form-control" placeholder="Full name"     value="<?php echo htmlspecialchars($_POST['name']    ?? ''); ?>" required>
                    <input type="email" name="email"   class="form-control" placeholder="Email address" value="<?php echo htmlspecialchars($_POST['email']   ?? ''); ?>" required>
                    <textarea           name="message" class="form-control" placeholder="Your message" rows="6" required><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
               </div>
               <div class="col-md-4"><input type="submit" class="form-control" value="Send Message"></div>
          </form>
     </div>
     <div class="col-md-6 col-sm-12">
          <div class="contact-image"><img src="<?php echo SITE_URL; ?>/assets/images/contact-1-600x400.jpg" class="img-responsive" alt=""></div>
     </div>
</div></div></section>
<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>
