<?php require BASE_PATH . '/app/Views/layouts/header.php'; ?>
<section><div class="container"><div class="text-center">
     <h1>Blog</h1><br>
     <p class="lead">Career tips, industry news &amp; hiring insights.</p>
</div></div></section>

<section><div class="container">
     <?php if (empty($posts)): ?>
     <div class="text-center"><p class="lead">Blog posts coming soon.</p></div>
     <?php else: ?>
     <div class="row">
          <?php foreach ($posts as $post): ?>
          <div class="col-md-4 col-sm-6">
               <div class="courses-thumb courses-thumb-secondary">
                    <div class="courses-top">
                         <div class="courses-image">
                              <img src="<?php echo !empty($post['featured_image']) ? SITE_URL.'/uploads/blog/'.clean($post['featured_image']) : SITE_URL.'/assets/images/other-1-720x480.jpg'; ?>" class="img-responsive" alt="">
                         </div>
                         <div class="courses-date">
                              <span><i class="fa fa-user"></i> <?php echo clean($post['email']); ?></span>
                              <span><i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($post['published_at'])); ?></span>
                         </div>
                    </div>
                    <div class="courses-detail">
                         <h3><a href="<?php echo SITE_URL; ?>/blog/<?php echo $post['id']; ?>"><?php echo clean($post['title']); ?></a></h3>
                         <?php if (!empty($post['excerpt'])): ?><p><?php echo clean($post['excerpt']); ?></p><?php endif; ?>
                    </div>
                    <div class="courses-info">
                         <a href="<?php echo SITE_URL; ?>/blog/<?php echo $post['id']; ?>" class="section-btn btn btn-primary btn-block">Read More</a>
                    </div>
               </div>
          </div>
          <?php endforeach; ?>
     </div>

     <?php if ($totalPages > 1): ?>
     <div class="text-center">
          <ul class="pagination">
               <?php for ($p = 1; $p <= $totalPages; $p++): ?>
               <li class="<?php echo $p === $currentPage ? 'active' : ''; ?>">
                    <a href="?page=<?php echo $p; ?>"><?php echo $p; ?></a>
               </li>
               <?php endfor; ?>
          </ul>
     </div>
     <?php endif; ?>
     <?php endif; ?>
</div></section>
<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>
