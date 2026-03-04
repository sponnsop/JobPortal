<?php
class ContactMessage extends Model {

    public function create(string $name, string $email, string $message): bool {
        $s = $this->conn->prepare("INSERT INTO contact_messages (name,email,message) VALUES (?,?,?)");
        $s->bind_param('sss', $name, $email, $message);
        return $s->execute();
    }

    public function getAll(bool $unreadOnly = false): array {
        $w = $unreadOnly ? 'WHERE is_read=0' : '';
        return $this->conn->query("SELECT * FROM contact_messages $w ORDER BY created_at DESC")->fetch_all(MYSQLI_ASSOC);
    }

    public function markRead(int $id): void {
        $this->conn->query("UPDATE contact_messages SET is_read=1 WHERE id=$id");
    }

    public function delete(int $id): void {
        $this->conn->query("DELETE FROM contact_messages WHERE id=$id");
    }

    public function countUnread(): int {
        return (int)$this->conn->query("SELECT COUNT(*) c FROM contact_messages WHERE is_read=0")->fetch_assoc()['c'];
    }
}
