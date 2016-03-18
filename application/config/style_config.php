<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  |--------------------------------------------------------------------------
  | Pages mapping
  |--------------------------------------------------------------------------
  |
  | All pages will be mapped here, so it will be changed troughout all pages
  |
 */

$this->load->helper('url');
$style = base_url() . 'assets/css/style.css';
$logo = base_url() . 'assets/pix/logo.png';
$cart = base_url() . 'assets/pix/cart.png';

$config["styling"] = array(
    "style" => $style,
    "logo" => $logo,
    "cart" => $cart
);
