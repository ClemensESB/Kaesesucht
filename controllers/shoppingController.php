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
		$this->setParam('payMethod',['Bitcoin','Paypal','Sofort']);
		if($this->currentUser !== null && !(isset($_SESSION['order'])))
		{
			$_SESSION['order'] = new Order(['account_id' => $this->currentUser['id']]);
		}
		if(isset($_POST['payMethod']))
		{
			$_SESSION['order']->payMethod = $_POST['payMethod'];
		}
		else{
			$_SESSION['order']->payMethod = $this->params['payMethod'][0];
		}

		if(isset($_POST['buy']))
		{	
			#pre_r($_SESSION['order']);
			#pre_r($this->params['payMethod']);
			if(in_array($_SESSION['order']->payMethod, $this->params['payMethod']))
			{
			#pre_r($_POST);
			$_SESSION['order']->account_id = $this->currentUser['id'];
			$currentDateTime = date('Y-m-d H:i:s');
			$_SESSION['order']->createdAt = $currentDateTime;
			$_SESSION['order']->insert($errors);
				foreach ($_SESSION['cart'] as $key => $product) 
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
	public function actionShoppingCart()
	{	

		#pre_r($_POST);
		$_SESSION['summe'] = 0;
		#pre_r($_GET);
		if(!empty($_SESSION['cart']))
		{
			if(isset($_POST['deleteProduct']))
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
			if(isset($_POST['chQuantity']))
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
			foreach ($_SESSION['cart'] as $key => $product) 
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
		$bool = true;
		foreach ($_SESSION['cart'] as $key => $value) 
		{
			if($value->id == $fullProduct->id)
			{
				
				$_SESSION['cart'][$key] = $fullProduct;
				$bool = false;
			}
		}
		if($bool)
		{
			array_push($_SESSION['cart'],$fullProduct);
		}
	}

	public function qtySelection($product,$btn = false,$icon = '->')
	{

		echo'<div class="column--sub duoBox">';
		echo'<div class="price desc">Anzahl:</div>';
		echo'<form method="POST" action="" class="form" name="chQuantity">';
		?><select name="chQuantity" class="select-field cart--select" onchange='this.form.submit();'><?

			for ($i=1; $i <= $product->qtyInStock; $i++)
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
			echo('<button type="submit" class="button float--right" name="submit">'.$icon.'</button>');
		}
		else
		{
			echo('<noscript><button type="submit" class="button float--right" name="submit">'.$icon.'</button></noscript>');
		}
		echo('<input type="hidden" name="idProduct" value="'.$product->id.'">
			</form>
			</div>');
	}
}