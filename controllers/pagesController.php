<?php


namespace kae\controller;
use \kae\core\Controller as C;
use \kae\model\ModelCheese as Cheese;
use \kae\model\ModelAddress as Address;
use \kae\model\ModelPrice as Price;


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

	public function LoadProducts(){
        echo('<div class="page_container">');
        for ($i=1; $i < Cheese::countTableEntries() + 1 ; $i++) {
            $product = new Cheese(Cheese::findOne('id ='.$i));
            $price = new Price(Price::findOne('id ='.$product->__get('price_id')));
            $path = ASSETPATH.'images'.DIRECTORY_SEPARATOR.$product->__get('pictureName');


            echo('

			<div class="product_container">
		        <h2 class="product_title">'.$product->__get('cheeseName').'</h2>
		        <img class = "product_image" src="'.$path.'" alt="'.$product->__get('cheeseName').'">
		        <p class ="product_descrip" >
		            Ab '.$price->__get('pricePerUnit').' € <br><br>
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


}