<?php
    class Product extends BaseModel {
        protected $table = 'products';

        // Lấy tất cả sản phẩm kèm tên danh mục
        public function getAll() {
            $sql = "SELECT p.*, cat.name as cat_name FROM `products` as p
             JOIN categories as cat 
             ON p.categories_id = cat.id ORDER BY p.id DESC;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        // Xóa sản phẩm theo ID
        public function delete($id) {
            $sql = "DELETE from products WHERE id = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }

        // Tìm sản phẩm theo ID
        public function find($id) {
            $sql = "SELECT * FROM products WHERE id = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        }

        // Thêm sản phẩm mới
        public function insert($data){
            $sql = "INSERT INTO `products` (`id`, `categories_id`, `name`, `description`, `price`, `quantity`, `img`) 
            VALUES (NULL, '".$data["categories_id"]."', '".$data["name"]."', '".$data["description"]."', 
            '".$data["price"]."', '".$data["quantity"]."', '".$data["img"]."');";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }
        // Lấy 4 sản phẩm mới nhất
        public function getTop4Latest() {
            $sql = "SELECT * FROM products ORDER BY ID DESC LIMIT 4";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        // Cập nhật lượt xem sản phẩm
        public function updateViewCount($newViewCount, $id) {
            $sql = "UPDATE products SET view_count= $newViewCount WHERE id = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }

        // Lấy 4 sản phẩm có lượt xem cao nhất
        public function getTop4View() {
            $sql = "SELECT * FROM products ORDER BY view_count DESC LIMIT 4";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        // Cập nhật sản phẩm
        public function update($id, $data) {
            $sql = "UPDATE products SET categories_id = :categories_id, name = :name, description = :description, price = :price, quantity = :quantity, img = :img WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':categories_id' => $data['categories_id'],
                ':name' => $data['name'],
                ':description' => $data['description'],
                ':price' => $data['price'],
                ':quantity' => $data['quantity'],
                ':img' => $data['img']
            ]);
        }

        // Đếm tổng số sản phẩm
        public function count() {
            $sql = "SELECT COUNT(*) as total FROM products";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetch()['total'];
        }

        // Lấy sản phẩm theo danh mục
        public function getByCategory($categoryId) {
            $sql = "SELECT p.*, cat.name as cat_name FROM products p 
                    JOIN categories cat ON p.categories_id = cat.id 
                    WHERE p.categories_id = :category_id 
                    ORDER BY p.id DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':category_id' => $categoryId]);
            return $stmt->fetchAll();
        }
    }
?>