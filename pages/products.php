<?php
class Product {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getProducts($items, $page) {
        $conn = $this->db->getConn();
        $offset = ($page - 1) * $items;

        $sql = "SELECT * FROM products ORDER BY id DESC LIMIT $items OFFSET $offset";
        $result = $conn->query($sql);

        return $result;
    }

    public function getTotalPages($items) {
        $conn = $this->db->getConn();

        $totalRecords = $conn->query("SELECT COUNT(*) FROM products")->fetch_row()[0];
        $totalPages = ceil($totalRecords / $items);

        return $totalPages;
    }

    public function searchProducts($search) {
        $conn = $this->db->getConn();

        $sqlsearch = "SELECT * FROM products WHERE product_name LIKE '%$search%' OR category_id LIKE '%$search%' OR description LIKE '%$search%'";
        $result = $conn->query($sqlsearch);

        return $result;
    }
}
?>
