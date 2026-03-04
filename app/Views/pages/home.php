<?php require BASE_PATH . '/app/Views/layouts/header.php'; ?>

<!-- SLIDER -->
<section id="home" style="padding:0">
     <div class="row">
          <div class="owl-carousel owl-theme home-slider">
               <div class="item item-first"><div class="caption"><div class="container"><div class="col-md-6 col-sm-12">
                    <h1>Find Your Dream Job Today.</h1>
                    <h3>Thousands of jobs across all industries. Start your journey with us.</h3>
                    <a href="<?php echo SITE_URL; ?>/jobs" class="section-btn btn btn-default">Browse Jobs</a>
               </div></div></div></div>
               <div class="item item-second"><div class="caption"><div class="container"><div class="col-md-6 col-sm-12">
                    <h1>Are You an Employer?</h1>
                    <h3>Post a job and find the right candidate fast.</h3>
                    <a href="<?php echo SITE_URL; ?>/register?role=employer" class="section-btn btn btn-default">Post a Job</a>
               </div></div></div></div>
               <div class="item item-third"><div class="caption"><div class="container"><div class="col-md-6 col-sm-12">
                    <h1>Build Your Career</h1>
                    <h3>Upload your CV and let employers find you.</h3>
                    <a href="<?php echo SITE_URL; ?>/register?role=job_seeker" class="section-btn btn btn-default">Get Started</a>
               </div></div></div></div>
          </div>
     </div>
</section>

<main>
<!-- ABOUT SNIPPET -->
<section>
     <div class="container">
          <div class="row"><div class="col-md-12 text-center">
               <h2>About Us</h2><br>
               <p class="lead">We connect talented professionals with great companies. Whether you're looking for your next opportunity or the perfect hire, <?php echo SITE_NAME; ?> has you covered.</p>
          </div></div>
     </div>
</section>

<!-- FEATURED JOBS -->
<section>
     <div class="container">
          <div class="row">
               <div class="col-md-12"><div class="section-title text-center">
                    <h2>Featured Jobs <small>Latest opportunities for you</small></h2>
               </div></div>

               <?php if (!empty($featuredJobs)): ?>
               <?php foreach ($featuredJobs as $job): ?>
               <div class="col-md-4 col-sm-4" style="display:flex;margin-bottom:20px">
                    <div class="courses-thumb courses-thumb-secondary" style="display:flex;flex-direction:column;width:100%">
                         <div class="courses-top">
                              <div class="courses-image" style="height:200px;overflow:hidden;background:#f0f0f0">
                                   <img src="<?php
                                        if (!empty($job['job_image']))
                                             echo SITE_URL.'/uploads/jobs/'.clean($job['job_image']);
                                        elseif (!empty($job['logo']))
                                             echo SITE_URL.'/uploads/logos/'.clean($job['logo']);
                                        else
                                             echo SITE_URL.'/assets/images/product-1-720x480.jpg';
                                   ?>" alt="<?php echo clean($job['title']); ?>"
                                   style="width:100%;height:100%;object-fit:cover;object-position:center;display:block">
                              </div>
                              <div class="courses-date">
                                   <span><i class="fa fa-calendar"></i> <?php echo date('d-m-Y', strtotime($job['created_at'])); ?></span>
                                   <span><i class="fa fa-map-marker"></i> <?php echo clean($job['location_city'] ?? 'Remote'); ?></span>
                                   <span><i class="fa fa-file"></i> <?php echo ucfirst(str_replace('_', ' ', $job['job_type'])); ?></span>
                              </div>
                         </div>
                         <div class="courses-detail" style="flex:1">
                              <h3><a href="<?php echo SITE_URL; ?>/jobs/<?php echo $job['id']; ?>"><?php echo clean($job['title']); ?></a></h3>
                              <?php if (!empty($job['salary_min'])): ?>
                              <p class="lead"><strong>$<?php echo number_format($job['salary_min']); ?></strong></p>
                              <?php else: ?>
                              <p class="lead" style="visibility:hidden;margin:0">&nbsp;</p>
                              <?php endif; ?>
                              <p style="min-height:20px"><?php echo clean($job['company_name'] ?? ' '); ?></p>
                         </div>
                         <div class="courses-info">
                              <a href="<?php echo SITE_URL; ?>/jobs/<?php echo $job['id']; ?>" class="section-btn btn btn-primary btn-block">View Details</a>
                         </div>
                    </div>
               </div>
               <?php endforeach; ?>
               <?php else: ?>
               <div class="col-md-12 text-center">
                    <p class="lead">No featured jobs yet. <a href="<?php echo SITE_URL; ?>/register?role=employer">Post the first job!</a></p>
               </div>
               <?php endif; ?>
          </div>
     </div>
</section>

<!-- LATEST BLOG -->
<section>
     <div class="container">
          <div class="row">
               <div class="col-md-12"><div class="section-title text-center">
                    <h2>Latest Blog Posts <small>Tips, news &amp; updates</small></h2>
               </div></div>

               <?php if (!empty($latestPosts)): ?>
               <?php foreach ($latestPosts as $post): ?>
               <div class="col-md-4 col-sm-4">
                    <div class="courses-thumb courses-thumb-secondary">
                         <div class="courses-top">
                              <div class="courses-image">
                                   <img src="<?php echo !empty($post['featured_image']) ? SITE_URL.'/uploads/blog/'.clean($post['featured_image']) : SITE_URL.'/assets/images/other-1-720x480.jpg'; ?>" class="img-responsive" alt="">
                              </div>
                              <div class="courses-date">
                                   <span><i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($post['published_at'])); ?></span>
                              </div>
                         </div>
                         <div class="courses-detail">
                              <h3><a href="<?php echo SITE_URL; ?>/blog/<?php echo $post['id']; ?>"><?php echo clean($post['title']); ?></a></h3>
                         </div>
                         <div class="courses-info">
                              <a href="<?php echo SITE_URL; ?>/blog/<?php echo $post['id']; ?>" class="section-btn btn btn-primary btn-block">Read More</a>
                         </div>
                    </div>
               </div>
               <?php endforeach; ?>
               <?php else: ?>
               <div class="col-md-12 text-center"><p class="lead">Blog posts coming soon.</p></div>
               <?php endif; ?>
          </div>
     </div>
</section>

<!-- TESTIMONIALS -->
<section id="testimonial">
     <div class="container"><div class="row"><div class="col-md-12">
          <div class="section-title text-center"><h2>Testimonials <small>from our community</small></h2></div>
          <div class="owl-carousel owl-theme owl-client">
               <?php if (!empty($testimonials)): ?>
               <?php foreach ($testimonials as $t): ?>
               <div class="col-md-4 col-sm-4"><div class="item">
                    <div class="tst-image">
                         <img src="<?php echo !empty($t['author_photo']) ? SITE_URL.'/uploads/testimonials/'.clean($t['author_photo']) : SITE_URL.'/assets/images/tst-image-1-200x216.jpg'; ?>" class="img-responsive" alt="">
                    </div>
                    <div class="tst-author"><h4><?php echo clean($t['author_name']); ?></h4><span><?php echo clean($t['author_role'] ?? ''); ?></span></div>
                    <p><?php echo clean($t['content']); ?></p>
                    <div class="tst-rating"><?php for ($i = 1; $i <= ($t['rating'] ?? 5); $i++) echo '<i class="fa fa-star"></i>'; ?></div>
               </div></div>
               <?php endforeach; ?>
               <?php else: ?>
               <div class="col-md-4"><div class="item">
                    <div class="tst-image"><img src="<?php echo SITE_URL; ?>/assets/images/tst-image-1-200x216.jpg" class="img-responsive" alt=""></div>
                    <div class="tst-author"><h4>Jackson</h4><span>Developer</span></div>
                    <p>Great platform for finding quality jobs. Highly recommended!</p>
                    <div class="tst-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
               </div></div>
               <?php endif; ?>
          </div>
     </div></div></div>
</section>
</main>

<!-- CONTACT FORM -->
<section id="contact">
     <div class="container"><div class="row">
          <div class="col-md-6 col-sm-12">
               <form id="contact-form" action="<?php echo SITE_URL; ?>/contact" method="post">
                    <div class="section-title"><h2>Contact Us <small>we love conversations!</small></h2></div>
                    <div class="col-md-12">
                         <input type="text"  class="form-control" name="name"    placeholder="Full name"      required>
                         <input type="email" class="form-control" name="email"   placeholder="Email address"  required>
                         <textarea           class="form-control" name="message" placeholder="Your message" rows="6" required></textarea>
                    </div>
                    <div class="col-md-4"><input type="submit" class="form-control" value="Send Message"></div>
               </form>
          </div>
          <div class="col-md-6 col-sm-12">
               <div class="contact-image">
                    <img src="<?php echo SITE_URL; ?>/assets/images/contact-1-600x400.jpg" class="img-responsive" alt="">
               </div>
          </div>
     </div></div>
</section>

<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>