<?php
require_once BASE_PATH . '/app/Models/User.php';

class Admin_ProfileController extends Controller {

    public function index(): void {
        requireRole('admin');
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

                $ok = $model->update((int)$_SESSION['user_id'], [
                    'full_name'    => $full_name,
                    'email'        => $email,
                    'role'         => 'admin',
                    'is_active'    => 1,
                    'password'     => $password,
                    'avatar'       => $avatar,
                    'company_name' => '', 'company_city' => '', 'website' => '',
                    'industry'     => '', 'company_size' => '', 'company_desc' => '',
                    'seeker_city'  => '', 'bio' => '',
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

        $this->view('admin/profile', [
            'adminTitle' => 'My Profile',
            'adminPage'  => 'profile',
            'user'       => $user,
            'error'      => $error,
            'success'    => $success,
        ]);
    }
}
