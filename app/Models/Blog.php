<?php
class Blog extends Model {

    public function getPublished(int $perPage, int $offset): array {
        $s = $this->conn->prepare("SELECT bp.*, u.email FROM blog_posts bp JOIN users u ON bp.author_id=u.id WHERE bp.status='published' ORDER BY bp.published_at DESC LIMIT ? OFFSET ?");
        $s->bind_param('ii', $perPage, $offset); $s->execute();
        return $s->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function countPublished(): int {
        return (int)$this->conn->query("SELECT COUNT(*) t FROM blog_posts WHERE status='published'")->fetch_assoc()['t'];
    }

    public function find(int $id): ?array {
        $s = $this->conn->prepare("SELECT bp.*, u.email AS author_email FROM blog_posts bp JOIN users u ON bp.author_id=u.id WHERE bp.id=? AND bp.status='published'");
        $s->bind_param('i', $id); $s->execute();
        return $s->get_result()->fetch_assoc() ?: null;
    }

    public function getRecent(int $limit = 5): array {
        return $this->conn->query("SELECT id,title FROM blog_posts WHERE status='published' ORDER BY published_at DESC LIMIT $limit")->fetch_all(MYSQLI_ASSOC);
    }

    public function getLatest(int $limit = 3): array {
        return $this->conn->query("SELECT * FROM blog_posts WHERE status='published' ORDER BY published_at DESC LIMIT $limit")->fetch_all(MYSQLI_ASSOC);
    }
}
