<?php require BASE_PATH . '/app/Views/layouts/admin-header.php'; ?>

<div class="pg-bar"><h2><i class="fa fa-users"></i> Manage Users</h2></div>

<div class="adm-card" style="padding:15px 18px;margin-bottom:20px;border-top:none;border-left:4px solid #29ca8e;border-radius:0 4px 4px 0">
     <form method="get" action="<?php echo SITE_URL; ?>/admin/users" style="display:flex;gap:10px;align-items:center;flex-wrap:wrap">
          <input type="text" name="search" class="form-control" style="width:220px" placeholder="Search email..." value="<?php echo htmlspecialchars($search); ?>">
          <select name="role" class="form-control" style="width:150px">
               <option value="">All Roles</option>
               <option value="job_seeker" <?php echo $roleFilter==='job_seeker'?'selected':''; ?>>Job Seeker</option>
               <option value="employer"   <?php echo $roleFilter==='employer'  ?'selected':''; ?>>Employer</option>
               <option value="admin"      <?php echo $roleFilter==='admin'     ?'selected':''; ?>>Admin</option>
          </select>
          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Filter</button>
          <a href="<?php echo SITE_URL; ?>/admin/users" class="btn btn-default">Clear</a>
          <span class="text-muted" style="margin-left:auto;font-size:13px"><?php echo count($users); ?> user<?php echo count($users) !== 1 ? 's' : ''; ?></span>
     </form>
</div>

<div class="adm-card">
     <div class="card-head"><h4><i class="fa fa-users"></i> All Users</h4></div>
     <table class="table table-hover">
          <thead><tr><th>#</th><th>Email</th><th>Role</th><th>Active</th><th>Verified</th><th>Joined</th><th>Actions</th></tr></thead>
          <tbody>
          <?php if (empty($users)): ?>
          <tr><td colspan="7" class="text-center text-muted" style="padding:25px">No users found.</td></tr>
          <?php else: foreach ($users as $u): ?>
          <tr>
               <td style="color:#999"><?php echo $u['id']; ?></td>
               <td><?php echo clean($u['email']); ?></td>
               <td><span class="label label-<?php echo $u['role']==='admin'?'danger':($u['role']==='employer'?'primary':'default'); ?>"><?php echo ucfirst(str_replace('_',' ',$u['role'])); ?></span></td>
               <td><?php echo $u['is_active'] ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>'; ?></td>
               <td><?php echo $u['email_verified'] ? '<span class="label label-success">Yes</span>' : '<span class="label label-default">No</span>'; ?></td>
               <td><small><?php echo date('d M Y', strtotime($u['created_at'])); ?></small></td>
               <td>
                    <?php if ($u['role'] !== 'admin'): ?>
                    <a href="<?php echo SITE_URL; ?>/admin/users/toggle/<?php echo $u['id']; ?>"
                       class="btn btn-xs <?php echo $u['is_active'] ? 'btn-warning' : 'btn-success'; ?>"
                       onclick="return confirm('Toggle this user\'s status?')"><?php echo $u['is_active'] ? 'Deactivate' : 'Activate'; ?></a>
                    <a href="<?php echo SITE_URL; ?>/admin/users/delete/<?php echo $u['id']; ?>"
                       class="btn btn-xs btn-danger"
                       onclick="return confirm('Delete this user permanently?')">Delete</a>
                    <?php else: ?><span class="text-muted">—</span><?php endif; ?>
               </td>
          </tr>
          <?php endforeach; endif; ?>
          </tbody>
     </table>
</div>

<?php require BASE_PATH . '/app/Views/layouts/admin-footer.php'; ?>
