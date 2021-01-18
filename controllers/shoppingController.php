<?php


namespace kae\controller;
use kae\model\ModelCheeseFull as Full;
use kae\model\ModelOrders as Order;
use kae\model\ModelAccountFull as Account;

class ShoppingController extends \kae\core\Controller
{


	public function actionCheckout()
	{

		$this->setParam('payMethod',['Bitcoin','Paypal','Sofort']);
		if(!(isset($_SESSION['order'])))
		{
			$_SESSION['order'] = new Order(['account_id' => $this->currentUser['id']]);
		}
		if(isset($_POST['submit']))
		{
			$_SESSION['order']->__set('payMethod',$_POST['payMethod']);
		}
	}
	public function actionShoppingCart()
	{	
		$_SESSION['summe'] = 0;
		#pre_r($_GET);
		if(!empty($_SESSION['cart']))
		{
			if(isset($_POST['deleteProduct']))
			{
				#pre_r($_POST);
				foreach ($_SESSION['cart'] as $key => $value) 
				{
					if($_SESSION['cart'][$key]->__get('id') == $_POST['delID'])
					{
						unset($_SESSION['cart'][$key]);
					}
				}
			}
			if(isset($_POST['submit']))
			{
			#pre_r($_POST);
				foreach ($_SESSION['cart'] as $key => $value) 
				{
					if($_SESSION['cart'][$key]->__get('id') == $_POST['idProduct'])
					{
						$_SESSION['cart'][$key]->setQuantity($_POST['chQuantity']);
					}
				}
			}
			foreach ($_SESSION['cart'] as $key => $product) 
			{
				$_SESSION['summe'] += $product->__get('pricePerUnit')*$product->getQuantity();
			}
		}
	}
}