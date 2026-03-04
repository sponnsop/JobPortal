<?php require BASE_PATH . '/app/Views/layouts/admin-header.php'; ?>

<div class="pg-bar">
     <h2><i class="fa fa-tachometer"></i> Dashboard</h2>
     <span style="color:#999;font-size:13px"><i class="fa fa-clock-o"></i> <?php echo date('D, d M Y — H:i'); ?></span>
</div>

<!-- STAT CARDS -->
<div class="row">
     <div class="col-md-2 col-sm-4 col-xs-6"><div class="stat-card bg-green"><i class="fa fa-briefcase ic"></i><h2><?php echo $stats['active_jobs']; ?></h2><p>Active Jobs</p><a href="<?php echo SITE_URL; ?>/admin/jobs">All <?php echo $stats['total_jobs']; ?> &rarr;</a></div></div>
     <div class="col-md-2 col-sm-4 col-xs-6"><div class="stat-card bg-blue"><i class="fa fa-user ic"></i><h2><?php echo $stats['total_seekers']; ?></h2><p>Job Seekers</p><a href="<?php echo SITE_URL; ?>/admin/users?role=job_seeker">View &rarr;</a></div></div>
     <div class="col-md-2 col-sm-4 col-xs-6"><div class="stat-card bg-dark"><i class="fa fa-building ic"></i><h2><?php echo $stats['total_employers']; ?></h2><p>Employers</p><a href="<?php echo SITE_URL; ?>/admin/users?role=employer">View &rarr;</a></div></div>
     <div class="col-md-2 col-sm-4 col-xs-6"><div class="stat-card bg-teal"><i class="fa fa-file-text ic"></i><h2><?php echo $stats['total_apps']; ?></h2><p>Applications</p><a href="<?php echo SITE_URL; ?>/admin/applications">New: <?php echo $stats['new_apps']; ?> &rarr;</a></div></div>
     <div class="col-md-2 col-sm-4 col-xs-6"><div class="stat-card bg-red"><i class="fa fa-envelope ic"></i><h2><?php echo $stats['unread_messages']; ?></h2><p>Unread Messages</p><a href="<?php echo SITE_URL; ?>/admin/messages">View &rarr;</a></div></div>
     <div class="col-md-2 col-sm-4 col-xs-6"><div class="stat-card bg-orange"><i class="fa fa-newspaper-o ic"></i><h2><?php echo $stats['total_blog']; ?></h2><p>Blog Posts</p><a href="#">View &rarr;</a></div></div>
</div>

<!-- QUICK ACTIONS -->
<div class="qk-act">
     <strong>Quick Actions:</strong>
     <a href="<?php echo SITE_URL; ?>/admin/jobs"         class="btn btn-primary btn-sm"><i class="fa fa-briefcase"></i> Manage Jobs</a>
     <a href="<?php echo SITE_URL; ?>/admin/users"        class="btn btn-default btn-sm"><i class="fa fa-users"></i> Manage Users</a>
     <a href="<?php echo SITE_URL; ?>/admin/applications" class="btn btn-default btn-sm"><i class="fa fa-file-text"></i> Applications</a>
     <a href="<?php echo SITE_URL; ?>/admin/settings"     class="btn btn-default btn-sm"><i class="fa fa-cog"></i> Settings</a>
     <?php if ($stats['new_apps'] > 0): ?>
     <a href="<?php echo SITE_URL; ?>/admin/applications?status=submitted" class="btn btn-warning btn-sm">
          <i class="fa fa-bell"></i> <?php echo $stats['new_apps']; ?> New Application<?php echo $stats['new_apps'] > 1 ? 's' : ''; ?>
     </a>
     <?php endif; ?>
</div>

<div class="row">
     <!-- RECENT JOBS -->
     <div class="col-md-7">
          <div class="adm-card">
               <div class="card-head"><h4><i class="fa fa-briefcase"></i> Recent Jobs</h4><a href="<?php echo SITE_URL; ?>/admin/jobs" class="btn btn-default btn-xs">View All</a></div>
               <table class="table table-hover">
                    <thead><tr><th>Title</th><th>Company</th><th>Type</th><th>Status</th><th>Posted</th></tr></thead>
                    <tbody>
                    <?php if (empty($recentJobs)): ?>
                    <tr><td colspan="5" class="text-center text-muted" style="padding:20px">No jobs yet.</td></tr>
                    <?php else: $sc = ['active'=>'success','draft'=>'default','closed'=>'danger','paused'=>'warning','expired'=>'warning']; ?>
                    <?php foreach ($recentJobs as $j): ?>
                    <tr>
                         <td><a href="<?php echo SITE_URL; ?>/jobs/<?php echo $j['id']; ?>" target="_blank"><?php echo clean($j['title']); ?></a></td>
                         <td><small><?php echo clean($j['company_name'] ?? '–'); ?></small></td>
                         <td><small><?php echo ucfirst(str_replace('_', ' ', $j['job_type'])); ?></small></td>
                         <td><span class="label label-<?php echo $sc[$j['status']] ?? 'default'; ?>"><?php echo ucfirst($j['status']); ?></span></td>
                         <td><small><?php echo date('d M Y', strtotime($j['created_at'])); ?></small></td>
                    </tr>
                    <?php endforeach; endif; ?>
                    </tbody>
               </table>
          </div>
     </div>

     <!-- JOBS BY STATUS -->
     <div class="col-md-5">
          <div class="adm-card">
               <div class="card-head"><h4><i class="fa fa-bar-chart"></i> Jobs by Status</h4></div>
               <div style="padding:20px">
                    <?php
                    $colors = ['active'=>'#29ca8e','draft'=>'#909090','closed'=>'#e53935','paused'=>'#f57c00','expired'=>'#ff9800'];
                    $total  = max(1, $stats['total_jobs']);
                    foreach ($jobsByStatus as $s):
                         $pct = round($s['total'] / $total * 100);
                         $col = $colors[$s['status']] ?? '#999';
                    ?>
                    <div style="margin-bottom:14px">
                         <div style="display:flex;justify-content:space-between;margin-bottom:5px">
                              <span style="font-size:13px;font-family:'Muli',sans-serif;font-weight:700"><?php echo ucfirst($s['status']); ?></span>
                              <strong style="font-size:13px"><?php echo $s['total']; ?></strong>
                         </div>
                         <div style="background:#f0f0f0;border-radius:10px;height:8px">
                              <div style="background:<?php echo $col; ?>;width:<?php echo $pct; ?>%;height:8px;border-radius:10px;transition:width .5s"></div>
                         </div>
                    </div>
                    <?php endforeach; ?>
                    <hr style="margin:10px 0">
                    <p style="margin:0;font-size:13px;color:#909090">Total jobs: <strong style="color:#454545"><?php echo $stats['total_jobs']; ?></strong></p>
               </div>
          </div>
     </div>
</div>

<div class="row">
     <!-- RECENT APPLICATIONS -->
     <div class="col-md-6">
          <div class="adm-card">
               <div class="card-head"><h4><i class="fa fa-file-text"></i> Recent Applications</h4><a href="<?php echo SITE_URL; ?>/admin/applications" class="btn btn-default btn-xs">View All</a></div>
               <table class="table table-hover">
                    <thead><tr><th>Applicant</th><th>Job</th><th>Status</th><th>Date</th></tr></thead>
                    <tbody>
                    <?php if (empty($recentApps)): ?>
                    <tr><td colspan="4" class="text-center text-muted" style="padding:20px">No applications yet.</td></tr>
                    <?php else: $ac = ['submitted'=>'primary','reviewing'=>'info','shortlisted'=>'warning','interview'=>'warning','offered'=>'success','hired'=>'success','rejected'=>'danger','withdrawn'=>'default']; ?>
                    <?php foreach ($recentApps as $a): ?>
                    <tr>
                         <td><small><?php echo clean($a['applicant_email']); ?></small></td>
                         <td><small><?php echo clean($a['job_title']); ?></small></td>
                         <td><span class="label label-<?php echo $ac[$a['status']] ?? 'default'; ?>" style="font-size:10px"><?php echo ucfirst($a['status']); ?></span></td>
                         <td><small><?php echo date('d M', strtotime($a['applied_at'])); ?></small></td>
                    </tr>
                    <?php endforeach; endif; ?>
                    </tbody>
               </table>
          </div>
     </div>

     <!-- RECENT USERS -->
     <div class="col-md-6">
          <div class="adm-card">
               <div class="card-head"><h4><i class="fa fa-users"></i> Recent Registrations</h4><a href="<?php echo SITE_URL; ?>/admin/users" class="btn btn-default btn-xs">View All</a></div>
               <table class="table table-hover">
                    <thead><tr><th>Email</th><th>Role</th><th>Status</th><th>Joined</th></tr></thead>
                    <tbody>
                    <?php if (empty($recentUsers)): ?>
                    <tr><td colspan="4" class="text-center text-muted" style="padding:20px">No users yet.</td></tr>
                    <?php else: ?>
                    <?php foreach ($recentUsers as $u): ?>
                    <tr>
                         <td><small><?php echo clean($u['email']); ?></small></td>
                         <td><span class="label label-default" style="font-size:10px"><?php echo ucfirst(str_replace('_', ' ', $u['role'])); ?></span></td>
                         <td><?php echo $u['is_active'] ? '<span class="label label-success" style="font-size:10px">Active</span>' : '<span class="label label-danger" style="font-size:10px">Inactive</span>'; ?></td>
                         <td><small><?php echo date('d M Y', strtotime($u['created_at'])); ?></small></td>
                    </tr>
                    <?php endforeach; endif; ?>
                    </tbody>
               </table>
          </div>
     </div>
</div>

<?php require BASE_PATH . '/app/Views/layouts/admin-footer.php'; ?>
