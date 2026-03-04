<?php
class Testimonial extends Model {
    public function getActive(): array {
        return $this->conn->query("SELECT * FROM testimonials WHERE is_active=1 ORDER BY id DESC")->fetch_all(MYSQLI_ASSOC);
    }
}
