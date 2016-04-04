<?php

/*
 *
 * Webshop Plug IT
 *
 * Made by : Nigel Liebers and Danielle van Rooij
 *
 * Avans 's-Hertogenbosch 2016 (c)
 *
 */

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/models/Database.inc.php");

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

    /**
     * Get all orders
     * @return \Order|boolean
     */
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

    /**
     * Get available states an order can have
     * @return boolean
     */
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

    /**
     * Create an order
     * @param type $username
     * @param type $deliveryAddressId
     * @param type $billingAddressId
     * @param type $state
     * @param type $price
     * @return type int (id)
     */
    public function createFullOrder($username, $deliveryAddressId, $billingAddressId, $state, $price) {
        if ($this->establishConnection()) {
            $sql = "INSERT INTO _order (id, address_address_delivery, address_address_billing, user_username, order_state_state, price) VALUES (0, " . $this->conn->real_escape_string($deliveryAddressId) .
                    ", " . $this->conn->real_escape_string($billingAddressId) . ", '" . $this->conn->real_escape_string($username) . "', '" . $this->conn->real_escape_string($state) . "', " .
                    $this->conn->real_escape_string($price) . ")";
            $result = $this->conn->query($sql);

            $id = mysqli_insert_id($this->conn);

            $this->closeConnection();

            return $id;
        } else {
            return -1;
        }
    }

    /**
     * Create an order
     * @param type $price
     * @param type $username
     * @return type int (id)
     */
    public function createOrder($price, $username) {
        if ($this->establishConnection()) {
//get user address
            $sql = "SELECT address_address_id FROM user_has_address WHERE user_username = '$username'";

            $result = $this->conn->query($sql);

            $addressId;

            while ($row = $result->fetch_assoc()) {
                $addressId = $row['address_address_id'];
            }

//create order
            $sql = "INSERT INTO _order (`address_address_delivery`, `address_address_billing`, `user_username`, `order_state_state`, `price`) VALUES ($addressId, $addressId, '$username', 'processing', $price)";

            $this->conn->query($sql);

            $sql = "SELECT last_insert_id()";

            $result = $this->conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                $id = $row['last_insert_id()'];
            }

            $this->closeConnection();

            return $id;
        }
    }

    /**
     * Add products to an order (from list)
     * @param type $orderId
     * @param type $list
     */
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

    /**
     * Add product to order
     * @param type $orderId
     * @param type $productId
     * @param type $amount
     * @return type int (id)
     */
    public function addProductToOrder($orderId, $productId, $amount) {
        if ($this->establishConnection()) {
            $stmt = $this->conn->prepare("INSERT INTO order_has_product (order_id, product_id, amount) VALUES (?, ?, ?)");
            $stmt->bind_param('iii', $orderId, $productId, $amount);

            $stmt->execute();
            $generated_id = $stmt->insert_id;

            $this->closeConnection();

            return $generated_id;
        } else {
            return -1;
        }
    }

    /**
     * Edit state of order
     * @param type $orderId
     * @param type $state
     * @return boolean
     */
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
