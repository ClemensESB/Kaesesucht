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

			<a href="index.php?c=shopping&a=product&id='.$product->__get('id').'">	
				<div class="product_container">
					<p class="product_title">'.$product->__get('cheeseName').'<p>
					<div class="product_descrip">
						<img class = "product_image" src="'.$path.'" alt="'.$product->__get('cheeseName').'">
					</div><p class ="product_descrip" >
						Ab '.$product->__get('pricePerUnit').' € <br><br>
						'.$product->__get('descrip').'<br>
						<br>Verfügbarkeit : '.$product->__get('qtyInStock').'
					</p>
					<div class ="product_btn">
						<form method="GET" name="id">
						
						</form>
					</div>
				</div>
			</a>
		    ');
        }
        echo('</div>');
        
	}

}