<?php
$cart = $this->cart->contents();
$r = '';
// If cart is empty, this will show below message.
$head = '';
if (empty($cart)) {
   $head = 'To add products to your shopping cart click on "Add to Cart" Button';
}
$r .= '<div id="text">'.$head.'</div>';
$r .= form_open('shopping/update_cart', ' method="post" id="shopping_update_cart_form" ');
$r .= '<table id="table" border="0" cellpadding="5px" cellspacing="1px">';
// All values of cart store in "$cart".

if ($cart) {
   $r .= '<tr id= "main_heading"><td>Serial</td><td>Name</td><td>Price</td>
   <td>Qty</td><td>Amount</td><td>Cancel Product</td></tr>';
   // Create form and send all values in "shopping/update_cart" function.
   $grand_total = 0;
   $i = 1;
   foreach ($cart as $item) {
      // echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
      // Will produce the following output.
      // <input type="hidden" name="cart[1][id]" value="1" />
      $r .= '<tr><td>';
      $r .= form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
      $r .= form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
      $r .= form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
      $r .= form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
      $r .= form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);

      $r .= $i++ . '</td> <td>' . $item['name'] . '</td><td>$' . number_format($item['price'], 2) . '</td>
      <td>' . form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"') . '</td>';

      $grand_total = $grand_total + $item['subtotal'];
      $r .= '<td> $  ' . number_format($item['subtotal'], 2) . '</td><td>';
      // cancle image.
      $path = "<img src='http://localhost/codeigniter_cart/images/cart_cross.jpg' width='25px' height='20px'>";
      $r .= anchor('shopping/remove/' . $item['rowid'], $path) . '</td>';
   }
   $r .= '</tr><tr><td><b>Order Total: $' . number_format($grand_total, 2) . '</b></td>
   <td colspan="5" align="right"><input  class ="fg-button teal" type="button" value="Clear Cart" onclick="clear_cart()">';
   $r .= form_submit(array('class' => 'fg-button teal', 'value' => 'Update Cart'));
   $r .= '<input class ="fg-button teal" type="button" value="Place Order" onclick="window.location = \'shopping/billing_view\'"></td></tr>';
}
$r .= '</table>';
$r .= form_close().'<script>
   $(document).ready(function(){
      $("#shopping_update_cart_form").ajaxForm({ 
         success: function(){
            window.location = "'.base_url().'shopping";
         }
      });
   });
</script>';
$r .= '<div id="products_e" align="center"><h2 id="head" align="center">Products</h2>';
if($products){
   foreach ($products as $product) {
      $img = '';
      if(isset($product['picture']) && file_exists(base_url() . $product['picture'])){
         $img = '<img alt="test" src="' . base_url() . $product['picture'] . '"/>';
      }
      $id = $product['serial'];
      $name = $product['name'];
      $description = $product['description'];
      $price = $product['price'];
      $r .= '<div id="product_div"> <div id="image_div">'.$img.'</div>';
      $r .= form_open('shopping/add', ' method="post" id="shopping_add_form'.$id.'" ');
      $r .= '<div id="info_product"><div id="name">' . $name . '</div>
      <div id="desc">' . $description . '</div><div id="rs"><b>Price</b>:<big>' . $price . '</big></div>';

      // Create form and send values in 'shopping/add' function.
      $r .= form_hidden('id', $id); 
      $r .= form_hidden('name', $name);
      $r .= form_hidden('price', $price); 
      $r .= '</div>';
      $r .= '<div id="add_button">'.form_submit(array('class' => 'fg-button teal', 'value' => 'Add to Cart', 'name' => 'action')).'</div>';
      // Submit Button.
      $r .= form_close().'<script>
      $(document).ready(function(){
         $("#shopping_add_form'.$id.'").ajaxForm({ 
            success: function(){
               window.location = "'.base_url().'shopping";
            }
         });
      });
   </script>';
      $r .= '</div>';
   }
}

$this->view('header', array('title' => 'Codeigniter cart class'));
echo '<script type="text/javascript">
         // To conform clear all data in cart.
         function clear_cart() {
            var result = confirm("Are you sure want to clear all bookings?");

            if (result) {
               window.location = "'.base_url().'shopping/remove/all";
            } else {
               return false; // cancel button
            }
         }
      </script><div id="content"><div id="cart" ><div id = "heading">
<h2 align="center">Products on Your Shopping Cart</h2></div>
'.$r.'</div></div>';
$this->view('footer');
?>