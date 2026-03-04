<?php require BASE_PATH . '/app/Views/layouts/header.php'; ?>
<section><div class="container">

     <div class="row" style="margin-bottom:20px">
          <div class="col-md-3 col-sm-3">
               <img src="<?php
                    if (!empty($job['job_image']))
                         echo SITE_URL.'/uploads/jobs/'.clean($job['job_image']);
                    elseif (!empty($job['logo']))
                         echo SITE_URL.'/uploads/logos/'.clean($job['logo']);
                    else
                         echo SITE_URL.'/assets/images/product-1-720x480.jpg';
               ?>" alt="" class="img-responsive" style="border-radius:4px">
          </div>
          <div class="col-md-9 col-sm-9">
               <h2 style="margin-top:0"><?php echo clean($job['title']); ?></h2>
               <?php if (!empty($job['company_name'])): ?>
               <p class="lead"><i class="fa fa-building"></i> <?php echo clean($job['company_name']); ?></p>
               <?php endif; ?>
               <p class="lead">
                    <i class="fa fa-map-marker"></i> <?php echo clean($job['location_city'] ?? 'Remote'); ?> &nbsp;
                    <i class="fa fa-file"></i> <?php echo ucfirst(str_replace('_', ' ', $job['job_type'])); ?> &nbsp;
                    <i class="fa fa-laptop"></i> <?php echo ucfirst(str_replace('_', ' ', $job['work_mode'])); ?>
               </p>
               <?php if ($job['salary_visible'] && $job['salary_min']): ?>
               <p><strong class="text-primary" style="font-size:18px">
                    $<?php echo number_format($job['salary_min']); ?>
                    <?php if ($job['salary_max']): ?> &ndash; $<?php echo number_format($job['salary_max']); ?><?php endif; ?>
               </strong> <small class="text-muted">per <?php echo $job['salary_period'] ?? 'year'; ?></small></p>
               <?php endif; ?>
               <?php if (!empty($skills)): ?>
               <p><strong>Skills:</strong>
                    <?php foreach ($skills as $s): ?>
                    <span class="label <?php echo $s['is_required'] ? 'label-primary' : 'label-default'; ?>" style="margin-right:3px"><?php echo clean($s['name']); ?></span>
                    <?php endforeach; ?>
               </p>
               <?php endif; ?>
          </div>
     </div>

     <div class="panel panel-default">
          <div class="panel-heading"><h4><i class="fa fa-align-left"></i> Job Description</h4></div>
          <div class="panel-body">
               <?php echo nl2br(clean($job['description'])); ?>
               <?php if (!empty($job['requirements'])): ?><h4>Requirements</h4><?php echo nl2br(clean($job['requirements'])); ?><?php endif; ?>
               <?php if (!empty($job['benefits'])): ?><h4>Benefits</h4><?php echo nl2br(clean($job['benefits'])); ?><?php endif; ?>
          </div>
     </div>

     <div class="panel panel-default">
          <div class="panel-heading"><h4><i class="fa fa-building"></i> About <?php echo clean($job['company_name'] ?? 'the Company'); ?></h4></div>
          <div class="panel-body">
               <?php if (!empty($job['company_desc'])): ?><p><?php echo nl2br(clean($job['company_desc'])); ?></p><hr><?php endif; ?>
               <div class="row">
                    <div class="col-md-4"><p><small class="text-muted">Company</small><br><strong><?php echo clean($job['company_name'] ?? '–'); ?></strong></p></div>
                    <div class="col-md-4"><p><small class="text-muted">Industry</small><br><strong><?php echo clean($job['industry'] ?? '–'); ?></strong></p></div>
                    <div class="col-md-4"><p><small class="text-muted">Size</small><br><strong><?php echo clean($job['company_size'] ?? '–'); ?></strong></p></div>
               </div>
          </div>
     </div>

     <div class="panel panel-default">
          <div class="panel-heading"><h4><i class="fa fa-paper-plane"></i> Apply for this Job</h4></div>
          <div class="panel-body">
               <?php if ($appSuccess): ?>
               <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $appSuccess; ?></div>
               <?php elseif ($appError): ?>
               <div class="alert alert-danger"><i class="fa fa-times-circle"></i> <?php echo $appError; ?></div>
               <?php endif; ?>
               <?php if (!$appSuccess): ?>
               <form action="<?php echo SITE_URL; ?>/jobs/<?php echo $job['id']; ?>/apply" method="post">
                    <div class="form-group">
                         <label>Cover Letter <small class="text-muted">(optional)</small></label>
                         <textarea name="cover_letter" class="form-control" rows="7"
                                   placeholder="Introduce yourself and explain why you're a great fit..."></textarea>
                    </div>
                    <?php if (isLoggedIn() && userRole() === 'job_seeker'): ?>
                    <button type="submit" class="section-btn btn btn-primary">Submit Application</button>
                    <?php else: ?>
                    <a href="<?php echo SITE_URL; ?>/login" class="section-btn btn btn-primary">Login to Apply</a>
                    <?php endif; ?>
               </form>
               <?php endif; ?>
          </div>
     </div>

     <div style="margin-top:15px"><a href="<?php echo SITE_URL; ?>/jobs"><i class="fa fa-arrow-left"></i> Back to Jobs</a></div>
</div></section>
<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>
