<?php require BASE_PATH . '/app/Views/layouts/admin-header.php'; ?>

<div class="pg-bar"><h2><i class="fa fa-cog"></i> Site Settings</h2></div>

<?php if ($success): ?>
<div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?></div>
<?php endif; ?>

<div style="max-width:580px">
     <div class="adm-card">
          <div class="card-head"><h4><i class="fa fa-sliders"></i> General Settings</h4></div>
          <div style="padding:24px">
               <form method="post" action="<?php echo SITE_URL; ?>/admin/settings">
                    <div class="form-group">
                         <label>Site Name</label>
                         <input type="text" name="site_name" class="form-control"
                                value="<?php echo htmlspecialchars($settings['site_name'] ?? SITE_NAME); ?>">
                    </div>
                    <div class="form-group">
                         <label>Contact Email</label>
                         <input type="email" name="site_email" class="form-control"
                                value="<?php echo htmlspecialchars($settings['site_email'] ?? SITE_EMAIL); ?>">
                    </div>
                    <div class="form-group">
                         <label>Jobs Per Page</label>
                         <input type="number" name="jobs_per_page" class="form-control" min="3" max="50"
                                value="<?php echo htmlspecialchars($settings['jobs_per_page'] ?? '9'); ?>">
                    </div>
                    <div class="form-group">
                         <label>Allow New Registrations</label>
                         <select name="allow_registration" class="form-control">
                              <option value="1" <?php echo ($settings['allow_registration'] ?? '1') === '1' ? 'selected' : ''; ?>>Yes</option>
                              <option value="0" <?php echo ($settings['allow_registration'] ?? '1') === '0' ? 'selected' : ''; ?>>No</option>
                         </select>
                    </div>
                    <div class="form-group">
                         <label>Maintenance Mode</label>
                         <select name="maintenance_mode" class="form-control">
                              <option value="0" <?php echo ($settings['maintenance_mode'] ?? '0') === '0' ? 'selected' : ''; ?>>Off (Site is Live)</option>
                              <option value="1" <?php echo ($settings['maintenance_mode'] ?? '0') === '1' ? 'selected' : ''; ?>>On (Site Under Maintenance)</option>
                         </select>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save Settings</button>
               </form>
          </div>
     </div>
</div>

<?php require BASE_PATH . '/app/Views/layouts/admin-footer.php'; ?>
