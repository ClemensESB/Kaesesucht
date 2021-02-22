<div class="home_top">
   <p class ="home_text">Entdecken Sie unser Angebot aus Feinkost und ausgesuchten Käsevariationen!<p>
   <div class ="home_text">
    <a class = "home_linkbutton" href="index.php?c=pages&a=shop">Zum Shop</a>
   </div>
</div>
<div>
<p class ="home_text">Neue Produkte<p>
</div>	
        <div class="page_container">
            <?foreach ($this->products as $product):
	            $path = ASSETPATH.'images'.DIRECTORY_SEPARATOR.$product['pictureName'];?>
			<a href="index.php?c=shopping&a=product&id=<?echo ($product['id']);?>">	
				<div class="product_container">
					<div class="product_descrip">
						<img class = "product_image" src="<?echo($path);?>" alt="<?echo ($product['cheeseName']);?>">
					</div><p class ="product_descrip" >
					<p class="product_title"><?echo ($product['cheeseName']);?><p>	
					Ab <?echo($product['pricePerUnit']);?> € <br><br>
					<br>Verfügbarkeit : <?echo($product['qtyInStock']);?>
					</p>
					<div class ="product_btn">
						<form method="GET" name="id">
						</form>
					</div>
				</div>
			</a>
			<?endforeach;?>
 		</div>
 <div class ="home_text">
    <a class = "home_linkbutton" href="index.php?c=pages&a=shop">Alle Produkte ansehen</a>
 </div>