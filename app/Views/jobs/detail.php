<?php require BASE_PATH . '/app/Views/layouts/header.php'; ?>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<section>
     <div class="container">

          <div class="row" style="margin-bottom:20px">
               <div class="col-md-3 col-sm-3">
                    <img src="<?php
                              if (!empty($job['job_image']))
                                   echo SITE_URL . '/uploads/jobs/' . clean($job['job_image']);
                              elseif (!empty($job['logo']))
                                   echo SITE_URL . '/uploads/logos/' . clean($job['logo']);
                              else
                                   echo SITE_URL . '/assets/images/product-1-720x480.jpg';
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
               </div>
          </div>

          <div class="row">
               <div class="col-md-8">
                    <div class="panel panel-default">
                         <div class="panel-heading">
                              <h4><i class="fa fa-align-left"></i> Job Description</h4>
                         </div>
                         <div class="panel-body">
                              <?php echo nl2br(clean($job['description'])); ?>
                              <?php if (!empty($job['requirements'])): ?><h4>Requirements</h4><?php echo nl2br(clean($job['requirements'])); ?><?php endif; ?>
                         </div>
                    </div>
               </div>

               <div class="col-md-4">
                    <div class="panel panel-default">
                         <div class="panel-heading">
                              <h4><i class="fa fa-map-marker"></i> Job Location</h4>
                         </div>
                         <div class="panel-body" style="padding:0;">
                              <div id="jobMap" style="height: 300px; width: 100%;"></div>
                         </div>
                         <div class="panel-footer text-muted small">
                              <i class="fa fa-info-circle"></i> Location: <?php echo clean($job['location_city'] ?? 'Phnom Penh'); ?>
                         </div>
                    </div>
               </div>
          </div>

     </div>
</section>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
     document.addEventListener('DOMContentLoaded', function() {
          // Initialize map - Default coordinates for Cambodia (Phnom Penh)
          var map = L.map('jobMap').setView([11.5564, 104.9282], 13);

          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
               attribution: '&copy; OpenStreetMap contributors'
          }).addTo(map);

          // Add a marker for the job location
          L.marker([11.5564, 104.9282]).addTo(map)
               .bindPopup("<b><?php echo clean($job['title']); ?></b><br><?php echo clean($job['location_city'] ?? 'Phnom Penh'); ?>")
               .openPopup();
     });
</script>

<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>