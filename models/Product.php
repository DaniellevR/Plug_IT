<?php

Class Product extends Database {

    public $id;
    public $name;
    public $description;
    public $price;
    public $brand;
    public $supplier;
    public $amount;
    public $category_id;
    public $amountInCart;

    public function getProduct() {
        $this->db->select('*')
                ->from('product');

        $result = $this->db->get();

        $products = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product = new Product();
                $product->id = $row['id'];
                $product->name = $row['name'];
                $product->description = $row['description'];
                $product->price = $row['price'];
                $product->brand = $row['brand'];
                $product->supplier = $row['supplier'];
                $product->amount = $row['amount'];
                $product->category_id = $row['category_id'];
                $products[] = $product;
            }
        }

        return $products;
    }

    public function addProduct($name, $description, $price, $brand, $supplier, $amount, $category_id) {
        $this->db->set('id', 0);
        $this->db->set('name', $name);
        $this->db->set('description', $description);
        $this->db->set('price', $price);
        $this->db->set('brand', $brand);
        $this->db->set('supplier', $supplier);
        $this->db->set('amount', $amount);
        $this->db->set('category_id', $category_id);
        $this->db->insert('product');
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function removeProduct($id) {
        $this->db->where('id', $id);
        $this->db->delete('product');
    }

    public function editProduct($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('product', $data);
    }

    public function getProductFromId($id) {
        if ($this->establishConnection()) {
            $sql = "SELECT * FROM product WHERE id = " . $id;
            $result = $this->conn->query($sql);
            if ($result == null) {
                return;
            }

            $product;

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $product = new Product();
                    $product->id = $row['id'];
                    $product->name = $row['name'];
                    $product->description = $row['description'];
                    $product->price = $row['price'];
                    $product->brand = $row['brand'];
                    $product->supplier = $row['supplier_name'];
                    $product->amount = $row['amount'];
                    $product->category_id = $row['category_id'];
                }
            }

            $this->closeConnection();

            return $product;
        }
    }

    public function getProductsFromCategoryId($catId) {
        if ($this->establishConnection()) {
            $sql = "SELECT * FROM product WHERE category_id = " . $catId;

            $result = $this->conn->query($sql);

            if ($result == null) {
                return;
            }

            $products = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $product = new Product();
                    $product->id = $row['id'];
                    $product->name = $row['name'];
                    $product->description = $row['description'];
                    $product->price = $row['price'];
                    $product->brand = $row['brand'];
                    $product->supplier = $row['supplier_name'];
                    $product->amount = $row['amount'];
                    $product->category_id = $row['category_id'];
                    $products[] = $product;
                }
            }

            $this->closeConnection();

            return $products;
        }
    }

    public function getAllProducts() {
        if ($this->establishConnection()) {
            $sql = "SELECT * FROM product";

            $result = $this->conn->query($sql);

            if ($result == null) {
                return;
            }

            $products = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $product = new Product();
                    $product->id = $row['id'];
                    $product->name = $row['name'];
                    $product->description = $row['description'];
                    $product->price = $row['price'];
                    $product->brand = $row['brand'];
                    $product->supplier = $row['supplier_name'];
                    $product->amount = $row['amount'];
                    $product->category_id = $row['category_id'];
                    $products[] = $product;
                }
            }

            $this->closeConnection();

            return $products;
        }
    }

    public function getProductsFromId($ids) {
        $sql = "SELECT * FROM product WHERE id = 0";

        if ($this->establishConnection()) {

            foreach ($ids as $id) {
                $sql = $sql . ' OR id = ' . $id;
            }

            $result = $this->conn->query($sql);

            if ($result == null) {
                return;
            }

            $products = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $product = new Product();
                    $product->id = $row['id'];
                    $product->name = $row['name'];
                    $product->description = $row['description'];
                    $product->price = $row['price'];
                    $product->brand = $row['brand'];
                    $product->supplier = $row['supplier_name'];
                    $product->amount = $row['amount'];
                    $product->category_id = $row['category_id'];
                    $products[] = $product;
                }
            }

            $this->closeConnection();

            return $products;
        }
    }

}
