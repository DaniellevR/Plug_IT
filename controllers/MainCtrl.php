<?php

class MainCtrl {

    public function Home() {
        $this->View('home', 'Hello world');
    }

    public function About() {
        $this->View('about', 'Im awesome');
    }

    public function Contact() {
        $this->View('contact', 'Call me maybe?');
    }
    
    public function Admin() {
        $this->View('admin', 'adm');
    }
    
    public function Catalogue() {
        $this->View('catalogue', '');
    }
    
    public function Category() {
        $this->View('category', '');
    }
    
    public function Conditions() {
        $this->View('conditions', '');
    }
    
    public function Information() {
        $this->View('information', '');
    }
    
    public function OrderAndDeliviry() {
        $this->View('orderAndDeliviry', '');
    }
    
    public function PaymentInfo() {
        $this->View('paymentInfo', '');
    }
    
    public function Product() {
        $this->View('product', '');
    }
    
    public function RetourInfo() {
        $this->View('retourInfo', '');
    }
    
    public function Cart() {
        $this->View('cart', '');
    }
    
    public function Wishlist() {
        $this->View('wishlist', '');
    }

    public function MyAccount() {
        $this->View('myAccount', '');
    }
    
    public function CustomerService() {
        $this->View('customerService', '');
    }
}

?>