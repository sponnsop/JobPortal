<?php
require_once BASE_PATH . '/app/Models/ContactMessage.php';

class ContactController extends Controller {

    public function index(): void {
        $success = $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name    = clean($_POST['name']    ?? '');
            $email   = clean($_POST['email']   ?? '');
            $message = clean($_POST['message'] ?? '');
            if (!$name || !$email || !$message)                    $error = 'Please fill in all fields.';
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))    $error = 'Please enter a valid email address.';
            else {
                $ok = (new ContactMessage())->create($name, $email, $message);
                $success = $ok ? 'Thank you! Your message has been sent.' : 'Something went wrong. Please try again.';
            }
        }
        $this->view('pages/contact', ['pageTitle' => 'Contact Us', 'activePage' => 'contact', 'success' => $success, 'error' => $error]);
    }
}
