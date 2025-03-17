<?php
class ApiModel {
    private $conn; // Database connection
    private $table; // Table name

    public function __construct($db, $table) {
        $this->conn = $db;
        $this->table = $table;
    }

    // Create (Insert data)
    public function create($data) {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
        $stmt = $this->conn->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", htmlspecialchars(strip_tags($value)));
        }

        return $stmt->execute();
    }

    // Read (Fetch data)
    public function read($conditions = [], $limit = null, $offset = null) {
        $sql = "SELECT * FROM {$this->table}";

        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", array_map(function ($key) {
                return "$key = :$key";
            }, array_keys($conditions)));
        }

        if ($limit) {
            $sql .= " LIMIT :limit";
        }

        if ($offset) {
            $sql .= " OFFSET :offset";
        }

        $stmt = $this->conn->prepare($sql);

        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":$key", htmlspecialchars(strip_tags($value)));
        }

        if ($limit) {
            $stmt->bindValue(":limit", (int)$limit, PDO::PARAM_INT);
        }

        if ($offset) {
            $stmt->bindValue(":offset", (int)$offset, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update (Edit data)
    public function update($data, $conditions) {
        $updates = implode(", ", array_map(function ($key) {
            return "$key = :$key";
        }, array_keys($data)));

        $whereClause = implode(" AND ", array_map(function ($key) {
            return "$key = :where_$key";
        }, array_keys($conditions)));

        $sql = "UPDATE {$this->table} SET $updates WHERE $whereClause";
        $stmt = $this->conn->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", htmlspecialchars(strip_tags($value)));
        }

        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":where_$key", htmlspecialchars(strip_tags($value)));
        }

        return $stmt->execute();
    }

    // Delete (Remove data)
    public function delete($conditions) {
        $whereClause = implode(" AND ", array_map(function ($key) {
            return "$key = :$key";
        }, array_keys($conditions)));

        $sql = "DELETE FROM {$this->table} WHERE $whereClause";
        $stmt = $this->conn->prepare($sql);

        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":$key", htmlspecialchars(strip_tags($value)));
        }

        return $stmt->execute();
    }
}
?>
