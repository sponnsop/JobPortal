<?php require BASE_PATH . '/app/Views/layouts/header.php'; ?>

<style>
.reg-page {
     min-height: 100vh;
     background: linear-gradient(135deg, #f0fdf8 0%, #eef0fb 100%);
     padding: 50px 0 70px;
}
.role-selector {
     display: flex;
     gap: 0;
     border-radius: 8px;
     overflow: hidden;
     box-shadow: 0 4px 20px rgba(0,0,0,0.10);
     margin-bottom: 32px;
     border: 2px solid #e8e8e8;
}
.role-card {
     flex: 1;
     padding: 28px 24px;
     background: #fff;
     cursor: pointer;
     transition: all 0.25s;
     text-align: center;
     border: none;
     outline: none;
     position: relative;
}
.role-card:first-child { border-right: 1px solid #efefef; }
.role-card .role-icon { font-size: 36px; margin-bottom: 10px; display: block; }
.role-card h4 {
     font-family: 'Muli', sans-serif;
     font-weight: 700;
     font-size: 16px;
     margin: 0 0 5px;
     color: #454545;
     transition: color 0.25s;
}
.role-card p { font-size: 12px; color: #999; margin: 0 0 16px; }
.role-card .role-btn {
     display: inline-block;
     padding: 7px 22px;
     border-radius: 50px;
     font-size: 13px;
     font-weight: 700;
     border: 2px solid #ddd;
     color: #999;
     background: transparent;
     transition: all 0.25s;
     font-family: 'Nunito', sans-serif;
}
.role-card.active { background: linear-gradient(135deg, #f0fdf8, #eef0fb); }
.role-card.active h4 { color: #29ca8e; }
.role-card.active .role-btn { background: #29ca8e; border-color: #29ca8e; color: #fff; }
.role-card:not(.active):hover { background: #fafafa; }
.role-card:not(.active):hover .role-btn { border-color: #29ca8e; color: #29ca8e; }
.role-card.active::after {
     content: '';
     position: absolute;
     bottom: 0; left: 0; right: 0;
     height: 3px;
     background: #29ca8e;
}
.reg-card {
     background: #fff;
     border-radius: 8px;
     box-shadow: 0 4px 20px rgba(0,0,0,0.09);
     border-top: 4px solid #29ca8e;
     overflow: hidden;
}
.reg-card-header {
     background: linear-gradient(135deg, #303f9f, #3f51b5);
     padding: 22px 28px;
     display: flex;
     align-items: center;
     gap: 14px;
}
.reg-card-header .hicon {
     width: 42px; height: 42px;
     background: rgba(255,255,255,0.15);
     border-radius: 50%;
     display: flex; align-items: center; justify-content: center;
     font-size: 18px; color: #fff;
}
.reg-card-header h3 { margin: 0; color: #fff; font-family: 'Muli', sans-serif; font-size: 18px; }
.reg-card-header p  { margin: 3px 0 0; color: rgba(255,255,255,0.7); font-size: 12px; }
.reg-card-body { padding: 28px; }
.reg-label {
     font-size: 12px;
     font-weight: 700;
     text-transform: uppercase;
     letter-spacing: 0.6px;
     color: #757575;
     margin-bottom: 5px;
     font-family: 'Muli', sans-serif;
}
.reg-input {
     border: 1.5px solid #e8e8e8 !important;
     border-radius: 6px !important;
     padding: 10px 14px !important;
     font-size: 14px !important;
     font-family: 'Nunito', sans-serif !important;
     transition: border-color 0.2s !important;
     box-shadow: none !important;
     height: auto !important;
}
.reg-input:focus { border-color: #29ca8e !important; box-shadow: 0 0 0 3px rgba(41,202,142,0.1) !important; }
.reg-input-group { position: relative; }
.reg-input-group .reg-input { padding-right: 42px !important; }
.reg-input-group .eye-btn {
     position: absolute;
     right: 12px; top: 50%;
     transform: translateY(-50%);
     background: none; border: none;
     color: #aaa; cursor: pointer;
     font-size: 14px; padding: 0;
     transition: color 0.2s;
}
.reg-input-group .eye-btn:hover { color: #29ca8e; }
.file-upload-wrap {
     border: 2px dashed #e0e0e0;
     border-radius: 6px;
     padding: 16px;
     text-align: center;
     cursor: pointer;
     transition: all 0.2s;
     position: relative;
     background: #fafafa;
}
.file-upload-wrap:hover { border-color: #29ca8e; background: #f0fdf8; }
.file-upload-wrap input[type="file"] {
     position: absolute; inset: 0;
     opacity: 0; cursor: pointer;
     width: 100%; height: 100%;
}
.file-upload-wrap .fu-icon { font-size: 22px; color: #ccc; margin-bottom: 6px; display: block; }
.file-upload-wrap p { margin: 0; font-size: 12px; color: #aaa; }
.file-upload-wrap .fu-name { font-size: 12px; color: #29ca8e; margin-top: 4px; display:none; }
.reg-submit {
     background: linear-gradient(135deg, #22a876, #29ca8e);
     border: none; color: #fff;
     font-family: 'Muli', sans-serif;
     font-weight: 700; font-size: 15px;
     padding: 13px; border-radius: 6px;
     width: 100%; cursor: pointer;
     transition: opacity 0.2s;
     letter-spacing: 0.3px;
}
.reg-submit:hover { opacity: 0.9; }
.reg-alert {
     border-radius: 6px; padding: 12px 16px;
     font-size: 13px; border: none;
     margin-bottom: 20px;
     display: flex; align-items: center; gap: 10px;
}
.reg-alert-danger  { background: #fdf2f2; border-left: 4px solid #e53935; color: #a94442; }
.reg-form-panel { display: none; }
.reg-form-panel.active { display: block; }
@media(max-width:768px) {
     .role-selector { flex-direction: column; }
     .role-card:first-child { border-right: none; border-bottom: 1px solid #efefef; }
}
</style>

<section class="reg-page">
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">

     <div class="text-center" style="margin-bottom:28px">
          <h2 style="font-family:'Muli',sans-serif;font-weight:700;color:#252525;margin:0">Create Your Account</h2>
          <p style="color:#909090;font-size:14px;margin-top:6px">Choose how you'd like to join <?php echo SITE_NAME; ?></p>
     </div>

     <!-- ROLE SELECTOR -->
     <div class="role-selector">
          <div class="role-card <?php echo $role !== 'employer' ? 'active' : ''; ?>" onclick="switchRole('job_seeker')">
               <span class="role-icon">👤</span>
               <h4>Job Seeker</h4>
               <p>Find your dream job</p>
               <span class="role-btn">Register</span>
          </div>
          <div class="role-card <?php echo $role === 'employer' ? 'active' : ''; ?>" onclick="switchRole('employer')">
               <span class="role-icon">🏢</span>
               <h4>Employer</h4>
               <p>Post jobs &amp; hire talent</p>
               <span class="role-btn">Register</span>
          </div>
     </div>

     <?php if ($error): ?>
     <div class="reg-alert reg-alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error; ?></div>
     <?php endif; ?>

     <!-- JOB SEEKER FORM -->
     <div class="reg-form-panel <?php echo $role !== 'employer' ? 'active' : ''; ?>" id="panel-job_seeker">
          <div class="reg-card">
               <div class="reg-card-header">
                    <div class="hicon"><i class="fa fa-user"></i></div>
                    <div>
                         <h3>Job Seeker Registration</h3>
                         <p>Create your profile and start applying to jobs</p>
                    </div>
               </div>
               <div class="reg-card-body">
                    <form action="<?php echo SITE_URL; ?>/register" method="post" enctype="multipart/form-data">
                         <input type="hidden" name="role" value="job_seeker">
                         <div class="row">
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label class="reg-label">Full Name <span style="color:#e53935">*</span></label>
                                        <input type="text" name="full_name" class="form-control reg-input" placeholder="John Doe" value="<?php echo htmlspecialchars($_POST['full_name'] ?? ''); ?>" required>
                                   </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label class="reg-label">Location</label>
                                        <input type="text" name="location" class="form-control reg-input" placeholder="City, Country" value="<?php echo htmlspecialchars($_POST['location'] ?? ''); ?>">
                                   </div>
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="reg-label">Email Address <span style="color:#e53935">*</span></label>
                              <input type="email" name="email" class="form-control reg-input" placeholder="john@example.com" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                         </div>
                         <div class="row">
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label class="reg-label">Password <span style="color:#e53935">*</span></label>
                                        <div class="reg-input-group">
                                             <input type="password" name="password" id="sk-pass" class="form-control reg-input" placeholder="Min 8 characters" required>
                                             <button type="button" class="eye-btn" onclick="togglePass('sk-pass',this)"><i class="fa fa-eye"></i></button>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label class="reg-label">Confirm Password <span style="color:#e53935">*</span></label>
                                        <div class="reg-input-group">
                                             <input type="password" name="password2" id="sk-pass2" class="form-control reg-input" placeholder="Repeat password" required>
                                             <button type="button" class="eye-btn" onclick="togglePass('sk-pass2',this)"><i class="fa fa-eye"></i></button>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="reg-label">Upload CV <span style="color:#aaa;font-weight:400;text-transform:none">(optional — PDF, DOC)</span></label>
                              <div class="file-upload-wrap" id="cv-wrap">
                                   <input type="file" name="cv_file" accept=".pdf,.doc,.docx" onchange="showFileName(this,'cv-wrap','cv-name')">
                                   <i class="fa fa-cloud-upload fu-icon"></i>
                                   <p>Click to upload or drag &amp; drop</p>
                                   <span class="fu-name" id="cv-name"></span>
                              </div>
                         </div>
                         <button type="submit" class="reg-submit"><i class="fa fa-user-plus"></i> &nbsp; Create Job Seeker Account</button>
                    </form>
               </div>
          </div>
     </div>

     <!-- EMPLOYER FORM -->
     <div class="reg-form-panel <?php echo $role === 'employer' ? 'active' : ''; ?>" id="panel-employer">
          <div class="reg-card">
               <div class="reg-card-header">
                    <div class="hicon"><i class="fa fa-building"></i></div>
                    <div>
                         <h3>Employer Registration</h3>
                         <p>Post jobs and find the right candidates fast</p>
                    </div>
               </div>
               <div class="reg-card-body">
                    <form action="<?php echo SITE_URL; ?>/register" method="post" enctype="multipart/form-data">
                         <input type="hidden" name="role" value="employer">
                         <div class="row">
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label class="reg-label">Company Name <span style="color:#e53935">*</span></label>
                                        <input type="text" name="company_name" class="form-control reg-input" placeholder="Acme Corp" value="<?php echo htmlspecialchars($_POST['company_name'] ?? ''); ?>" required>
                                   </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label class="reg-label">Contact Person Name <span style="color:#e53935">*</span></label>
                                        <input type="text" name="full_name" class="form-control reg-input" placeholder="Jane Smith" value="<?php echo htmlspecialchars($_POST['full_name'] ?? ''); ?>" required>
                                   </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label class="reg-label">Email Address <span style="color:#e53935">*</span></label>
                                        <input type="email" name="email" class="form-control reg-input" placeholder="hr@company.com" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                                   </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label class="reg-label">Company Location</label>
                                        <input type="text" name="location" class="form-control reg-input" placeholder="City, Country" value="<?php echo htmlspecialchars($_POST['location'] ?? ''); ?>">
                                   </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label class="reg-label">Password <span style="color:#e53935">*</span></label>
                                        <div class="reg-input-group">
                                             <input type="password" name="password" id="em-pass" class="form-control reg-input" placeholder="Min 8 characters" required>
                                             <button type="button" class="eye-btn" onclick="togglePass('em-pass',this)"><i class="fa fa-eye"></i></button>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label class="reg-label">Confirm Password <span style="color:#e53935">*</span></label>
                                        <div class="reg-input-group">
                                             <input type="password" name="password2" id="em-pass2" class="form-control reg-input" placeholder="Repeat password" required>
                                             <button type="button" class="eye-btn" onclick="togglePass('em-pass2',this)"><i class="fa fa-eye"></i></button>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="reg-label">Company Logo <span style="color:#aaa;font-weight:400;text-transform:none">(optional — JPG, PNG)</span></label>
                              <div class="file-upload-wrap" id="logo-wrap">
                                   <input type="file" name="company_logo" accept="image/jpeg,image/png,image/webp" onchange="showFileName(this,'logo-wrap','logo-name')">
                                   <i class="fa fa-image fu-icon"></i>
                                   <p>Click to upload your company logo</p>
                                   <span class="fu-name" id="logo-name"></span>
                              </div>
                         </div>
                         <button type="submit" class="reg-submit"><i class="fa fa-building"></i> &nbsp; Create Employer Account</button>
                    </form>
               </div>
          </div>
     </div>

     <div class="text-center" style="margin-top:22px;font-size:13px;color:#909090">
          Already have an account? <a href="<?php echo SITE_URL; ?>/login" style="color:#29ca8e;font-weight:700">Sign in here</a>
     </div>

</div>
</div>
</div>
</section>

<script>
function switchRole(role) {
     document.querySelectorAll('.role-card').forEach(function(c){ c.classList.remove('active'); });
     var cards = document.querySelectorAll('.role-card');
     if (role === 'job_seeker') cards[0].classList.add('active');
     else cards[1].classList.add('active');
     document.querySelectorAll('.reg-form-panel').forEach(function(p){ p.classList.remove('active'); });
     document.getElementById('panel-' + role).classList.add('active');
     history.replaceState(null, '', '<?php echo SITE_URL; ?>/register?role=' + role);
}
function togglePass(id, btn) {
     var input = document.getElementById(id);
     var icon  = btn.querySelector('i');
     if (input.type === 'password') { input.type = 'text'; icon.className = 'fa fa-eye-slash'; }
     else { input.type = 'password'; icon.className = 'fa fa-eye'; }
}
function showFileName(input, wrapId, nameId) {
     if (input.files && input.files[0]) {
          var name = document.getElementById(nameId);
          var wrap = document.getElementById(wrapId);
          name.textContent = '✓ ' + input.files[0].name;
          name.style.display = 'block';
          wrap.style.borderColor = '#29ca8e';
          wrap.style.background  = '#f0fdf8';
     }
}
</script>

<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>
