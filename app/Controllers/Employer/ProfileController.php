<?php
require_once BASE_PATH . '/app/Models/User.php';

class Employer_ProfileController extends Controller {

    public function index(): void {
        requireRole('employer');
        $model = new User();
        $user  = $model->findById((int)$_SESSION['user_id']);
        $error = $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $full_name = trim($_POST['full_name'] ?? '');
            $email     = trim($_POST['email']     ?? '');
            $password  = $_POST['password']  ?? '';
            $confirm   = $_POST['password2'] ?? '';

            if (!$email)                                        $error = 'Email is required.';
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $error = 'Invalid email address.';
            elseif ($password && strlen($password) < 8)         $error = 'Password must be at least 8 characters.';
            elseif ($password && $password !== $confirm)        $error = 'Passwords do not match.';
            else {
                // Avatar upload
                $avatar = $user['avatar'] ?? '';
                if (!empty($_FILES['avatar']['name'])) {
                    $allowed = ['image/jpeg','image/png','image/webp','image/gif'];
                    if (in_array($_FILES['avatar']['type'], $allowed) && $_FILES['avatar']['size'] <= 2*1024*1024) {
                        $ext    = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                        $avatar = 'avatar_'.$_SESSION['user_id'].'_'.time().'.'.$ext;
                        $dir    = BASE_PATH . '/public/uploads/avatars/';
                        if (!is_dir($dir)) mkdir($dir, 0755, true);
                        move_uploaded_file($_FILES['avatar']['tmp_name'], $dir . $avatar);
                    }
                }

                // Company logo upload
                $logo = $user['logo'] ?? '';
                if (!empty($_FILES['company_logo']['name'])) {
                    $allowed = ['image/jpeg','image/png','image/webp'];
                    if (in_array($_FILES['company_logo']['type'], $allowed) && $_FILES['company_logo']['size'] <= 2*1024*1024) {
                        $ext  = pathinfo($_FILES['company_logo']['name'], PATHINFO_EXTENSION);
                        $logo = 'logo_'.$_SESSION['user_id'].'_'.time().'.'.$ext;
                        $dir  = BASE_PATH . '/public/uploads/logos/';
                        if (!is_dir($dir)) mkdir($dir, 0755, true);
                        move_uploaded_file($_FILES['company_logo']['tmp_name'], $dir . $logo);
                    }
                }

                $ok = $model->updateEmployerProfile((int)$_SESSION['user_id'], [
                    'full_name'    => $full_name,
                    'email'        => $email,
                    'password'     => $password,
                    'avatar'       => $avatar,
                    'logo'         => $logo,
                    'company_name' => trim($_POST['company_name'] ?? ''),
                    'company_city' => trim($_POST['company_city'] ?? ''),
                    'website'      => trim($_POST['website']      ?? ''),
                    'industry'     => trim($_POST['industry']     ?? ''),
                    'company_size' => trim($_POST['company_size'] ?? ''),
                    'company_desc' => trim($_POST['company_desc'] ?? ''),
                ]);

                if ($ok) {
                    $_SESSION['email'] = $email;
                    $success = 'Profile updated successfully.';
                    $user    = $model->findById((int)$_SESSION['user_id']);
                } else {
                    $error = 'Update failed. Please try again.';
                }
            }
        }

        $this->view('employer/profile', [
            'pageTitle'  => 'Company Profile',
            'activePage' => '',
            'user'       => $user,
            'error'      => $error,
            'success'    => $success,
        ]);
    }
}
