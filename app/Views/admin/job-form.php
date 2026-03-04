<?php require BASE_PATH . '/app/Views/layouts/admin-header.php'; ?>

<div class="pg-bar">
     <h2><i class="fa fa-plus"></i> Add New Job</h2>
     <a href="<?php echo SITE_URL; ?>/admin/jobs" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Back to Jobs</a>
</div>

<?php if ($error): ?>
<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error; ?></div>
<?php endif; ?>

<div class="adm-card" style="padding:24px">
     <form method="post" action="<?php echo SITE_URL; ?>/admin/jobs/create" enctype="multipart/form-data">

          <!-- Basic Info -->
          <div class="adm-card" style="padding:18px;margin-bottom:20px;border-top:2px solid #29ca8e">
               <h4 style="margin:0 0 16px;font-size:14px;color:#252525"><i class="fa fa-info-circle" style="color:#29ca8e;margin-right:6px"></i> Basic Information</h4>
               <div class="row">
                    <div class="col-md-8">
                         <div class="form-group">
                              <label>Job Title <span style="color:red">*</span></label>
                              <input type="text" name="title" class="form-control" placeholder="e.g. Senior PHP Developer" required>
                         </div>
                    </div>
                    <div class="col-md-4">
                         <div class="form-group">
                              <label>Category</label>
                              <select name="category_id" class="form-control">
                                   <option value="0">-- Select Category --</option>
                                   <?php foreach ($categories as $cat): ?>
                                   <option value="<?php echo $cat['id']; ?>"><?php echo clean($cat['name']); ?></option>
                                   <?php endforeach; ?>
                              </select>
                         </div>
                    </div>
               </div>
               <div class="form-group">
                    <label>Job Description <span style="color:red">*</span></label>
                    <textarea name="description" class="form-control" rows="6" placeholder="Describe the role, responsibilities..." required></textarea>
               </div>
               <div class="form-group">
                    <label>Requirements</label>
                    <textarea name="requirements" class="form-control" rows="4" placeholder="List required qualifications, skills..."></textarea>
               </div>
               <div class="form-group">
                    <label>Benefits</label>
                    <textarea name="benefits" class="form-control" rows="3" placeholder="Health insurance, remote work, etc..."></textarea>
               </div>
          </div>

          <!-- Job Details -->
          <div class="adm-card" style="padding:18px;margin-bottom:20px;border-top:2px solid #3f51b5">
               <h4 style="margin:0 0 16px;font-size:14px;color:#252525"><i class="fa fa-briefcase" style="color:#3f51b5;margin-right:6px"></i> Job Details</h4>
               <div class="row">
                    <div class="col-md-3">
                         <div class="form-group">
                              <label>Job Type <span style="color:red">*</span></label>
                              <select name="job_type" class="form-control" required>
                                   <option value="">-- Select --</option>
                                   <option value="full-time">Full Time</option>
                                   <option value="part-time">Part Time</option>
                                   <option value="contract">Contract</option>
                                   <option value="freelance">Freelance</option>
                                   <option value="internship">Internship</option>
                              </select>
                         </div>
                    </div>
                    <div class="col-md-3">
                         <div class="form-group">
                              <label>Work Mode</label>
                              <select name="work_mode" class="form-control">
                                   <option value="on-site">On-site</option>
                                   <option value="remote">Remote</option>
                                   <option value="hybrid">Hybrid</option>
                              </select>
                         </div>
                    </div>
                    <div class="col-md-3">
                         <div class="form-group">
                              <label>Experience Level</label>
                              <select name="experience_level" class="form-control">
                                   <option value="entry">Entry Level</option>
                                   <option value="mid">Mid Level</option>
                                   <option value="senior">Senior Level</option>
                                   <option value="lead">Lead / Manager</option>
                              </select>
                         </div>
                    </div>
                    <div class="col-md-3">
                         <div class="form-group">
                              <label>Application Deadline</label>
                              <input type="date" name="application_deadline" class="form-control">
                         </div>
                    </div>
               </div>
          </div>

          <!-- Salary & Location -->
          <div class="adm-card" style="padding:18px;margin-bottom:20px;border-top:2px solid #009688">
               <h4 style="margin:0 0 16px;font-size:14px;color:#252525"><i class="fa fa-map-marker" style="color:#009688;margin-right:6px"></i> Salary & Location</h4>
               <div class="row">
                    <div class="col-md-2">
                         <div class="form-group">
                              <label>Currency</label>
                              <select name="salary_currency" class="form-control">
                                   <option value="USD">USD</option>
                                   <option value="EUR">EUR</option>
                                   <option value="GBP">GBP</option>
                                   <option value="KHR">KHR</option>
                              </select>
                         </div>
                    </div>
                    <div class="col-md-3">
                         <div class="form-group">
                              <label>Salary Min</label>
                              <input type="number" name="salary_min" class="form-control" placeholder="0" min="0">
                         </div>
                    </div>
                    <div class="col-md-3">
                         <div class="form-group">
                              <label>Salary Max</label>
                              <input type="number" name="salary_max" class="form-control" placeholder="0" min="0">
                         </div>
                    </div>
                    <div class="col-md-2">
                         <div class="form-group">
                              <label>City <span style="color:red">*</span></label>
                              <input type="text" name="location_city" class="form-control" placeholder="Phnom Penh" required>
                         </div>
                    </div>
                    <div class="col-md-2">
                         <div class="form-group">
                              <label>Country</label>
                              <input type="text" name="location_country" class="form-control" placeholder="Cambodia">
                         </div>
                    </div>
               </div>
          </div>

          <!-- Job Image -->
          <div class="adm-card" style="padding:18px;margin-bottom:20px;border-top:2px solid #e53935">
               <h4 style="margin:0 0 16px;font-size:14px;color:#252525"><i class="fa fa-image" style="color:#e53935;margin-right:6px"></i> Job Image</h4>
               <div class="row">
                    <div class="col-md-6">
                         <div class="form-group">
                              <label>Upload Image <small class="text-muted">(JPG, PNG — max 2MB)</small></label>
                              <input type="file" name="job_image" class="form-control" accept="image/jpeg,image/png,image/gif,image/webp">
                         </div>
                    </div>
                    <div class="col-md-6" id="image-preview-wrap" style="display:none">
                         <label>Preview</label>
                         <img id="image-preview" src="" style="max-height:120px;border-radius:4px;border:1px solid #eee;padding:4px">
                    </div>
               </div>
               <script>
               document.querySelector('input[name="job_image"]').addEventListener('change', function() {
                    var file = this.files[0];
                    if (file) {
                         var reader = new FileReader();
                         reader.onload = function(e) {
                              document.getElementById('image-preview').src = e.target.result;
                              document.getElementById('image-preview-wrap').style.display = 'block';
                         };
                         reader.readAsDataURL(file);
                    }
               });
               </script>
          </div>

          <!-- Publishing -->
          <div class="adm-card" style="padding:18px;margin-bottom:20px;border-top:2px solid #f57c00">
               <h4 style="margin:0 0 16px;font-size:14px;color:#252525"><i class="fa fa-bullhorn" style="color:#f57c00;margin-right:6px"></i> Publishing</h4>
               <div class="row">
                    <div class="col-md-4">
                         <div class="form-group">
                              <label>Status</label>
                              <select name="status" class="form-control">
                                   <option value="active">Active — visible on site</option>
                                   <option value="draft">Draft — hidden</option>
                                   <option value="paused">Paused</option>
                              </select>
                         </div>
                    </div>
                    <div class="col-md-4">
                         <div class="form-group">
                              <label>Employer ID <small class="text-muted">(leave 0 for admin-posted)</small></label>
                              <input type="number" name="employer_id" class="form-control" value="0" min="0">
                         </div>
                    </div>
                    <div class="col-md-4">
                         <div class="form-group" style="padding-top:24px">
                              <label>
                                   <input type="checkbox" name="is_featured" value="1">
                                   &nbsp; Mark as Featured Job
                              </label>
                         </div>
                    </div>
               </div>
          </div>

          <div style="display:flex;gap:10px">
               <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save Job</button>
               <a href="<?php echo SITE_URL; ?>/admin/jobs" class="btn btn-default">Cancel</a>
          </div>

     </form>
</div>

<?php require BASE_PATH . '/app/Views/layouts/admin-footer.php'; ?>
