<h1>Warenkorb</h1>

<div class="panel has--border">
	<div class="panel--body has--border">
		<div class="table--header has--border">
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
		#foreach ($_SESSION['cart']  as $key => $product) {
		#	$this->shoppingProduct($product);
		#}
		$this->shoppingProduct($_SESSION['cart'][0]);
		?>
		</div>
	</div>
</div>

<a href="index.php?c=shopping&a=checkout">Kasse</a>