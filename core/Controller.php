<?php
class Controller {

    protected function view(string $view, array $data = []): void {
        extract($data);
        $path = BASE_PATH . '/app/Views/' . $view . '.php';
        if (!file_exists($path)) die("View not found: $view");
        require $path;
    }

    protected function redirect(string $path): void {
        header('Location: ' . SITE_URL . '/' . ltrim($path, '/'));
        exit();
    }
}
