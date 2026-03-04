<?php require BASE_PATH . '/app/Views/layouts/admin-header.php'; ?>

<div class="pg-bar">
     <h2><i class="fa fa-envelope"></i> Messages</h2>
     <div style="display:flex;gap:6px">
          <a href="<?php echo SITE_URL; ?>/admin/messages"               class="btn btn-sm <?php echo !$filter?'btn-primary':'btn-default'; ?>">All</a>
          <a href="<?php echo SITE_URL; ?>/admin/messages?filter=unread" class="btn btn-sm <?php echo $filter==='unread'?'btn-primary':'btn-default'; ?>">
               Unread <?php if ($unreadCount > 0): ?><span class="badge" style="background:#29ca8e"><?php echo $unreadCount; ?></span><?php endif; ?>
          </a>
     </div>
</div>

<div class="adm-card">
     <div class="card-head"><h4><i class="fa fa-envelope"></i> Contact Messages (<?php echo count($messages); ?>)</h4></div>
     <table class="table table-hover">
          <thead><tr><th>#</th><th>Name</th><th>Email</th><th>Message</th><th>Status</th><th>Received</th><th>Actions</th></tr></thead>
          <tbody>
          <?php if (empty($messages)): ?>
          <tr><td colspan="7" class="text-center text-muted" style="padding:25px">No messages found.</td></tr>
          <?php else: foreach ($messages as $m): ?>
          <tr style="<?php echo !$m['is_read'] ? 'background:#fffde7' : ''; ?>">
               <td style="color:#999"><?php echo $m['id']; ?></td>
               <td><strong><?php echo clean($m['name']); ?></strong></td>
               <td><a href="mailto:<?php echo clean($m['email']); ?>"><?php echo clean($m['email']); ?></a></td>
               <td style="max-width:280px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                    <small><?php echo clean(substr($m['message'], 0, 120)); ?>...</small>
               </td>
               <td><?php echo $m['is_read'] ? '<span class="label label-default">Read</span>' : '<span class="label label-warning"><i class="fa fa-circle" style="font-size:9px"></i> Unread</span>'; ?></td>
               <td><small><?php echo date('d M Y, H:i', strtotime($m['created_at'])); ?></small></td>
               <td style="white-space:nowrap">
                    <?php if (!$m['is_read']): ?>
                    <a href="<?php echo SITE_URL; ?>/admin/messages?read=<?php echo $m['id']; ?>" class="btn btn-xs btn-success">Mark Read</a>
                    <?php endif; ?>
                    <a href="<?php echo SITE_URL; ?>/admin/messages?delete=<?php echo $m['id']; ?>" class="btn btn-xs btn-danger"
                       onclick="return confirm('Delete this message?')">Delete</a>
               </td>
          </tr>
          <?php endforeach; endif; ?>
          </tbody>
     </table>
</div>

<?php require BASE_PATH . '/app/Views/layouts/admin-footer.php'; ?>
