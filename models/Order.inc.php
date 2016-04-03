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
    public $id;
    public $deliveryAddressId;
    public $billingAddressId;
    public $username;
    public $state;
    public $price;

    public function getOrders() {
        if ($this->establishConnection()) {
            $sql = "SELECT * FROM _order";
            $result = $this->conn->query($sql);

            $orders = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $order = new Order();
                    $order->id = $row['id'];
                    $order->deliveryAddressId = $row['address_address_delivery'];
                    $order->billingAddressId = $row['address_address_billing'];
                    $order->username = $row['user_username'];
                    $order->state = $row['order_state_state'];
                    $order->price = $row['price'];
                    $orders[] = $order;
                }
            }

            $this->closeConnection();

            return $orders;
        } else {
            return false;
        }
    }
    
    public function getStates() {
        if ($this->establishConnection()) {
            $sql = "SELECT * FROM order_state";
            $result = $this->conn->query($sql);

            $states = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $states[] = $row['state'];
                }
            }

            $this->closeConnection();

            return $states;
        } else {
            return false;
        }
    }
    
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
    
    public function editState($orderId, $state) {
        if ($this->establishConnection()) {
            $stmt = $this->conn->prepare("UPDATE _order SET order_state_state = ? WHERE id = ?");
            $stmt->bind_param('si', $state, $orderId);
            $stmt->execute();
            $this->closeConnection();
            return true;
        } else {
            return false;
        }
    }

}
