<?php require BASE_PATH . '/app/Views/layouts/admin-header.php'; ?>

<div class="pg-bar"><h2><i class="fa fa-file-text"></i> Applications</h2></div>

<?php $statuses = ['submitted','reviewing','shortlisted','interview','offered','hired','rejected','withdrawn']; ?>
<div style="margin-bottom:18px;display:flex;gap:6px;flex-wrap:wrap">
     <a href="<?php echo SITE_URL; ?>/admin/applications" class="btn btn-sm <?php echo !$statusFilter?'btn-primary':'btn-default'; ?>">All</a>
     <?php foreach ($statuses as $s): ?>
     <a href="<?php echo SITE_URL; ?>/admin/applications?status=<?php echo $s; ?>" class="btn btn-sm <?php echo $statusFilter===$s?'btn-primary':'btn-default'; ?>"><?php echo ucfirst($s); ?></a>
     <?php endforeach; ?>
</div>

<div class="adm-card">
     <div class="card-head"><h4><i class="fa fa-file-text"></i> <?php echo $statusFilter ? ucfirst($statusFilter) : 'All'; ?> Applications (<?php echo count($apps); ?>)</h4></div>
     <table class="table table-hover">
          <thead><tr><th>#</th><th>Applicant</th><th>Job</th><th>Company</th><th>Applied</th><th>Status</th><th>Update Status</th></tr></thead>
          <tbody>
          <?php if (empty($apps)): ?>
          <tr><td colspan="7" class="text-center text-muted" style="padding:25px">No applications found.</td></tr>
          <?php else:
          $ac = ['submitted'=>'primary','reviewing'=>'info','shortlisted'=>'warning','interview'=>'warning','offered'=>'success','hired'=>'success','rejected'=>'danger','withdrawn'=>'default'];
          foreach ($apps as $a): ?>
          <tr>
               <td style="color:#999"><?php echo $a['id']; ?></td>
               <td><small><?php echo clean($a['applicant_email']); ?></small></td>
               <td><small><?php echo clean($a['job_title']); ?></small></td>
               <td><small><?php echo clean($a['company_name'] ?? '–'); ?></small></td>
               <td><small><?php echo date('d M Y', strtotime($a['applied_at'])); ?></small></td>
               <td><span class="label label-<?php echo $ac[$a['status']] ?? 'default'; ?>"><?php echo ucfirst($a['status']); ?></span></td>
               <td>
                    <form method="post" action="<?php echo SITE_URL; ?>/admin/applications/update" style="display:flex;gap:5px">
                         <input type="hidden" name="app_id" value="<?php echo $a['id']; ?>">
                         <select name="status" class="form-control input-sm" style="width:130px">
                              <?php foreach ($statuses as $s): ?>
                              <option value="<?php echo $s; ?>" <?php echo $a['status']===$s?'selected':''; ?>><?php echo ucfirst($s); ?></option>
                              <?php endforeach; ?>
                         </select>
                         <button type="submit" class="btn btn-xs btn-primary">Update</button>
                    </form>
               </td>
          </tr>
          <?php endforeach; endif; ?>
          </tbody>
     </table>
</div>

<?php require BASE_PATH . '/app/Views/layouts/admin-footer.php'; ?>
