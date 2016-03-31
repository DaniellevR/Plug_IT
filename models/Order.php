<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Order
 *
 * @author Nigel
 */
class Order extends Database {

    public function createOrder($price) {
        if ($this->establishConnection()) {
            $sql = "INSERT INTO _order (id, price) VALUES (0, " . $price . ");";

            $this->conn->query($sql);

            $sql = "SELECT id FROM _order order by id desc limit 1";

            $result = $this->conn->query($sql);

            if ($result == null) {
                return;
            }

            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
            }

            $this->closeConnection();

            return $id;
        }
    }

    public function createOrderHasProduct($orderId, $list) {
        if ($this->establishConnection()) {
            foreach ($list as $product) {
                $sql = "INSERT INTO order_has_product (order_id, product_id, amount) VALUES ($orderId, $product->id, $product->amountInCart);";

                $this->conn->query($sql);
            }

            $this->closeConnection();
        }
    }

}
