<?php


namespace kae\controller;
use kae\model\ModelCheese as Cheese;
use kae\model\ModelPrice as Price;



class ShoppingController extends \kae\core\Controller
{
	protected $controller = null;
	protected $action = null;
	protected $currentUser = null;

	protected $params = [];


	public function actionCheckout()
	{

	}
	public function actionShoppingCart()
	{

		pre_r($_POST);


		if(isset($_SESSION['cart']))
		{
			$cart = $_SESSION['cart']; //TODO: wie werden die Items gespeichert cookie? session?
		}
		else
		{
			$cart = null;
		}
		if(isset($_POST['submit']))
		{
			pre_r($_POST);
		}


		$_SESSION['cart'] = array();
		
		$cheese1 = new Cheese(['cheeseName' => 'Gouda']);
		$cheese2 = new Cheese(['cheeseName' => 'Butter']);
		$cheese3 = new Cheese(['cheeseName' => 'Tilsiter']);
		array_push($_SESSION['cart'] , $cheese1);
		array_push($_SESSION['cart'] , $cheese2);
		array_push($_SESSION['cart'] , $cheese3);
		#echo('<pre>');
		#echo($_SESSION['cart'] [0]->__get('cheeseName'));
		#echo('</pre>');
		$_SESSION['cart'] [0]->__set('pictureName',ASSETPATH.'pictures'.DIRECTORY_SEPARATOR.'käse.jpg');
		$_SESSION['cart'] [0]->__set('price_id',1);
		$_SESSION['cart'] [0]->__set('id',123);
		$_SESSION['cart'] [0]->__set('qtyInStock',10);
		$_SESSION['cart'] [0]->quantity = 2;

	}
	public function actionDeleteArticle(){


		actionShoppingCart();
	}

	public function shoppingProduct($product){
		$price = new Price(Price::findOne('id = '.$product->__get('price_id')));
		#var_dump($price->__get('pricePerUnit'));

		echo('<div class="table--object has--border panel--td">
			<div class="column--prim panel--td has--border">
				<div class="column--image">
					<img src="'.$product->__get('pictureName').'" class="img--item">
				</div>
				<div class="table--content">
					<p>'.$product->__get('cheeseName').'</p>
					<p>'.$product->__get('id').'</p>
				</div>
				
			</div>');

		echo('<div class="column--sub panel--td">');
		echo('	<form method="POST">');
		echo('		<select name="chQuantity" class="select-field">');
		for ($i=1; $i <= $product->__get('qtyInStock'); $i++) {
			echo(		'<option value="'.$i.'">'.$i.'</option>');
		}

		echo('		</select>');
		echo('	<input type="hidden" name="idProduct" value="'.$product->__get('id').'">');
		echo('	</form>
			</div>');

		echo('
			<div class="column--sub panel--td is--align-right has--border">
			'.$price->__get('pricePerUnit').'
			</div>
			<div class="column--sub panel--td is--align-right has--border">
			'.$price->__get('pricePerUnit')*$product->quantity.'
			</div>
			<div class="column--sub panel--td is--align-right has--border">
			<form method="POST" action="">
			<button type="submit" name="deleteProduct" Title="X">
			</form>
			</div>'
		);
	}

}