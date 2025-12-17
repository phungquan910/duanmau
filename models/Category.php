<?php
    class Category extends BaseModel {
        protected $table = 'categories';

        public function getAll() {
            $sql = "SELECT * from categories";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function find($id) {
            $sql = "SELECT * FROM categories WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        }

        public function insert($data) {
            $sql = "INSERT INTO categories (name, description) VALUES (:name, :description)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':name' => $data['name'],
                ':description' => $data['description'] ?? ''
            ]);
        }

        public function update($id, $data) {
            $sql = "UPDATE categories SET name = :name, description = :description WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':name' => $data['name'],
                ':description' => $data['description'] ?? ''
            ]);
        }

        public function delete($id) {
            $sql = "DELETE FROM categories WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
        }

        public function count() {
            $sql = "SELECT COUNT(*) as total FROM categories";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetch()['total'];
        }
        
    }
?>