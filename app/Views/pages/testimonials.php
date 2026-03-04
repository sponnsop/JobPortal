<?php require BASE_PATH . '/app/Views/layouts/header.php'; ?>
<section><div class="container"><div class="text-center">
     <h1>Testimonials</h1><br>
     <p class="lead">Hear what our community has to say about <?php echo SITE_NAME; ?>.</p>
</div></div></section>

<section id="testimonial" class="section-background"><div class="container">
<?php if (!empty($testimonials)): ?>
<div class="row">
     <?php foreach ($testimonials as $t): ?>
     <div class="col-sm-4 col-xs-12"><div class="item">
          <div class="tst-image"><img src="<?php echo !empty($t['author_photo']) ? SITE_URL.'/uploads/testimonials/'.clean($t['author_photo']) : SITE_URL.'/assets/images/tst-image-1-200x216.jpg'; ?>" class="img-responsive" alt=""></div>
          <div class="tst-author"><h4><?php echo clean($t['author_name']); ?></h4><span><?php echo clean($t['author_role'] ?? ''); ?></span></div>
          <p><?php echo clean($t['content']); ?></p>
          <div class="tst-rating"><?php for ($i = 1; $i <= ($t['rating'] ?? 5); $i++) echo '<i class="fa fa-star"></i>'; ?></div>
     </div></div>
     <?php endforeach; ?>
</div>
<?php else: ?>
<div class="text-center"><p class="lead">No testimonials yet.</p></div>
<?php endif; ?>
</div></section>
<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>
