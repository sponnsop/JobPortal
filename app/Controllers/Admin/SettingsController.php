<?php
require_once BASE_PATH . '/app/Models/Setting.php';

class Admin_SettingsController extends Controller {

    public function index(): void {
        requireRole('admin');
        $model = new Setting(); $success = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach (['site_name','site_email','jobs_per_page','allow_registration','maintenance_mode'] as $key) {
                $model->set($key, clean($_POST[$key] ?? ''));
            }
            $success = 'Settings saved successfully.';
        }
        $this->view('admin/settings', [
            'adminTitle' => 'Settings',
            'adminPage'  => 'settings',
            'settings'   => $model->getAll(),
            'success'    => $success,
        ]);
    }
}
