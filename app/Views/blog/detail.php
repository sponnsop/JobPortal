<?php require BASE_PATH . '/app/Views/layouts/header.php'; ?>
<section><div class="container">
     <div class="row">
          <div class="col-md-8 col-xs-12">
               <?php if ($post): ?>
               <h2><?php echo clean($post['title']); ?></h2>
               <p class="lead" style="color:#909090">
                    <i class="fa fa-user"></i> <?php echo clean($post['author_email']); ?> &nbsp;&nbsp;
                    <i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($post['published_at'])); ?>
               </p>
               <img src="<?php echo !empty($post['featured_image']) ? SITE_URL.'/uploads/blog/'.clean($post['featured_image']) : SITE_URL.'/assets/images/other-image-fullscreen-1-1920x700.jpg'; ?>" class="img-responsive" alt="">
               <br>
               <div style="line-height:1.9"><?php echo $post['content']; ?></div>
               <?php else: ?>
               <h2>Blog Post Not Found</h2>
               <p><a href="<?php echo SITE_URL; ?>/blog">&larr; Back to Blog</a></p>
               <?php endif; ?>

               <hr>
               <h4>Leave a Comment</h4>
               <form action="" method="post" class="form">
                    <div class="row">
                         <div class="col-sm-6"><div class="form-group"><label>Name</label><input type="text" name="name" class="form-control" required></div></div>
                         <div class="col-sm-6"><div class="form-group"><label>Email</label><input type="email" name="email" class="form-control" required></div></div>
                    </div>
                    <div class="form-group"><label>Comment</label><textarea name="comment" class="form-control" rows="6" required></textarea></div>
                    <button type="submit" class="section-btn btn btn-primary">Post Comment</button>
               </form>
          </div>

          <div class="col-md-4 col-xs-12">
               <h4>Recent Posts</h4>
               <ul class="list">
                    <?php foreach ($recentPosts as $rp): ?>
                    <li><a href="<?php echo SITE_URL; ?>/blog/<?php echo $rp['id']; ?>"><?php echo clean($rp['title']); ?></a></li>
                    <?php endforeach; ?>
               </ul>
               <br>
               <a href="<?php echo SITE_URL; ?>/blog"><i class="fa fa-arrow-left"></i> All Posts</a>
          </div>
     </div>
</div></section>
<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>
