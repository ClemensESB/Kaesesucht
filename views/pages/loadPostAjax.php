

<?php

use kae\model\ModelCheeseFull;

$newCount = $_POST['newCount'];
$array = ModelCheeseFull::findNProducts($this->params['stmt'],$newCount);



echo('<div id ="page_container" class="page_container">');
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
?>