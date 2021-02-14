<?php


namespace kae\controller;
use \kae\core\Controller as C;
use \kae\model\ModelCheese as Cheese;
use \kae\model\ModelAddress as Address;
use \kae\model\ModelPrice as Price;
use \kae\model\ModelCheeseFull as FullProduct;


class PagesController extends \kae\core\Controller
{


	public function actionIndex()
	{
		$this->products = FullProduct::findNewProducts();
	}
	public function actionImpressum()
	{
		
	}
	public function actionShop()
	{
		#pre_r($_POST);
		if (isset($_POST['SubmitFilter'])){
		    $filterStmt = '';
		    unset($Products);
		    if (isset($_POST['taste'])&& !empty($_POST['taste'])){
		        $taste= $_POST['taste'];
		        $filterStmt .= 'taste = "'.$taste.'" AND ';
		    }
		    if (isset($_POST['lactose'])&& !empty($_POST['lactose'])){
		        $lactose= $_POST['lactose'];
		        $filterStmt .= 'lactose = '.$lactose.' AND ';
		    }
		    if (isset($_POST['milkType'])&& !empty($_POST['milkType'])){
		        $milkType= $_POST['milkType'];
		        $filterStmt .= 'milkType = "'.$milkType.'" AND ';
		    }
		    if (isset($_POST['rawMilk'])&& !empty($_POST['rawMilk'])){
		      $rawMilk= $_POST['rawMilk'];
		      $filterStmt .= 'rawMilk = '.$rawMilk.' AND ';
		    }
		    $this->params['stmt'] = preg_replace('/\W\w+\s*(\W*)$/', '$1', $filterStmt);
		}
		else{
		    $this->params['stmt'] = '';
		}
	}



	public function loadProducts($filterStmt = '')
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
	public function actionProfil()
	{
		if(!$this->loggedIn())
		{
			$this->redirect('index.php?c=registration&a=login');
		}

		
		
	}

}