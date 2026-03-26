<?php require BASE_PATH . '/app/Views/layouts/header.php'; ?>

<style>
     /* 1. Hero Section */
     .job-hero {
          background: linear-gradient(to right, rgba(15, 23, 42, 0.85), rgba(30, 58, 138, 0.75)), url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover;
          padding: 80px 0 100px;
          text-align: center;
          color: white;
     }

     /* 2. Filter Bar */
     .filter-bar {
          background: #ffffff;
          border-radius: 12px;
          box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
          padding: 15px 25px;
          margin-top: -40px;
          margin-bottom: 40px;
          border: 1px solid #f1f5f9;
          display: flex;
          justify-content: space-between;
          align-items: center;
          flex-wrap: wrap;
          gap: 15px;
     }

     .stat-badge {
          background: #f8fafc;
          border: 1px solid #e2e8f0;
          padding: 6px 14px;
          border-radius: 20px;
          font-size: 13px;
          font-weight: 600;
          color: #475569;
          display: inline-flex;
          align-items: center;
          gap: 8px;
     }

     .dot-gray {
          width: 8px;
          height: 8px;
          border-radius: 50%;
          background: #94a3b8;
     }

     .dot-green {
          width: 8px;
          height: 8px;
          border-radius: 50%;
          background: #10b981;
     }

     /* 3. Job Card */
     .job-card {
          background: #ffffff;
          border-radius: 12px;
          border: 1px solid #f1f5f9;
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
          height: 100%;
          display: flex;
          flex-direction: column;
          transition: transform 0.2s ease, box-shadow 0.2s ease;
          overflow: hidden;
     }

     .job-card:hover {
          transform: translateY(-5px);
          box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
     }

     .job-card-header {
          padding: 25px 20px 15px;
          display: flex;
          gap: 15px;
          border-bottom: 1px solid #f8fafc;
     }

     .company-logo-mini {
          width: 60px;
          height: 60px;
          border-radius: 8px;
          border: 1px solid #f1f5f9;
          object-fit: contain;
          padding: 5px;
          background: #fff;
     }

     .job-title {
          font-size: 18px;
          font-weight: 700;
          color: #1e293b;
          margin-bottom: 4px;
          line-height: 1.2;
     }

     .company-name {
          font-size: 13px;
          color: #64748b;
          font-weight: 600;
     }

     .job-body {
          padding: 15px 20px;
          flex-grow: 1;
     }

     .job-meta {
          font-size: 13px;
          color: #94a3b8;
          margin-bottom: 15px;
          display: flex;
          gap: 15px;
          flex-wrap: wrap;
     }

     .job-meta i {
          color: #cbd5e1;
          margin-right: 4px;
     }

     .job-desc {
          font-size: 14px;
          color: #64748b;
          line-height: 1.6;
          display: -webkit-box;
          -webkit-line-clamp: 3;
          -webkit-box-orient: vertical;
          overflow: hidden;
     }

     .job-footer {
          padding: 15px 20px;
          border-top: 1px solid #f1f5f9;
          display: flex;
          justify-content: space-between;
          align-items: center;
          background: #fafaf9;
     }

     .job-type-badge {
          background: #eef2ff;
          color: #4f46e5;
          font-size: 12px;
          font-weight: 600;
          padding: 6px 12px;
          border-radius: 6px;
     }

     .view-job-btn {
          background: #0f172a;
          color: white;
          font-size: 13px;
          font-weight: 600;
          padding: 8px 20px;
          border-radius: 20px;
          text-decoration: none;
          transition: 0.2s;
     }

     .view-job-btn:hover {
          background: #3b82f6;
          color: white;
          text-decoration: none;
     }

     /* 4. Page Wrapper & Pagination */
     .jobs-page-wrapper {
          background-color: #f8fafc;
          padding-bottom: 80px;
          /* Big space before the footer */
     }

     .custom-pagination {
          display: flex;
          justify-content: center;
          gap: 8px;
          margin-top: 60px;
          margin-bottom: 80px;
     }

     .custom-pagination a {
          padding: 8px 20px;
          border: 1px solid #e2e8f0;
          background: #ffffff;
          color: #64748b;
          border-radius: 8px;
          text-decoration: none;
          font-size: 14px;
          font-weight: 600;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
          transition: all 0.2s ease;
     }

     .custom-pagination a:hover {
          background: #f1f5f9;
          color: #0f172a;
          transform: translateY(-1px);
     }

     .custom-pagination a.active {
          background: #0f172a;
          color: white;
          border-color: #0f172a;
          box-shadow: 0 4px 10px rgba(15, 23, 42, 0.2);
     }
</style>

<div class="job-hero">
     <div class="container">
          <p class="text-uppercase fw-bold mb-2" style="letter-spacing: 2px; font-size: 12px; color: #94a3b8;">Careers</p>
          <h1 class="fw-bold mb-3">Browse Latest Jobs</h1>
          <p style="color: #cbd5e1; font-size: 16px;">Find your dream job from top employers hiring right now.</p>
     </div>
</div>

<div class="jobs-page-wrapper">
     <div class="container pb-5">

          <div class="filter-bar">
               <div class="d-flex gap-3">
                    <div class="stat-badge"><span class="dot-gray"></span> All Jobs: <?= $data['totalRows'] ?? 0 ?></div>
               </div>

               <form action="<?= SITE_URL ?>/jobs" method="GET" class="d-flex align-items-center gap-2">
                    <input type="text" name="keyword" class="form-control form-control-sm border-0 bg-light"
                         placeholder="Search job title or keyword..."
                         value="<?= htmlspecialchars($data['keyword'] ?? '') ?>"
                         style="border-radius: 20px; padding: 8px 15px; width: 250px;">

                    <button type="submit" class="btn btn-sm btn-dark" style="border-radius: 20px; padding: 6px 20px;">Search</button>
                    <a href="<?= SITE_URL ?>/jobs" class="btn btn-sm btn-light border" style="border-radius: 20px; padding: 6px 15px;">Clear</a>
               </form>
          </div>

          <div class="row g-4">
               <?php if (!empty($data['jobs'])): ?>
                    <?php foreach ($data['jobs'] as $job): ?>
                         <div class="col-md-4">
                              <div class="job-card">

                                   <div class="job-card-header">
                                        <?php
                                        // Check if employer has a logo, otherwise use UI Avatars
                                        $logoUrl = !empty($job['logo'])
                                             ? SITE_URL . '/uploads/logos/' . clean($job['logo'])
                                             : 'https://ui-avatars.com/api/?name=' . urlencode($job['company_name'] ?? 'Company') . '&background=0f172a&color=fff&size=120';
                                        ?>
                                        <img src="<?= $logoUrl ?>" alt="Logo" class="company-logo-mini">
                                        <div>
                                             <h3 class="job-title"><?= htmlspecialchars($job['title']) ?></h3>
                                             <div class="company-name"><?= htmlspecialchars($job['company_name'] ?? 'Unknown Company') ?></div>
                                        </div>
                                   </div>

                                   <div class="job-body">
                                        <div class="job-meta">
                                             <span><i class="fa fa-map-marker"></i> <?= htmlspecialchars($job['location_city'] ?? $job['location'] ?? 'Remote') ?></span>
                                             <span><i class="fa fa-money"></i> <?= htmlspecialchars($job['salary_range'] ?? $job['salary'] ?? 'Negotiable') ?></span>
                                        </div>
                                        <p class="job-desc"><?= htmlspecialchars(strip_tags($job['description'])) ?></p>
                                   </div>

                                   <div class="job-footer">
                                        <span class="job-type-badge">
                                             <?= htmlspecialchars(ucfirst(str_replace('_', ' ', $job['job_type'] ?? 'Full-Time'))) ?>
                                        </span>
                                        <a href="<?= SITE_URL ?>/jobs/<?= $job['id'] ?>" class="view-job-btn">View Details</a>
                                   </div>

                              </div>
                         </div>
                    <?php endforeach; ?>
               <?php else: ?>
                    <div class="col-12 text-center py-5">
                         <div class="p-5 bg-white rounded-3 border">
                              <i class="fa fa-search text-muted mb-3" style="font-size: 40px;"></i>
                              <h4 class="fw-bold">No jobs found</h4>
                              <p class="text-muted">Try adjusting your search keywords or clearing the filters.</p>
                              <a href="<?= SITE_URL ?>/jobs" class="btn btn-outline-primary rounded-pill mt-2">View All Jobs</a>
                         </div>
                    </div>
               <?php endif; ?>
          </div>

          <?php
          if (isset($data['totalPages']) && $data['totalPages'] > 1):
               // Helper function to keep search queries in the URL when changing pages
               $queryParams = $_GET;
               function getPageUrl($page, $params)
               {
                    $params['page'] = $page;
                    return '?' . http_build_query($params);
               }
               $currentPage = $data['currentPage'];
          ?>
               <div class="custom-pagination">
                    <?php if ($currentPage > 1): ?>
                         <a href="<?= getPageUrl($currentPage - 1, $queryParams) ?>"><i class="fa fa-angle-left me-1"></i> Prev</a>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $data['totalPages']; $i++): ?>
                         <a href="<?= getPageUrl($i, $queryParams) ?>" class="<?= ($i == $currentPage) ? 'active' : '' ?>">
                              <?= $i ?>
                         </a>
                    <?php endfor; ?>

                    <?php if ($currentPage < $data['totalPages']): ?>
                         <a href="<?= getPageUrl($currentPage + 1, $queryParams) ?>">Next <i class="fa fa-angle-right ms-1"></i></a>
                    <?php endif; ?>
               </div>
          <?php endif; ?>

     </div>
</div>

<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>