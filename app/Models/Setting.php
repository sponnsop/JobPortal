<?php
class Setting extends Model {

    public function getAll(): array {
        $rows = $this->conn->query("SELECT * FROM settings")->fetch_all(MYSQLI_ASSOC);
        $out  = [];
        foreach ($rows as $r) $out[$r['setting_key']] = $r['setting_value'];
        return $out;
    }

    public function set(string $key, string $value): void {
        $s = $this->conn->prepare("INSERT INTO settings (setting_key,setting_value) VALUES (?,?) ON DUPLICATE KEY UPDATE setting_value=?");
        $s->bind_param('sss', $key, $value, $value); $s->execute();
    }
}
