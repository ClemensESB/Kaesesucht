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


		
		
	}
	public function actionImpressum()
	{
		
	}
	public function actionShop()
	{
		if (isset($_GET['SubmitFilter'])){
		    $filterStmt = '';
		    unset($Products);
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
		else{
		    $this->params['stmt'] = '';
		}
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
    public function actionHome()
    {
        $array = FullProduct::findNewProducts();
        echo('<div class="page_container">');

            for ($x=0; $x<3 ;$x++) {
            $product = new FullProduct($array[$x]);
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

	public function actionProfil(){
		if(!$this->loggedIn()){
			$this->redirect('index.php?c=registration&a=login');
		}

	}
}