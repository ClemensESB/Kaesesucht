
<?if(!empty($_SESSION['cart'])):?>
	<div class="product_title">
	<h1>Warenkorb</h1>
	</div>
	<div class="panel">
		<div class ="button content-align-mid marg-20">
			<a href="index.php?c=shopping&a=checkout">Zur Kasse Summe: <?echo($_SESSION['summe']);?> €</a>
		</div>
	</div>
		
	
<div class="panel">
	<div class="table--header">
		<div class="panel--th th--article">
			Artikel
		</div>
		<div class="panel--th th--sub">
			Anzahl
		</div>
		<div class="panel--th th--sub">
			Stückpreis
		</div>
		<div class="panel--th th--sub">
			Summe
		</div>
		<div class="panel--th th--sub">
		</div>
	</div>

	<?foreach ($_SESSION['cart']  as $key => $product):?>
		<div class="table--object">
			<div class="column--prim">
				<div class="column--image">
					<img src="<?echo(ASSETPATH.'images'.DIRECTORY_SEPARATOR.$product->pictureName)?>" class="img--item">
				</div>
				<div class="table--content">
					<p><?echo($product->cheeseName);?></p>
					<p><?echo($product->id);?></p>
				</div>
			</div>

			<?$this->qtySelection($product,false);?>

			<div class="column--sub duoBox">
				<div class="price desc">
					Stückpreis:
				</div>
				<div class="price">
					<?echo($product->pricePerUnit);?> €
				</div>
			</div>
			<div class="column--sub duoBox">
				<div class="price desc">
					gesamter Preis:
				</div>
				<div class="price">
					<?echo($product->pricePerUnit*$product->getQuantity());?> €
				</div>
			</div>
			<div class="column--sub del--action">
				<form method="POST" action="">
				<button type="submit" class="button  del--btn" name="deleteProduct">X</button>
				<input type="hidden" name="delID" value="<?echo($product->id)?>">
				</form>
			</div>
		</div>
		<?endforeach;?>
	

<?else:?>
	<div class="head--container">
		Sie haben keine Produkte ausgewählt
	</div>
	
<?endif?>
</div>
<?if(!empty($_SESSION['cart'])):?>
<div class="panel">
	<div class ="button content-align-mid marg-20">
		<a href="index.php?c=shopping&a=checkout"><?echo('Zur Kasse Summe: '.$_SESSION['summe'].' €');?></a>
	</div>
</div>
<?endif;?>