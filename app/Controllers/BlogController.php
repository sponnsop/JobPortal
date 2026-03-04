<?php
require_once BASE_PATH . '/app/Models/Blog.php';

class BlogController extends Controller {

    public function index(): void {
        $model   = new Blog();
        $perPage = 6;
        $page    = max(1, (int)($_GET['page'] ?? 1));
        $total   = $model->countPublished();
        $this->view('blog/list', [
            'pageTitle'   => 'Blog',
            'activePage'  => 'blog',
            'posts'       => $model->getPublished($perPage, ($page - 1) * $perPage),
            'totalPages'  => (int)ceil($total / $perPage),
            'currentPage' => $page,
        ]);
    }

    public function show(string $id): void {
        $model = new Blog();
        $post  = $model->find((int)$id);
        $this->view('blog/detail', [
            'pageTitle'   => $post ? clean($post['title']) : 'Blog Post',
            'activePage'  => 'blog',
            'post'        => $post,
            'recentPosts' => $model->getRecent(5),
        ]);
    }
}
