<?php
class Comment extends BaseModel {
    protected $table = 'comments';

    // Lấy tất cả bình luận kèm thông tin sản phẩm và user
    public function getAll() {
        $sql = "SELECT c.*, p.name as product_name, u.username FROM comments c 
                LEFT JOIN products p ON c.product_id = p.id 
                LEFT JOIN users u ON c.user_id = u.id 
                ORDER BY c.id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Tìm bình luận theo ID
    public function find($id) {
        $sql = "SELECT * FROM comments WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // Thêm bình luận mới
    public function insert($data) {
        $sql = "INSERT INTO comments (product_id, user_id, content, rating, created_at, status) VALUES (:product_id, :user_id, :content, :rating, :created_at, :status)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':product_id' => $data['product_id'],
            ':user_id' => $data['user_id'],
            ':content' => $data['content'],
            ':rating' => $data['rating'] ?? 5,
            ':created_at' => time(),
            ':status' => $data['status'] ?? 1
        ]);
    }

    // Cập nhật bình luận
    public function update($id, $data) {
        $sql = "UPDATE comments SET product_id = :product_id, user_id = :user_id, content = :content, rating = :rating, status = :status WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':product_id' => $data['product_id'],
            ':user_id' => $data['user_id'],
            ':content' => $data['content'],
            ':rating' => $data['rating'] ?? 5,
            ':status' => $data['status'] ?? 1
        ]);
    }

    // Xóa bình luận
    public function delete($id) {
        $sql = "DELETE FROM comments WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}
?>