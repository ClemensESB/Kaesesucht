<?php


namespace kae\controller;
use \kae\core\Controller as C;
use \kae\model\ModelCheese as Cheese;
use \kae\model\ModelAddress as Address;
use \kae\model\ModelPrice as Price;
use \kae\model\ModelCheeseFull as FullProduct;


class PagesController extends \kae\core\Controller
{
	protected $controller = null;
	protected $action = null;
	protected $currentUser = null;

	protected $params = [];

	public function actionIndex()
	{


		
		
	}
	public function actionImpressum()
	{
		
	}
	public function actionProduct()
	{
		
	}
	public function actionShop()
	{
		
	}

	public function LoadProducts($filterStmt = '')
	{

        $array = FullProduct::find($filterStmt);

        echo('<div class="page_container">');
        foreach ($array as $key => $value) {

            $product = new FullProduct($array[$key]);
            $path = ASSETPATH.'images'.DIRECTORY_SEPARATOR.$product->__get('pictureName');


            echo('

			<div class="product_container">
		        <h2 class="product_title">'.$product->__get('cheeseName').'</h2>
		        <img class = "product_image" src="'.$path.'" alt="'.$product->__get('cheeseName').'">
		        <p class ="product_descrip" >
		            Ab '.$product->__get('pricePerUnit').' € <br><br>
		            '.$product->__get('descrip').'<br><br>
		            Bei unseren Kunden immer beliebt und sehr gerne von unseren Mitarbeitern empfohlen.<br> Kosten Sie selbst und schmecken Sie,
		            warum wir nicht aufhören können, über unsere feine Auswahl an '.$product->__get('cheeseName').' zu sprechen.<br><br> <br><br>Verfügbarkeit : '.$product->__get('qtyInStock').'
		        </p>
		        <div class ="product_btn">
		            <a href="index.php?c=pages&a=product">Mehr erfahren</a>
		        </div>
		    </div>
		    
		    ');
        }
        echo('</div>');
        
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
}