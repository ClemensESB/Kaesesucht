<div class="product_title">
	<h1>Kasse</h1>
</div>

<?
	if(!($this->loggedIn()))
	{
	echo('Bitte loggen sie sich <a href="index.php?c=registration&a=login">hier</a> ein');
		exit(0);
	}
?>
<div>
	<div class ="panel">
		<form method="POST" class="form" name="payMethod">
			<select name="payMethod" class="select-field selection--method" onchange='this.form.submit();'>
				<?if(empty($_SESSION['order']->payMethod)):?>
				<option value="" selected="selected">--Zahlungsmethode wählen--</option>
				<?endif;?>
				<?foreach ($this->params['payMethod'] as $key => $method):?>
					<?if($method == $_SESSION['order']->payMethod):?>
						<option value="<?echo($method);?>" selected="selected"><?echo($method);?></option>
					<?else:?>
						<option value="<?echo($method);?>"><?echo($method);?></option>
					<?endif;?>
				<?endforeach;?>

			</select>
				<noscript><button type="submit" class="button content-align-right" name="submit">Eingabe Bestätigen</button></noscript>
		</form>
	</div>
	<div class ="panel">
		<form method="POST" name="buy">
			<button type="submit" class="button btn--size" style="padding: 10px;" name="buy">Bestellen <?echo($_SESSION['summe']);?>€</button>
		</form>
	</div>

	<div class ="panel">
		<div>
			<p>
				Vorname: <?echo($this->currentUser['firstName']);?><br>
				Nachname: <?echo($this->currentUser['lastName']);?><br>
				Ort: <?echo($this->currentUser['city'].' '.$this->currentUser['zipCode']);?><br>
				Straße: <?echo($this->currentUser['street'].' '.$this->currentUser['strNo']);?><br>
				Zahlungsmethode: <?echo($_SESSION['order']->__get('payMethod'));?><br>
			</p>
		</div>
	</div>
		<div class="panel">
			<?foreach ($_SESSION['cart'] as $key => $value):?>

			<div class="panel border--bottom">
			<div class="table--object column--full">
				<img src="<?echo(ASSETPATH.'images'.DIRECTORY_SEPARATOR.$value->pictureName);?>" class="column--image">
				Artikel: <?echo($value->cheeseName.'<br>Anzahl: '.$value->getQuantity().'<br>Preis gesamt: '.$value->pricePerUnit*$value->getQuantity());?> €<br>
			</div>
			</div>
			<?endforeach;?>
				Summe: <?echo($_SESSION['summe']);?>€
		</div>
			
	
		

	
	


</div>
	



