<div class="product_title">
	<h1><?echo($this->fullProduct->cheeseName);?></h1>
</div>

<div class="panel">	
	<div class="product-image-container">
		<img class="" src=<?echo(ASSETPATH.'images'.DIRECTORY_SEPARATOR.$this->fullProduct->pictureName); ?>>
	</div>
	<div class="product-info-container">
		<div class="text-box">
			<p>
				Artikelbeschreibung:<br>
				<?echo($this->fullProduct->descrip);?>
			</p>
		</div>
		
	</div>
</div>
	<div class="product-info-container">
		<div class="text-box">
			<p>
				Preis pro Stück:<br>
				<?echo($this->fullProduct->pricePerUnit." €");?>
			</p>
		</div>
		<div class="quantity">
			Mengenauswahl:
			<?$this->qtySelection($this->fullProduct,true,'in den Warenkorb legen');?>
		</div>
		
		<div class="text-box">
			<p>
				Rezept:<br>
				<?echo($this->fullProduct->recipe);?>
			</p>
		</div>
	</div>
