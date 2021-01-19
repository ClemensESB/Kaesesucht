<?
if(!empty($_SESSION['cart']))
{
echo ('
	<div class="head--container">
	<h1>Warenkorb</h1>
		<div class ="product--btn">
			<a href="index.php?c=shopping&a=checkout">Zur Kasse Summe: '.$_SESSION['summe'].' €</a>
		</div>
	</div>	
<div class="panel">'
);
	foreach ($_SESSION['cart']  as $key => $product) 
	{

	echo('<div class="table--object">
			<div class="column--prim">
				<div class="column--image">
					<img src="'.ASSETPATH.'images'.DIRECTORY_SEPARATOR.$product->__get('pictureName').'" class="img--item">
				</div>
				<div class="table--content">
					<p>'.$product->__get('cheeseName').'</p>
					<p>'.$product->__get('id').'</p>
				</div>
			</div>');

	$this->qtySelection($product);

	echo('
			<div class="column--sub duoBox">
				<div class="price">
					Stückpreis:
				</div>
				<div class="price">
					'.$product->__get('pricePerUnit').' €
				</div>
			</div>
			<div class="column--sub duoBox">
				<div class="price">
					gesamter Preis:
				</div>
				<div class="price">
					'.$product->__get('pricePerUnit')*$product->getQuantity().' €
				</div>
			</div>
			<div class="column--sub del--action">
				<form method="POST" action="">
				<button type="submit" class="btn  del--btn" name="deleteProduct">X</button>
				<input type="hidden" name="delID" value="'.$product->__get('id').'">
				</form>
			</div>
		</div>');
	}
}
else{
	echo('Sie haben keine Produkte ausgewählt');
}

?>
</div>

<div class="panel">
	<div class ="product--btn">
		<a href="index.php?c=shopping&a=checkout"><?echo('Zur Kasse Summe: '.$_SESSION['summe'].' €');?></a>
	</div>
</div>
