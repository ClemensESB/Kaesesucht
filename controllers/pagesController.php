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

	public function tabelleDieDuAnderNennst(){
		for ($i=2; $i < Cheese::countTableEntries() + 2 ; $i++) { 
			$product = new Cheese(Cheese::findOne('id ='.$i));
			$price = new Price(Price::findOne('id ='.$product->__get('price_id')));
			$path = ASSETPATH.'images'.DIRECTORY_SEPARATOR.$product->__get('pictureName');


			echo('
			<div  >
		        <h2>'.$product->__get('cheeseName').'</h2>
		        <img src="'.$path.'" alt="'.$product->__get('cheeseName').'" class = "img">
		        <p class ="descrip" >
		            Ab '.$price->__get('pricePerUnit').' € <br><br>
		            Bei unseren Kunden immer beliebt und sehr gerne von unseren Mitarbeitern empfohlen.<br> Kosten Sie selbst und schmecken Sie,
		            warum wir nicht aufhören können, über unsere feine Auswahl an '.$product->__get('cheeseName').' zu sprechen.<br><br> <br><br>Verfügbarkeit : '.$product->__get('qtyInStock').'
		        </p>
		        <br><br>
		        <div class = "btn">
		            <a href="index.php?c=pages&a=product">Mehr erfahren</a>
		        </div>

		    </div>
		    ');
		}
	}

}