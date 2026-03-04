<!DOCTYPE html>
<html lang="en">
<head>
     <title>Login | <?php echo SITE_NAME; ?></title>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/bootstrap.min.css">
     <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/font-awesome.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300;700&family=Nunito&display=swap" rel="stylesheet">
     <style>
          *{box-sizing:border-box;margin:0;padding:0}
          body{font-family:'Nunito',sans-serif;min-height:100vh;background:#f8f8f8;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:30px 15px}
          .back-link{position:fixed;top:16px;left:20px;color:#575757;font-size:13px;text-decoration:none;display:flex;align-items:center;gap:6px;transition:color .3s}
          .back-link:hover{color:#29ca8e;text-decoration:none} .back-link .fa{color:#29ca8e}
          .wrap{width:100%;max-width:440px}
          .brand{text-align:center;margin-bottom:28px}
          .brand .ico{width:64px;height:64px;background:#29ca8e;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;font-size:28px;color:#fff;box-shadow:0 4px 15px rgba(41,202,142,.35)}
          .brand h1{font-family:'Muli',sans-serif;font-size:26px;font-weight:700;color:#252525;margin:0 0 5px}
          .brand h1 span{color:#29ca8e} .brand p{color:#909090;font-size:14px;margin:0}
          .card{background:#fff;border-radius:4px;border-top:5px solid #29ca8e;box-shadow:0 1px 30px rgba(0,0,0,.1)}
          .card-head{background:#3f51b5;padding:26px 30px 22px;text-align:center}
          .card-head h3{font-family:'Muli',sans-serif;color:#fff;font-size:20px;margin:0 0 4px}
          .card-head p{color:rgba(255,255,255,.75);font-size:13px;margin:0}
          .card-body{padding:30px}
          .alert{border-radius:4px;font-size:13px;padding:10px 14px;margin-bottom:20px;border:0}
          .alert-success{background:#eafaf4;border-left:4px solid #29ca8e;color:#1a7a4a}
          .alert-danger{background:#fdf2f2;border-left:4px solid #e74c3c;color:#a94442}
          .form-group{margin-bottom:20px}
          .form-group label{font-family:'Muli',sans-serif;font-size:13px;font-weight:700;color:#454545;margin-bottom:7px;display:block}
          .form-group label .fa{color:#29ca8e;margin-right:5px}
          .form-control{height:45px;border:0!important;border-bottom:1px solid #ddd!important;border-radius:0!important;box-shadow:none!important;font-family:'Nunito',sans-serif;font-size:14px;color:#454545;background:transparent!important;padding-left:0;transition:border-color .3s!important}
          .form-control:focus{border-bottom-color:#29ca8e!important;box-shadow:none!important}
          .form-control::placeholder{color:#bbb}
          .pw-wrap{position:relative}
          .pw-wrap .toggle{position:absolute;right:0;top:50%;transform:translateY(-50%);cursor:pointer;color:#bbb;font-size:15px;background:none;border:none;padding:0}
          .pw-wrap .toggle:hover{color:#29ca8e}
          .row-inline{display:flex;justify-content:space-between;align-items:center;font-size:13px;margin-bottom:22px}
          .row-inline label{font-weight:normal;margin:0;color:#757575;cursor:pointer;display:flex;align-items:center;gap:6px}
          .row-inline a{color:#29ca8e;text-decoration:none} .row-inline a:hover{color:#3f51b5;text-decoration:underline}
          .btn-login{width:100%;height:50px;background:transparent;border:1px solid #29ca8e;border-radius:50px;color:#29ca8e;font-family:'Muli',sans-serif;font-size:15px;font-weight:700;cursor:pointer;transition:all .5s}
          .btn-login:hover{background:#29ca8e;color:#fff;border-color:transparent}
          .divider{display:flex;align-items:center;gap:12px;margin:24px 0;color:#ccc;font-size:12px}
          .divider::before,.divider::after{content:'';flex:1;height:1px;background:#f0f0f0}
          .reg-row{text-align:center} .reg-row p{color:#909090;font-size:13px;margin-bottom:14px}
          .btn-reg{display:inline-flex;align-items:center;gap:7px;padding:9px 20px;border-radius:50px;border:1px solid #f0f0f0;background:#f8f8f8;color:#454545;font-size:13px;text-decoration:none;transition:all .3s;margin:0 4px}
          .btn-reg .fa{color:#29ca8e} .btn-reg:hover{background:#29ca8e;border-color:#29ca8e;color:#fff;text-decoration:none} .btn-reg:hover .fa{color:#fff}
          .foot-note{text-align:center;color:#909090;font-size:12px;margin-top:20px}
     </style>
</head>
<body>
<a href="<?php echo SITE_URL; ?>/" class="back-link"><i class="fa fa-arrow-left"></i> Back to <?php echo SITE_NAME; ?></a>

<div class="wrap">
     <div class="brand">
          <div class="ico"><i class="fa fa-briefcase"></i></div>
          <h1><?php echo SITE_NAME; ?> <span>&#9632;</span></h1>
          <p>Your gateway to great opportunities</p>
     </div>

     <div class="card">
          <div class="card-head">
               <h3>Welcome Back</h3>
               <p>Sign in to continue to your account</p>
          </div>
          <div class="card-body">
               <?php if ($success): ?><div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?></div><?php endif; ?>
               <?php if ($error):   ?><div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error; ?></div><?php endif; ?>

               <form action="<?php echo SITE_URL; ?>/login" method="post">
                    <div class="form-group">
                         <label><i class="fa fa-envelope"></i> Email Address</label>
                         <input type="email" name="email" class="form-control" placeholder="Enter your email"
                                value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required autofocus>
                    </div>
                    <div class="form-group">
                         <label><i class="fa fa-lock"></i> Password</label>
                         <div class="pw-wrap">
                              <input type="password" id="pw" name="password" class="form-control"
                                     placeholder="Enter your password" required style="padding-right:30px">
                              <button type="button" class="toggle" onclick="togglePw()">
                                   <i class="fa fa-eye" id="pwIcon"></i>
                              </button>
                         </div>
                    </div>
                    <div class="row-inline">
                         <label><input type="checkbox" name="remember"> Remember me</label>
                         <a href="<?php echo SITE_URL; ?>/forgot-password">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn-login"><i class="fa fa-sign-in"></i> Sign In</button>
               </form>

               <div class="divider">or register a new account</div>
               <div class="reg-row">
                    <p>Don't have an account? Join as:</p>
                    <a href="<?php echo SITE_URL; ?>/register?role=job_seeker" class="btn-reg"><i class="fa fa-user"></i> Job Seeker</a>
                    <a href="<?php echo SITE_URL; ?>/register?role=employer"   class="btn-reg"><i class="fa fa-building"></i> Employer</a>
               </div>
          </div>
     </div>
     <div class="foot-note">&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?> &mdash; All rights reserved</div>
</div>

<script>
function togglePw() {
     var f = document.getElementById('pw'), i = document.getElementById('pwIcon');
     f.type = f.type === 'password' ? 'text' : 'password';
     i.className = f.type === 'password' ? 'fa fa-eye' : 'fa fa-eye-slash';
}
</script>
</body>
</html>
