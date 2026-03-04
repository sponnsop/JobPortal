<?php
require_once BASE_PATH . '/app/Models/User.php';

class Admin_UserAdminController extends Controller {

    public function index(): void {
        requireRole('admin');
        $this->view('admin/users', [
            'adminTitle'  => 'Manage Users',
            'adminPage'   => 'users',
            'users'       => (new User())->getAll(clean($_GET['search'] ?? ''), clean($_GET['role'] ?? '')),
            'search'      => clean($_GET['search'] ?? ''),
            'roleFilter'  => clean($_GET['role'] ?? ''),
        ]);
    }

    public function toggle(string $id): void {
        requireRole('admin');
        (new User())->toggleActive((int)$id);
        redirect('admin/users');
    }

    public function delete(string $id): void {
        requireRole('admin');
        (new User())->delete((int)$id);
        redirect('admin/users');
    }
}
