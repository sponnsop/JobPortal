<?php require BASE_PATH . '/app/Views/layouts/header.php'; ?>
<section><div class="container"><div class="text-center">
     <h1>Browse Jobs</h1><br>
     <p class="lead">Find the perfect opportunity from <strong><?php echo $totalRows; ?></strong> available positions.</p>
</div></div></section>

<section class="section-background"><div class="container">
     <form action="<?php echo SITE_URL; ?>/jobs" method="get">
          <div class="row">
               <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom:10px">
                    <input type="text" name="keyword" class="form-control" placeholder="Job title or keyword"
                           value="<?php echo htmlspecialchars($keyword); ?>">
               </div>
               <div class="col-md-2 col-sm-6 col-xs-12" style="margin-bottom:10px">
                    <input type="text" name="location" class="form-control" placeholder="City or country"
                           value="<?php echo htmlspecialchars($location); ?>">
               </div>
               <div class="col-md-2 col-sm-4 col-xs-12" style="margin-bottom:10px">
                    <select name="category" class="form-control">
                         <option value="">All Categories</option>
                         <?php foreach ($categories as $cat): ?>
                         <option value="<?php echo $cat['id']; ?>" <?php echo $category == $cat['id'] ? 'selected' : ''; ?>>
                              <?php echo clean($cat['name']); ?>
                         </option>
                         <?php endforeach; ?>
                    </select>
               </div>
               <div class="col-md-2 col-sm-4 col-xs-12" style="margin-bottom:10px">
                    <select name="job_type" class="form-control">
                         <option value="">All Types</option>
                         <?php foreach (['full_time'=>'Full Time','part_time'=>'Part Time','contract'=>'Contract','freelance'=>'Freelance','internship'=>'Internship'] as $v=>$l): ?>
                         <option value="<?php echo $v; ?>" <?php echo $job_type === $v ? 'selected' : ''; ?>><?php echo $l; ?></option>
                         <?php endforeach; ?>
                    </select>
               </div>
               <div class="col-md-2 col-sm-4 col-xs-12" style="margin-bottom:10px">
                    <select name="work_mode" class="form-control">
                         <option value="">All Modes</option>
                         <?php foreach (['on_site'=>'On Site','remote'=>'Remote','hybrid'=>'Hybrid'] as $v=>$l): ?>
                         <option value="<?php echo $v; ?>" <?php echo $work_mode === $v ? 'selected' : ''; ?>><?php echo $l; ?></option>
                         <?php endforeach; ?>
                    </select>
               </div>
               <div class="col-md-1 col-xs-12" style="margin-bottom:10px">
                    <button type="submit" class="btn btn-primary btn-block">Go</button>
               </div>
          </div>
     </form>
</div></section>

<section><div class="container">
     <?php if (empty($jobs)): ?>
          <div class="text-center">
               <p class="lead">No jobs found matching your search. <a href="<?php echo SITE_URL; ?>/jobs">Clear filters</a></p>
          </div>
     <?php else: ?>
     <div class="row">
          <?php foreach ($jobs as $job): ?>
          <div class="col-md-4 col-sm-6" style="display:flex;margin-bottom:20px">
               <div class="courses-thumb courses-thumb-secondary" style="display:flex;flex-direction:column;width:100%">
                    <div class="courses-top">
                         <div class="courses-image" style="position:relative;height:200px;overflow:hidden;background:#f0f0f0">
                              <img src="<?php
                                   if (!empty($job['job_image']))
                                        echo SITE_URL.'/uploads/jobs/'.clean($job['job_image']);
                                   elseif (!empty($job['logo']))
                                        echo SITE_URL.'/uploads/logos/'.clean($job['logo']);
                                   else
                                        echo SITE_URL.'/assets/images/product-1-720x480.jpg';
                              ?>" alt="<?php echo clean($job['title']); ?>"
                              style="width:100%;height:100%;object-fit:cover;object-position:center;display:block">
                              <?php if ($job['is_featured']): ?>
                              <span class="label label-warning" style="position:absolute;top:10px;right:10px;font-size:11px">Featured</span>
                              <?php endif; ?>
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
                         <p class="lead"><strong>$<?php echo number_format($job['salary_min']); ?><?php if ($job['salary_max']): ?> &ndash; $<?php echo number_format($job['salary_max']); ?><?php endif; ?></strong></p>
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
     </div>

     <?php if ($totalPages > 1): ?>
     <div class="text-center">
          <ul class="pagination">
               <?php if ($currentPage > 1): ?>
               <li><a href="?<?php echo http_build_query(array_merge($_GET, ['page' => $currentPage - 1])); ?>">&laquo;</a></li>
               <?php endif; ?>
               <?php for ($p = 1; $p <= $totalPages; $p++): ?>
               <li class="<?php echo $p === $currentPage ? 'active' : ''; ?>">
                    <a href="?<?php echo http_build_query(array_merge($_GET, ['page' => $p])); ?>"><?php echo $p; ?></a>
               </li>
               <?php endfor; ?>
               <?php if ($currentPage < $totalPages): ?>
               <li><a href="?<?php echo http_build_query(array_merge($_GET, ['page' => $currentPage + 1])); ?>">&raquo;</a></li>
               <?php endif; ?>
          </ul>
     </div>
     <?php endif; ?>
     <?php endif; ?>
</div></section>
<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>