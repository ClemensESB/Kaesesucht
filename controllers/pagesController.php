<?php
namespace kae\controller;
use \kae\core\Controller as C;
use \kae\model\ModelCheese as Cheese;
use \kae\model\ModelAddress as Address;
use \kae\model\ModelPrice as Price;
use \kae\model\ModelCheeseFull as FullProduct;


class PagesController extends \kae\core\Controller
{
	const objects = 4; //only even numbers

	public function actionIndex()
	{
        $this->products = FullProduct::findNewProducts();
	}
	public function actionImpressum()
	{
		
	}
	public function actionShop()
	{
		#pre_r($_GET);
		#pre_r($_COOKIE);
		if (isset($_GET['SubmitFilter'])) // builds the Filterstatement
		{
		    $filterStmt = '';
		    if (isset($_GET['taste'])&& !empty($_GET['taste'])){
		        $taste= $_GET['taste'];
		        $filterStmt .= 'taste = "'.$taste.'" AND ';
		    }
		    if (isset($_GET['lactose'])&& !empty($_GET['lactose'])){
		        $lactose= $_GET['lactose'];
		        $filterStmt .= 'lactose = '.$lactose.' AND ';
		    }
		    if (isset($_GET['milkType'])&& !empty($_GET['milkType'])){
		        $milkType= $_GET['milkType'];
		        $filterStmt .= 'milkType = "'.$milkType.'" AND ';
		    }
		    if (isset($_GET['rawMilk'])&& !empty($_GET['rawMilk'])){
		      $rawMilk= $_GET['rawMilk'];
		      $filterStmt .= 'rawMilk = '.$rawMilk.' AND ';
		    }
		    $this->params['stmt'] = preg_replace('/\W\w+\s*(\W*)$/', '$1', $filterStmt);
		}
		else
		{
		    $this->params['stmt'] = '';
		}



		$array = FullProduct::find($this->params['stmt']);
		$entries = count($array); // cpt. obvious
		
		
		if(empty($_GET['p'])) // if the user didn't use the link and did type the address in by himself he might forget the p
		{ 
			$_GET['p'] = 1;
		}
		
		if(!isset($_POST['p']) || $_POST['p'] < $_GET['p']) // is needed to sync the paging with/without javascript only problem is altering the p while using javascript
		{
			$_POST['p'] = $_GET['p'];
		}
		elseif($_POST['p'] > $_GET['p'])
		{
			$_GET['p'] = $_POST['p'];
		}
		else{

		}
		//pre_r($_POST);
		//pre_r($_GET);
		//pre_r($_COOKIE);
		//pre_r($GLOBALS);

		$this->params['pages'] = ceil($entries/PagesController::objects); // determines how many pages are needed
		$offset = ($_POST['p']-1)*PagesController::objects; // calculates the start of the array for the selected page
		$array = array_slice($array, $offset, PagesController::objects);// array for the selected page is sliced

		$this->params['products'] = $array;
	}

	public function loadProducts($array) // builds the block for an array of products
	{
        echo('<div class="page_container">');
        foreach ($array as $key => $value) 
        {
        	echo('<div class="panel">');
            $product = new FullProduct($array[$key]);
            $path = ASSETPATH.'images'.DIRECTORY_SEPARATOR.$product->pictureName;
            echo('
			<a href="index.php?c=shopping&a=product&id='.$product->id.'">	
				<div class="product_container">
					<p class="product_title">'.$product->cheeseName.'</p>
						<img class="product_image" src="'.$path.'" alt="'.$product->cheeseName.'">
						<p class ="product_descrip" >
						Ab '.$product->pricePerUnit.' € <br>
						<br>Verfügbarkeit : '.$product->qtyInStock.'
					</p>
					<div class ="product_btn">
						<form method="GET" name="id">
						</form>
					</div>
				</div>
			</a>
		    ');
		    echo('</div>');
        }
        echo('</div>');
	}
}
?>
