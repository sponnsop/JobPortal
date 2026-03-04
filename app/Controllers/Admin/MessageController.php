<?php
require_once BASE_PATH . '/app/Models/ContactMessage.php';

class Admin_MessageController extends Controller {

    public function index(): void {
        requireRole('admin');
        $model = new ContactMessage();
        if (isset($_GET['read']))   { $model->markRead((int)$_GET['read']); redirect('admin/messages'); }
        if (isset($_GET['delete'])) { $model->delete((int)$_GET['delete']); redirect('admin/messages'); }

        $this->view('admin/messages', [
            'adminTitle'  => 'Messages',
            'adminPage'   => 'messages',
            'messages'    => $model->getAll(($_GET['filter'] ?? '') === 'unread'),
            'filter'      => clean($_GET['filter'] ?? ''),
            'unreadCount' => $model->countUnread(),
        ]);
    }
}
