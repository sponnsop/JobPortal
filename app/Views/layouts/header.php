<?php
$navItems = [
    'home'         => ['Home',       SITE_URL . '/'],
    'jobs'         => ['Jobs',       SITE_URL . '/jobs'],
    'about'        => ['About Us',   SITE_URL . '/about'],
    'blog'         => ['Blog',       SITE_URL . '/blog'],
    'contact'      => ['Contact Us', SITE_URL . '/contact'],
];
$moreItems = [
    'team'         => ['Team',         SITE_URL . '/team'],
    'testimonials' => ['Testimonials', SITE_URL . '/testimonials'],
    'terms'        => ['Terms',        SITE_URL . '/terms'],
];
$moreActive = array_key_exists($activePage ?? '', $moreItems);
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <title><?php echo htmlspecialchars($pageTitle ?? SITE_NAME); ?> | <?php echo SITE_NAME; ?></title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/bootstrap.min.css">
     <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/font-awesome.min.css">
     <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/owl.carousel.css">
     <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/owl.theme.default.min.css">
     <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/style.css">
</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<section class="preloader">
     <div class="spinner"><span class="spinner-rotate"></span></div>
</section>

<section class="navbar custom-navbar navbar-fixed-top" role="navigation">
     <div class="container">
          <div class="navbar-header">
               <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
               </button>
               <a href="<?php echo SITE_URL; ?>/" class="navbar-brand"><?php echo SITE_NAME; ?></a>
          </div>
          <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-nav-first">

                    <?php foreach ($navItems as $key => [$label, $href]): ?>
                    <li<?php echo ($activePage ?? '') === $key ? ' class="active"' : ''; ?>>
                         <a href="<?php echo $href; ?>"><?php echo $label; ?></a>
                    </li>
                    <?php endforeach; ?>

                    <li class="dropdown<?php echo $moreActive ? ' active' : ''; ?>">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              More <span class="caret"></span>
                         </a>
                         <ul class="dropdown-menu">
                              <?php foreach ($moreItems as $key => [$label, $href]): ?>
                              <li<?php echo ($activePage ?? '') === $key ? ' class="active"' : ''; ?>>
                                   <a href="<?php echo $href; ?>"><?php echo $label; ?></a>
                              </li>
                              <?php endforeach; ?>
                         </ul>
                    </li>

                    <?php if (isLoggedIn()): ?>
                    <?php
                    // Load avatar if available
                    $navAvatar = '';
                    if (!empty($_SESSION['user_id'])) {
                        $navUser = $GLOBALS['conn']->query("SELECT avatar, full_name FROM users WHERE id=".(int)$_SESSION['user_id']." LIMIT 1")->fetch_assoc();
                        $navAvatar = $navUser['avatar'] ?? '';
                        $navName   = $navUser['full_name'] ?? '';
                    }
                    ?>
                    <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                            style="display:flex;align-items:center;gap:7px;">
                              <?php if ($navAvatar): ?>
                              <img src="<?php echo SITE_URL.'/uploads/avatars/'.htmlspecialchars($navAvatar); ?>"
                                   style="width:30px;height:30px;border-radius:50%;object-fit:cover;border:2px solid #29ca8e;">
                              <?php else: ?>
                              <span style="width:30px;height:30px;border-radius:50%;background:#29ca8e;
                                    color:#fff;display:inline-flex;align-items:center;justify-content:center;
                                    font-weight:bold;font-size:13px;">
                                   <?php echo strtoupper(substr($_SESSION['email'], 0, 1)); ?>
                              </span>
                              <?php endif; ?>
                              <span style="font-size:13px;">
                                   <?php echo $navName ? htmlspecialchars(explode(' ', $navName)[0]) : (['admin'=>'Admin','employer'=>'Employer','job_seeker'=>'My Account'][$_SESSION['role']] ?? 'Account'); ?>
                              </span>
                              <span class="caret"></span>
                         </a>
                         <ul class="dropdown-menu dropdown-menu-right">
                              <li class="dropdown-header"><?php echo htmlspecialchars($_SESSION['email']); ?></li>
                              <li role="separator" class="divider"></li>
                              <?php if ($_SESSION['role'] === 'admin'): ?>
                              <li><a href="<?php echo SITE_URL; ?>/admin"><i class="fa fa-tachometer" style="width:18px"></i> Admin Dashboard</a></li>
                              <li><a href="<?php echo SITE_URL; ?>/admin/jobs"><i class="fa fa-briefcase" style="width:18px"></i> Manage Jobs</a></li>
                              <li><a href="<?php echo SITE_URL; ?>/admin/users"><i class="fa fa-users" style="width:18px"></i> Manage Users</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="<?php echo SITE_URL; ?>/admin/profile"><i class="fa fa-user-circle" style="width:18px"></i> My Profile</a></li>
                              <?php elseif ($_SESSION['role'] === 'employer'): ?>
                              <li><a href="<?php echo SITE_URL; ?>/employer/dashboard"><i class="fa fa-tachometer" style="width:18px"></i> Dashboard</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="<?php echo SITE_URL; ?>/employer/profile"><i class="fa fa-user-circle" style="width:18px"></i> My Profile</a></li>
                              <?php else: ?>
                              <li><a href="<?php echo SITE_URL; ?>/seeker/dashboard"><i class="fa fa-tachometer" style="width:18px"></i> Dashboard</a></li>
                              <li><a href="<?php echo SITE_URL; ?>/seeker/applications"><i class="fa fa-file-text" style="width:18px"></i> My Applications</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="<?php echo SITE_URL; ?>/seeker/profile"><i class="fa fa-user-circle" style="width:18px"></i> My Profile</a></li>
                              <?php endif; ?>
                              <li role="separator" class="divider"></li>
                              <li><a href="<?php echo SITE_URL; ?>/logout" style="color:#e74c3c;"><i class="fa fa-sign-out" style="width:18px"></i> Logout</a></li>
                         </ul>
                    </li>
                    <?php else: ?>
                    <li><a href="<?php echo SITE_URL; ?>/login"><i class="fa fa-sign-in"></i> Login</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/register"><i class="fa fa-user-plus"></i> Register</a></li>
                    <?php endif; ?>

               </ul>
          </div>
     </div>
</section>
