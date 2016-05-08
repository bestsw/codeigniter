<?php
$this->view('header', array('title' => 'Billing'));
echo '<div id="result_div"><h1 align="center">Thank You! your order has been placed!</h1>
         <span id="go_back"><a class="fg-button teal" href=" '. base_url() . '"index.php/shopping>Go back</a></span>
      </div>';
$this->view('footer');