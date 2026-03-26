<?php require BASE_PATH . '/app/Views/layouts/header.php'; ?>

<style>
    /* 1. Hero Section */
    .app-hero {
        background: linear-gradient(to right, rgba(15, 23, 42, 0.9), rgba(30, 58, 138, 0.8)), url('https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover;
        padding: 70px 0 90px;
        text-align: center;
        color: white;
    }

    /* 2. Filter Bar (Pulled up to overlap hero) */
    .filter-card {
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        padding: 20px;
        margin-top: -40px;
        margin-bottom: 30px;
        border: 1px solid #f1f5f9;
    }

    /* 3. Custom Table Styling */
    .table-container {
        background: #ffffff;
        border-radius: 8px;
        border: 1px solid #f1f5f9;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
        overflow: hidden;
    }

    .custom-table th {
        background-color: #f8fafc;
        color: #475569;
        font-weight: 600;
        font-size: 13px;
        text-transform: none;
        padding: 16px 20px;
        border-bottom: 1px solid #e2e8f0;
    }

    .custom-table td {
        padding: 20px;
        vertical-align: middle;
        border-bottom: 1px solid #f1f5f9;
        color: #64748b;
        font-size: 14px;
    }

    /* 4. Row Left-Border Colors */
    .row-border-yellow {
        border-left: 4px solid #f59e0b;
    }

    .row-border-blue {
        border-left: 4px solid #3b82f6;
    }

    /* 5. Custom Action Buttons */
    .action-btn {
        background: white;
        border: 1px solid #cbd5e1;
        color: #64748b;
        font-size: 12px;
        font-weight: 600;
        padding: 6px 12px;
        border-radius: 4px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        transition: 0.2s;
        margin-right: 4px;
        margin-bottom: 4px;
    }

    .action-btn:hover {
        background: #f8fafc;
        color: #0f172a;
        text-decoration: none;
    }

    .action-btn i {
        font-size: 11px;
    }

    .btn-withdraw-outline {
        border-color: #fca5a5;
        color: #ef4444;
    }

    .btn-withdraw-outline:hover {
        background: #fef2f2;
        border-color: #ef4444;
        color: #dc2626;
    }

    /* 6. Status & Deadline Badges */
    .status-badge {
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 11px;
        font-weight: 700;
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .bg-teal {
        background-color: #14b8a6;
    }

    .bg-blue {
        background-color: #3b82f6;
    }

    .deadline-badge {
        padding: 3px 8px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 700;
        display: inline-block;
        margin-top: 4px;
    }

    .deadline-red {
        background: #fef2f2;
        color: #ef4444;
    }

    .deadline-green {
        background: #dcfce7;
        color: #166534;
    }
</style>

<div class="app-hero">
    <div class="container">
        <p class="text-uppercase fw-bold mb-2" style="letter-spacing: 2px; font-size: 12px; color: #94a3b8;">Dashboard</p>
        <h1 class="fw-bold mb-3">My Applications</h1>
        <p style="color: #cbd5e1; font-size: 16px;">Track every application, status, and deadline in one place.</p>
    </div>
</div>

<div class="container pb-5">

    <div class="filter-card">
        <form action="<?= SITE_URL ?>/seeker/applications" method="GET" class="row g-3 align-items-end">
            <div class="col-md-5">
                <label class="form-label text-muted small fw-bold">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Search job or company...">
            </div>
            <div class="col-md-4">
                <label class="form-label text-muted small fw-bold">Status</label>
                <select name="status" class="form-select">
                    <option value="">All statuses</option>
                    <option value="submitted">Application Received</option>
                    <option value="reviewing">In Review</option>
                    <option value="hired">Hired</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100 fw-bold" style="background-color: #006aff; border:none;"><i class="fa fa-search"></i> Filter</button>
            </div>
        </form>
    </div>

    <div class="table-container">
        <div class="table-responsive">
            <table class="table custom-table mb-0">
                <thead>
                    <tr>
                        <th>Job</th>
                        <th>Company</th>
                        <th>Applied</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data['applications'])): ?>
                        <?php
                        $i = 0;
                        foreach ($data['applications'] as $app):
                            // Alternate row border colors for that screenshot effect
                            $borderClass = ($i % 2 == 0) ? 'row-border-yellow' : 'row-border-blue';
                            $i++;
                        ?>
                            <tr class="<?= $borderClass ?>">

                                <td>
                                    <strong style="color: #334155; display:block; margin-bottom: 2px;"><?= htmlspecialchars($app['job_title']) ?></strong>
                                    <a href="<?= SITE_URL ?>/jobs/<?= $app['job_id'] ?? 0 ?>" style="color: #3b82f6; font-size: 13px; text-decoration: none;">View job</a>
                                </td>

                                <td><?= htmlspecialchars($app['company_name'] ?? 'Company Name') ?></td>

                                <td>
                                    <span style="color: #94a3b8;">
                                        <?= date('d M, Y', strtotime($app['applied_at'] ?? $app['created_at'])) ?>
                                    </span>
                                </td>

                                <td>
                                    <span style="color: #94a3b8; display:block;">10 Jan, 2026</span>
                                    <span class="deadline-badge deadline-green">12 days left</span>
                                </td>

                                <td>
                                    <?php
                                    $status = $app['status'];
                                    // Match colors to the screenshot
                                    $statusClass = match ($status) {
                                        'submitted' => 'bg-teal',
                                        'reviewing' => 'bg-blue',
                                        'hired' => 'bg-success',
                                        'rejected', 'withdrawn' => 'bg-danger',
                                        default => 'bg-secondary'
                                    };
                                    // Rename "submitted" to "Application Received" for the UI
                                    $displayStatus = ($status == 'submitted') ? 'Application Received' : ucfirst($status);
                                    if ($status == 'reviewing') $displayStatus = 'In Review';
                                    ?>
                                    <span class="status-badge <?= $statusClass ?>"><?= $displayStatus ?></span>
                                </td>

                                <td>
                                    <a href="#" class="action-btn"><i class="fa fa-download"></i> Resume</a>

                                    <a href="" class="action-btn"><i class="fa fa-eye"></i> View</a>

                                    <?php if (in_array($status, ['submitted', 'reviewing', 'shortlisted'])): ?>
                                        <form action="<?= SITE_URL ?>/applications/cancel/<?= $app['id'] ?>" method="POST" onsubmit="return confirm('Are you sure you want to withdraw this application?');" style="display:inline;">
                                            <button type="submit" class="action-btn btn-withdraw-outline">
                                                <i class="fa fa-times"></i> Withdraw
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <p class="text-muted mb-3">You haven't applied to any jobs yet.</p>
                                <a href="<?= SITE_URL ?>/jobs" class="btn btn-primary rounded-pill px-4">Browse Jobs</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>