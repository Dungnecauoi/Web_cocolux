
<?php
    include "models/CartModel.php";
    class CartController 
    {
        use CartModel;
        public function __construct()
        {
            if(isset($_SESSION['cart']) == false)
            {
                $_SESSION['cart'] = [];
            }
        }
        public function index()
        {
			// $id = $_SESSION['cart']['id'];
            $quantity = $this->modelQuantityProduct();
            return View::make("CartView.php",['quantity'=>$quantity]);
        }
        public function create()
        {
            $id = $_GET['id']?$_GET['id']:0;
            $this->cartAdd($id);
            header("location:cart");
        }
        public function createNow()
        {
            $id = $_GET['id']?$_GET['id']:0;
            $this->cartAdd($id);
            header("location:index.php?controller=cart&action=cartPayView");
        }
        public function update()
        {
            foreach($_SESSION['cart'] as $product)
            {
                $quantity = $_POST['quantity'];
                $this->cartUpdate($product['id'],$quantity);
                $html =
                "
                <td style='display:flex;flex-direction:row ;align-items:center'><img style='width:50px' src='assets/upload/products/{$product['photo']}'>{$product['name']}</td>
                <td>number_format({$product['price']} - ({$product['price']}*{$product['discount']})/100)Đ</td>
                <td><input style='width: 40px;border: none;outline: none;' type='number' name='product_{$product['id']};' min='1' max='{$quantity->quantity}' value='{$product['number']}' class='quantity ajax_quantity_cart'></td>
                <td>number_format(({$product['price']} - ({$product['price']}*{$product['discount']})/100)*{$product['number']} )Đ</td>
                <td><a href='javascript:void(0)' type='button' onclick='deleteCart({$product['id']})'><i style='font-size:20px; color:red;cursor:pointer' class='fa-solid fa-square-xmark'></i></a></td>
                ";
            }
            echo $html;
            // header('location:index.php?controller=cart'); 
        }
        public function delete()
        {
            $id = $_GET['id']?$_GET['id']:0;
            $this->cartDelete($id);
            header('location:index.php?controller=cart');
        }
        public function cartPayView()
        {
            return View::make("CartPayView.php");
        }
        public function checkout()
        {
            if(isset($_SESSION['customer_email']) == false)
            header("location:index.php?controller=account&action=login");
        else{
            // goi ham cartCheckout trong model
            $this->cartCheckout();
            header("location:index.php?controller=cart&notify=success");
        }
        }
        public function destroy()
        {
            $this->cartDestroy();
            header('location:index.php?controller=cart');
        }
    }
?>