<?php
namespace kae\controller;
use \kae\core\Controller as C;
use \kae\model\ModelCheese as Cheese;
use \kae\model\ModelAddress as Address;
use \kae\model\ModelPrice as Price;
use \kae\model\ModelCheeseFull as FullProduct;
use \kae\model\ModelSort as Sort;

class PagesController extends \kae\core\Controller
{
	const objects = 8;

	public function actionIndex()
	{
        $this->products = FullProduct::findNewProducts();
	}
	public function actionImpressum()
	{
		
	}
	public function actionDocumentation()
	{

	}
	public function actionShop()
	{
		if (isset($_GET['SF'])) // builds the Filterstatement
		{
		    $filterStmt = '';
		    if (isset($_GET['t'])&& !empty($_GET['t']))
		    {
		        $filterStmt .= 'taste = "'.$_GET['t'].'" AND ';
		    }
		    if (isset($_GET['l'])&& !empty($_GET['l']))
		    {
		        $filterStmt .= 'lactose = '.$_GET['l'].' AND ';
		    }
		    if (isset($_GET['m'])&& !empty($_GET['m']))
		    {
		        $filterStmt .= 'milkType = "'.$_GET['m'].'" AND ';
		    }
		    if (isset($_GET['r'])&& !empty($_GET['r']))
		    {
		      $filterStmt .= 'rawMilk = '.$_GET['r'].' AND ';
		    }
		    if(isset($_GET['s']) && !empty($_GET['s']) && is_numeric($_GET['s']))
		    {
		    	$filterStmt .= 'sort_id = '.$_GET['s'].' AND ';
		    }
		    else{
		    	$filterStmt .= '';
		    }
		    $this->params['stmt'] = preg_replace('/\W\w+\s*(\W*)$/', '$1', $filterStmt);
		}
		else
		{
		    $this->params['stmt'] = '';
		}

		$this->params['sorts'] = Sort::find();



		$products = FullProduct::find($this->params['stmt']);
		$entries = count($products); // cpt. obvious
		
		
		if(empty($_GET['p']) || !is_numeric($_GET['p']) || 1 > $_GET['p']) // if the user didn't use the link and did type the address in by himself he might forget the p
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
		$this->params['pages'] = ceil($entries/PagesController::objects); // determines how many pages are needed
		$offset = ($_POST['p']-1)*PagesController::objects; // calculates the start of the array for the selected page
		$products = array_slice($products, $offset, PagesController::objects);// array for the selected page is sliced

		$this->params['products'] = $products;
	}

	public function loadProducts($array) // builds the block for an array of products
	{
        foreach ($array as $key => $value) 
        {
        	echo('<div class="panel">');
            $product = new FullProduct($array[$key]);
            $path = ASSETPATH.'images'.DIRECTORY_SEPARATOR.$product->pictureName;
            echo('
			<a href="index.php?c=shopping&a=product&id='.$product->id.'">	
				<div class="product_container">
						<img class="product_image" src="'.$path.'" alt="'.$product->cheeseName.'">
						<p class="product_title">'.$product->cheeseName.'</p>
						<p class ="product_descrip" >Ab</p>
						<div class ="price">'.$product->pricePerUnit.' €</div>
						<p class ="product_descrip stock" >Verfügbarkeit: '.$product->qtyInStock.'</p>
					</p>
				</div>
			</a>
		    ');
		    echo('</div>');
        }
	}
}
?>
