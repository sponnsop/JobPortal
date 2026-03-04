<?php require BASE_PATH . '/app/Views/layouts/header.php'; ?>
<section><div class="container"><div class="text-center">
     <h1>Our Team</h1><br>
     <p class="lead">Meet the passionate people behind <?php echo SITE_NAME; ?>.</p>
</div></div></section>

<section id="team" class="section-background"><div class="container"><div class="row">
<?php
$members = [
     ['John Doe',     'CEO & Founder',    'member1.jpg'],
     ['Jane Doe',     'CTO',              'author-image-2-646x680.jpg'],
     ['Becky Fox',    'Marketing Expert', 'author-image-3-646x680.jpg'],
     ['Daniel Smith', 'Customer Support', 'author-image-4-646x680.jpg'],
];
foreach ($members as [$name, $role, $img]): ?>
     <div class="col-md-3 col-sm-6">
          <div class="team-thumb">
               <div class="team-image"><img src="<?php echo SITE_URL; ?>/assets/images/<?php echo $img; ?>" class="img-responsive" alt=""></div>
               <div class="team-info"><h3><?php echo $name; ?></h3><span><?php echo $role; ?></span></div>
               <ul class="social-icon">
                    <li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-linkedin"></a></li>
               </ul>
          </div>
     </div>
<?php endforeach; ?>
</div></div></section>
<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>
