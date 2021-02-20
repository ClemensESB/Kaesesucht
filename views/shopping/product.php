
<div class="head--container">
	<h1><?echo($this->fullProduct->__get('cheeseName'))?></h1>
</div>	

<div class="panel">
	<div class="">
		<img class="product_image" src=<?echo(ASSETPATH.'images'.DIRECTORY_SEPARATOR.$this->fullProduct->__get('pictureName')); ?>>
	</div>
	
</div>
<div class="panel">
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
<div class="panel">
	<?$this->qtySelection($this->fullProduct,true,'in den Warenkorb legen');?>

</div>
<div class="panel">
	

</div>