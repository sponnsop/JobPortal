<?php require BASE_PATH . '/app/Views/layouts/admin-header.php'; ?>

<div class="pg-bar">
     <h2><i class="fa fa-user-circle"></i> My Profile</h2>
</div>

<?php if ($error):   ?><div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error; ?></div><?php endif; ?>
<?php if ($success): ?><div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?></div><?php endif; ?>

<form method="post" action="<?php echo SITE_URL; ?>/admin/profile" enctype="multipart/form-data">
<div class="row">

     <!-- Avatar Card -->
     <div class="col-md-3">
          <div class="adm-card" style="padding:28px;text-align:center">
               <?php
               $src = !empty($user['avatar'])
                    ? SITE_URL.'/uploads/avatars/'.clean($user['avatar'])
                    : 'https://ui-avatars.com/api/?name='.urlencode($user['full_name'] ?? $user['email']).'&size=120&background=29ca8e&color=fff&bold=true';
               ?>
               <img id="av-preview" src="<?php echo $src; ?>"
                    style="width:100px;height:100px;border-radius:50%;object-fit:cover;border:4px solid #29ca8e;margin-bottom:14px">
               <div style="font-weight:700;font-size:15px;color:#252525;margin-bottom:4px"><?php echo htmlspecialchars($user['full_name'] ?? 'Admin'); ?></div>
               <div style="font-size:12px;color:#aaa;margin-bottom:16px"><?php echo htmlspecialchars($user['email']); ?></div>
               <span class="label label-danger" style="font-size:12px;padding:5px 12px">Administrator</span>
               <hr style="margin:18px 0">
               <div class="form-group" style="text-align:left">
                    <label style="font-size:11px;text-transform:uppercase;letter-spacing:.5px;color:#757575;font-weight:700">Profile Photo</label>
                    <div style="border:2px dashed #e0e0e0;border-radius:6px;padding:12px;text-align:center;cursor:pointer;transition:.2s;position:relative;background:#fafafa"
                         onmouseover="this.style.borderColor='#29ca8e'" onmouseout="this.style.borderColor='#e0e0e0'">
                         <input type="file" name="avatar" accept="image/*"
                                style="position:absolute;inset:0;opacity:0;cursor:pointer;width:100%;height:100%"
                                onchange="previewImg(this,'av-preview')">
                         <i class="fa fa-camera" style="font-size:18px;color:#ccc;display:block;margin-bottom:4px"></i>
                         <span style="font-size:11px;color:#aaa">Click to change</span>
                    </div>
               </div>
          </div>
     </div>

     <!-- Info Cards -->
     <div class="col-md-9">

          <!-- Account Info -->
          <div class="adm-card" style="padding:22px;margin-bottom:20px">
               <h4 style="margin:0 0 18px;font-size:14px;padding-bottom:10px;border-bottom:1px solid #f5f5f5">
                    <i class="fa fa-user" style="color:#29ca8e;margin-right:6px"></i> Account Information
               </h4>
               <div class="row">
                    <div class="col-md-6">
                         <div class="form-group">
                              <label>Full Name</label>
                              <input type="text" name="full_name" class="form-control"
                                     value="<?php echo htmlspecialchars($user['full_name'] ?? ''); ?>"
                                     placeholder="Your full name">
                         </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                              <label>Email Address <span style="color:red">*</span></label>
                              <input type="email" name="email" class="form-control"
                                     value="<?php echo htmlspecialchars($user['email']); ?>" required>
                         </div>
                    </div>
               </div>
          </div>

          <!-- Change Password -->
          <div class="adm-card" style="padding:22px;margin-bottom:20px">
               <h4 style="margin:0 0 18px;font-size:14px;padding-bottom:10px;border-bottom:1px solid #f5f5f5">
                    <i class="fa fa-lock" style="color:#3f51b5;margin-right:6px"></i> Change Password
                    <small class="text-muted" style="font-weight:400">(leave blank to keep current)</small>
               </h4>
               <div class="row">
                    <div class="col-md-6">
                         <div class="form-group">
                              <label>New Password</label>
                              <div style="position:relative">
                                   <input type="password" name="password" id="p1" class="form-control" placeholder="Min 8 characters">
                                   <button type="button" onclick="togglePass('p1',this)" style="position:absolute;right:10px;top:50%;transform:translateY(-50%);background:none;border:none;color:#aaa;cursor:pointer"><i class="fa fa-eye"></i></button>
                              </div>
                         </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                              <label>Confirm Password</label>
                              <div style="position:relative">
                                   <input type="password" name="password2" id="p2" class="form-control" placeholder="Repeat password">
                                   <button type="button" onclick="togglePass('p2',this)" style="position:absolute;right:10px;top:50%;transform:translateY(-50%);background:none;border:none;color:#aaa;cursor:pointer"><i class="fa fa-eye"></i></button>
                              </div>
                         </div>
                    </div>
               </div>
          </div>

          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save Changes</button>
     </div>

</div>
</form>

<script>
function previewImg(input, previewId) {
     if (input.files && input.files[0]) {
          var r = new FileReader();
          r.onload = function(e){ document.getElementById(previewId).src = e.target.result; };
          r.readAsDataURL(input.files[0]);
     }
}
function togglePass(id, btn) {
     var i = document.getElementById(id);
     i.type = i.type === 'password' ? 'text' : 'password';
     btn.querySelector('i').className = i.type === 'password' ? 'fa fa-eye' : 'fa fa-eye-slash';
}
</script>

<?php require BASE_PATH . '/app/Views/layouts/admin-footer.php'; ?>
