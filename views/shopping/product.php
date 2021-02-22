<div class="panel">	
	<div class="product-image-container">
		<img class="product_image" src=<?echo(ASSETPATH.'images'.DIRECTORY_SEPARATOR.$this->fullProduct->pictureName); ?>>
	</div>
	<div class="product-info-container">
		<div class="head-container">
			<h1><?echo($this->fullProduct->cheeseName)?></h1>
		</div>
		<div class="quantity">
			<?$this->qtySelection($this->fullProduct,true,'in den Warenkorb legen');?>
		</div>
		<div class="text-box">
			<p>
				Artikelbeschreibung:<br>
				<?echo($this->fullProduct->descrip);?>
			</p>
		</div>
		<div class="text-box">
			<p>
				Rezept:<br>
				<?echo($this->fullProduct->recipe);?>
			</p>
		</div>
	</div>
</div>