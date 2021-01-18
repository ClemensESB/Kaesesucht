<div class="head--container">
	<h1>Warenkorb</h1>
	<div class ="product--btn">
		<a href="index.php?c=shopping&a=checkout"><?echo('Zur Kasse Summe: '.$this->getSum().' €');?></a>
	</div>
</div>


<div class="panel">
<?

foreach ($_SESSION['cart']  as $key => $product) {
	$price = $this::productPrice($product);

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

	echo('	<div class="column--sub">');
	echo('		<form method="POST" class="form" name="chQuantity">');
	echo('			<select name="chQuantity" class="select-field selection--qty">');
					for ($i=1; $i <= $product->__get('qtyInStock'); $i++) {
						if($product->getQuantity() == $i)
						{
							echo(		'<option selected="selected" value="'.$i.'">'.$i.'</option>');
						}
						else
						{
							echo(		'<option value="'.$i.'">'.$i.'</option>');
						}
					}
	echo('			</select>');
	echo('		<button type="submit" class="btn btn--submit" name="submit">-></button>
				<input type="hidden" name="idProduct" value="'.$product->__get('id').'">');
	echo('		</form>
			</div>');

	echo('
			<div class="column--sub duoBox">
				<div class="price">
					Stückpreis:
				</div>
				<div class="price">
					'.$price->__get('pricePerUnit').' €
				</div>
			</div>
			<div class="column--sub duoBox">
				<div class="price">
					gesamter Preis:
				</div>
				<div class="price">
					'.$price->__get('pricePerUnit')*$product->getQuantity().' €
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
?>
</div>

<div class="panel">
	<div class ="product--btn">
		<a href="index.php?c=shopping&a=checkout"><?echo('Zur Kasse Summe: '.$this->getSum().' €');?></a>
	</div>
</div>
