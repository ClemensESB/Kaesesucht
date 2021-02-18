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

		#pre_r($_GET);
		if (isset($_GET['SubmitFilter'])){
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
		else{
		    $this->params['stmt'] = '';
		}
	}



	public function loadProducts($filterStmt = '')
	{
        $array = FullProduct::find($filterStmt);

        echo('<div class="page_container">');
        foreach ($array as $key => $value) 
        {
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
        }
        echo('</div>');
	}

    public static function paging()
    {

        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = $_GET['page'];
        } else {
            $currentPage = 1;
        }
        $limit = 2;
        $startFrom = ($currentPage * $limit) - $limit;
        $offset = ($currentPage - 1) * $limit;
        $previous_page = $currentPage - 1;
        $next_page = $currentPage + 1;
        $total = FullProduct::countEntries();
        $products = Fullproduct::ProductsPerPage();
        $pages = ceil($total / $limit);

        while ($products) {
            echo('<div class="page_container">');
            foreach ($products as $key => $value) {
                $product = new FullProduct($products[$key]);
                $path = ASSETPATH . 'images' . DIRECTORY_SEPARATOR . $product->pictureName;
                echo('
			<a href="index.php?c=shopping&a=product&id=' . $product->id . '">	
				<div class="product_container">
					<p class="product_title">' . $product->cheeseName . '<p>
					<div class="product_descrip">
						<img class = "product_image" src="' . $path . '" alt="' . $product->cheeseName . '">
					</div><p class ="product_descrip" >
						Ab ' . $product->pricePerUnit . ' € <br><br>
						' . $product->descrip . '<br>
						<br>Verfügbarkeit : ' . $product->qtyInStock . '
					</p>
					<div class ="product_btn">
						<form method="GET" name="id">
						</form>
					</div>
				</div>
			</a>
		    ');
            }
            }

    

            }
}