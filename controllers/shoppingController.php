<?php


namespace kae\controller;
use kae\model\ModelCheeseFull as Full;
use kae\model\ModelOrders as Order;
use kae\model\ModelAccountFull as Account;
use kae\model\ModelOrderedItems as OrderItem;
class ShoppingController extends \kae\core\Controller
{


	public function actionCheckout()
	{
		#pre_r($_POST);
		if($this->currentUser !== null)
		{
			$this->setParam('payMethod',['Bitcoin','Paypal','Sofort']);  // sets the payMethods

			if(!(isset($_SESSION['order'])))
			{
				$_SESSION['order'] = new Order(['account_id' => $this->currentUser['id']]); // is a user logged in a new order is set
			}
			if(isset($_POST['payMethod']))
			{
				$_SESSION['order']->payMethod = $_POST['payMethod']; // takes the user input for the payMethod and puts it in the order
			}
			else
			{
				$_SESSION['order']->payMethod = $this->params['payMethod'][0]; // if nothing is set paymethod is default on first element in array
			}

			if(isset($_POST['buy']))
			{	
				#pre_r($_SESSION['order']);
				#pre_r($this->params['payMethod']);
				if(in_array($_SESSION['order']->payMethod, $this->params['payMethod'])) 
				{
				#pre_r($_POST);
				$_SESSION['order']->account_id = $this->currentUser['id']; //if the User clicks buy the order is put together for the current user.
				$currentDateTime = date('Y-m-d H:i:s'); 
				$_SESSION['order']->createdAt = $currentDateTime; // to make sure the order doesn't overwrites an existing entry the time is set here and not by db
				$_SESSION['order']->insert($errors); //the order gets inserted
					foreach ($_SESSION['cart'] as $key => $product) //after the order is inserted the ordered Items are inserted
					{
						$price = $product->pricePerUnit*$product->getQuantity();
						$orderItem = new OrderItem(['cheese_id'=>$product->id,'quantity'=>$product->getQuantity(),'actualPrice'=>$price,'orders_id'=>$_SESSION['order']->id]);
						$orderItem->insert($errors);
					}
					unset($_SESSION['order']); 
					unset($_SESSION['cart']); 
					$this->redirect('index.php?c=pages&a=index');
				}
			}
		}
		
	}
	
	public function actionShoppingCart()
	{	

		#pre_r($_POST);
		$_SESSION['summe'] = 0;
		#pre_r($_GET);
		if(!empty($_SESSION['cart']))
		{
			if(isset($_POST['deleteProduct'])) // deletes a product by given id from cart
			{
				#pre_r($_POST);
				foreach ($_SESSION['cart'] as $key => $value) 
				{
					if($_SESSION['cart'][$key]->id == $_POST['delID'])
					{
						unset($_SESSION['cart'][$key]);
					}
				}
			}
			if(isset($_POST['chQuantity'])) // changes quantity of a product by given id in cart
			{
			#pre_r($_POST);
				foreach ($_SESSION['cart'] as $key => $value) 
				{
					if($_SESSION['cart'][$key]->id == $_POST['idProduct'])
					{
						$_SESSION['cart'][$key]->setQuantity($_POST['chQuantity']);
					}
				}
			}
			foreach ($_SESSION['cart'] as $key => $product) //calculates the entire sum
			{
				$_SESSION['summe'] += $product->pricePerUnit*$product->getQuantity();
			}
		}
	}
	public function actionProduct()
	{
		#pre_r($_GET['id']);
		if(Full::findOne('id = '.$_GET['id']) != null){
			$this->fullProduct = new Full(Full::findOne('id = '.$_GET['id']));

			if(isset($_POST['submit'])) // puts the Product in the shopping cart
			{
				$this->fullProduct->setQuantity($_POST['chQuantity']);
				$this->putInCart($this->fullProduct);
			}
		}
		else
		{
			$this->redirect('index.php?c=pages&a=shop');
		}

		#pre_r($this->fullProduct);
	}

	public function putInCart($fullProduct)
	{
		$bool = true;
		foreach ($_SESSION['cart'] as $key => $value) 
		{
			if($value->id == $fullProduct->id) // if the product is already in the cart the quantity is overwritten
			{
				
				$_SESSION['cart'][$key] = $fullProduct;
				$bool = false;
			}
		}
		if($bool)
		{
			array_push($_SESSION['cart'],$fullProduct); // puts the product in the cart if it's not in there
		}
	}

	public function qtySelection($product,$btn = false,$icon = '->') // function builds the quantity selection for a Product
	{
		
		echo'<form method="POST" action="" class="form" name="chQuantity">';
		echo('<select name="chQuantity" class="select-field cart--select float--left" onchange="this.form.submit();">');
			for ($i=1; $i <= $product->qtyInStock; $i++) // the user can only order maximum what we have in stock
			{
				if($product->getQuantity() == $i)
				{
					echo('<option selected="selected" value="'.$i.'">'.$i.'</option>');
				}	
				else
				{
					echo('<option value="'.$i.'">'.$i.'</option>');
				}
			}	
		echo'</select>';
		if($btn){
			echo('<button type="submit" class="button" name="submit">'.$icon.'</button>');
		}
		else
		{
			echo('<noscript><button type="submit" class="button" name="submit">'.$icon.'</button></noscript>');
		}
		echo('<input type="hidden" name="idProduct" value="'.$product->id.'">
			</form>');
	}
}