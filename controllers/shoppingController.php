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

		$this->setParam('payMethod',['Bitcoin','Paypal','Sofort']);
		if($this->currentUser !== null && !(isset($_SESSION['order'])))
		{
			$_SESSION['order'] = new Order(['account_id' => $this->currentUser['id']]);
		}
		if(isset($_POST['submit']))
		{
			$_SESSION['order']->__set('payMethod',$_POST['payMethod']);
		}

		if(isset($_POST['buy']))
		{	
			#pre_r($_SESSION['order']);
			#pre_r($this->params['payMethod']);
			if(in_array($_SESSION['order']->__get('payMethod'), $this->params['payMethod']))
			{
			#pre_r($_POST);
			$_SESSION['order']->__set('account_id',$this->currentUser['id']);
			$currentDateTime = date('Y-m-d H:i:s');
			$_SESSION['order']->__set('createdAt',$currentDateTime);
			$_SESSION['order']->insert($errors);
				foreach ($_SESSION['cart'] as $key => $product) 
				{
					$price = $product->__get('pricePerUnit')*$product->getQuantity();

					$orderItem = new OrderItem(['cheese_id'=>$product->__get('id'),'quantity'=>$product->getQuantity(),'actualPrice'=>$price,'orders_id'=>$_SESSION['order']->__get('id')]);
					$orderItem->insert($errors);
				}
				unset($_SESSION['order']);
				unset($_SESSION['cart']);
				$this->redirect('index.php?c=pages&a=index');
			}
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
	public function actionProduct()
	{
		if(Full::findOne('id = '.$_GET['id']) != null){
			$this->fullProduct = new Full(Full::findOne('id = '.$_GET['id']));

			if(isset($_POST['submit']))
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
		$bool = false;
		foreach ($_SESSION['cart'] as $key => $value) 
		{
			if($value->__get('id') == $fullProduct->__get('id'))
			{
				$bool = true;
			}
		}
		if(!$bool)
		{
			array_push($_SESSION['cart'],$fullProduct);
		}
	}

	public function qtySelection($product,$label = '->')
	{
	echo('	<div class="column--sub">');
	echo('		<form method="POST" class="form" name="chQuantity">
					<select name="chQuantity" class="select-field selection--qty">');
					for ($i=1; $i <= $product->__get('qtyInStock'); $i++) {
						if($product->getQuantity() == $i)
						{
							echo('<option selected="selected" value="'.$i.'">'.$i.'</option>');
						}
						else
						{
							echo('<option value="'.$i.'">'.$i.'</option>');
						}
					}
	echo('			</select>');

	echo('		<button type="submit" class="btn btn--submit" name="submit">'.$label.'</button>
				<input type="hidden" name="idProduct" value="'.$product->__get('id').'">');
	echo('		</form>
			</div>');
	}


}