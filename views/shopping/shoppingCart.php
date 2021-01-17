<h1>Warenkorb</h1>

<div class="panel">
	<div class="panel--body">
		<div class="table--header">
			<div class="column--prim panel--th">
				Artikel
			</div>
			<div class="column--sub panel--th is--align-right">
				Menge
			</div>
			<div class="column--sub panel--th is--align-right">
				Stückpreis
			</div>
			<div class="column--sub panel--th is--align-right">
				Summe
			</div>
			<div class="column--sub panel--th is--align-right">
			</div>
		</div>


<?
$sum = 0.0 ;
foreach ($_SESSION['cart']  as $key => $product) {
	$price = $this::productPrice($product);
	$sum += $price->__get('pricePerUnit')*$product->quantity;

	echo('<div class="table--object panel--td">
			<div class="column--prim panel--td">
				<div class="column--image">
					<img src="'.ASSETPATH.'images'.DIRECTORY_SEPARATOR.$product->__get('pictureName').'" class="img--item">
				</div>
				<div class="table--content">
					<p>'.$product->__get('cheeseName').'</p>
					<p>'.$product->__get('id').'</p>
				</div>
			</div>');

	echo('	<div class="column--sub panel--td">');
	echo('		<form method="POST" class="form" name="chQuantity">');
	echo('			<select name="chQuantity" class="select-field">');
					for ($i=1; $i <= $product->__get('qtyInStock'); $i++) {
						if($product->quantity == $i)
						{
							echo(		'<option selected="selected" value="'.$i.'">'.$i.'</option>');
						}
						else
						{
							echo(		'<option value="'.$i.'">'.$i.'</option>');
						}
					}
	echo('			</select>');
	echo('		<button type="submit" class="btn" name="submit">-></button>
				<input type="hidden" name="idProduct" value="'.$product->__get('id').'">');
	echo('		</form>
			</div>');

	echo('
			<div class="column--sub panel--td is--align-right">'.$price->__get('pricePerUnit').' €
			</div>
			<div class="column--sub panel--td is--align-right">'.$price->__get('pricePerUnit')*$product->quantity.' €
			</div>
			<div class="column--sub panel--td is--align-right">
				<form method="POST" class="form" action="">
				<button type="submit" class="btn" name="deleteProduct">X</button>
				<input type="hidden" name="delID" value="'.$product->__get('id').'">
				</form>
			</div>
		</div>');
}


?>
		<div class="table--object panel--td">
			
			<?echo('Summe: '.$sum.' €');?>

		</div>



	</div>
</div>


<a href="index.php?c=shopping&a=checkout">Kasse</a>