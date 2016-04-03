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

    public function createOrder($price, $username) {
        if ($this->establishConnection()) {
//get user address
            $sql = "SELECT address_address_id FROM user_has_address WHERE user_username = $username";

            $resultAddress = $this->conn->query($sql);

            while ($row = $resultAddress->fetch_assoc()) {
                $addressId = $row['address_address_id'];
            }

//create order
            $sql = "INSERT INTO _order (user_username, price, order_state_state, address_address_delivery, address_address_billing) VALUES ($username, $price, 'processing', $addressId, $addressId);";

            $this->conn->query($sql);

            $sql2 = "SELECT last_insert_id()";

            $result = $this->conn->query($sql2);

            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
            }

//            $sql = "SELECT id FROM _order order by id desc limit 1";
//
//            $result = $this->conn->query($sql);
//            if ($result == null) {
//                return;
//            }
//            while ($row = $result->fetch_assoc()) {
//                $id = $row['id'];
//            }

            $this->closeConnection();

            return $id;
        }
    }

    public function createOrderHasProduct($orderId, $list) {
        if ($this->establishConnection()) {
            foreach ($list as $cartProduct) {
                $id = $cartProduct->product->id;
                $amount = $cartProduct->amount;
                $sql = "INSERT INTO order_has_product (order_id, product_id, amount) VALUES ($orderId, $id, $amount);";

                $this->conn->query($sql);
            }

            $this->closeConnection();
        }
    }

}
