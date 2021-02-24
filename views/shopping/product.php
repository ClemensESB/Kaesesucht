<div class="product">
	<div class="product-image-container">
		<img class="" src=<?echo(ASSETPATH.'images'.DIRECTORY_SEPARATOR.$this->fullProduct->pictureName); ?>>
	</div>



	<div class="product-info-container">
		<div class="product_title">
			<h1><?echo($this->fullProduct->cheeseName);?></h1>
		</div>
		<div class="text-box">
			<p >
				Preis pro 100g:
			</p>
			<div class="price">
			<?echo($this->fullProduct->pricePerUnit.' €');?>
			</div>
		</div>
		<div class="quantity">
			<?$this->qtySelection($this->fullProduct,true,'in den Warenkorb legen');?>
		</div>
		<div class="text-box">
			<h2>
				Artikelbeschreibung:
			</h2>
			<p>
				<?echo($this->fullProduct->descrip);?>
			</p>
		</div>
		<div class="text-box">
			<h2>
				Rezept:
			</h2>
			<p>
				<?echo($this->fullProduct->recipe);?>
			</p>
		</div>		
	</div>
</div>