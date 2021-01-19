<div class="head--container">
	<h1>Kasse</h1>
</div>

<?
	if(!($this->loggedIn()))
	{
	echo('Bitte loggen sie sich <a href="index.php?c=registration&a=login">hier</a> ein');
		exit(0);
	}
?>
<div class ="panel">

		

</div>

<div>
	<div class ="panel">
		<form method="POST" class="form" name="payMethod">
			<select name="payMethod" class="select-field selection--method">
				<?
				foreach ($this->params['payMethod'] as $key => $method) 
				{
					if($method == $_SESSION['order']->__get('payMethod'))
					{
						echo('<option value="'.$method.'" selected="selected">'.$method.'</option>');
					}
					else
					{
						echo('<option value="'.$method.'">'.$method.'</option>');
					}
				}
				?>

			</select>
				<button type="submit" class="btn btn--submit2" name="submit">Eingabe Bestätigen</button>
		</form>
	</div>

	<div class ="panel duoBox">
		<div>
			<p>
				Vorname: <?echo($this->currentUser['firstName']);?><br>
				Nachname: <?echo($this->currentUser['lastName']);?><br>
				Ort: <?echo($this->currentUser['city'].' '.$this->currentUser['zipCode']);?><br>
				Straße: <?echo($this->currentUser['street'].' '.$this->currentUser['strNo'].$this->currentUser['strAdd']);?><br>
				Zahlungsmethode: <?echo($_SESSION['order']->__get('payMethod'));?><br>
			</p>
		</div>
		<div>
			<p>
				<?
				foreach ($_SESSION['cart'] as $key => $value)
				{
					echo('Artikel: '.$value->__get('cheeseName').' '.$value->__get('pricePerUnit')*$value->getQuantity().' €<br>');
				}
				?>
				Summe: <?echo($_SESSION['summe']);?>€
			</p>
		</div>

	</div>
	<div class ="panel">
		<form method="POST" name="buy">
			<button type="submit" class="btn btn--submit2" name="buy">Bestellen</button>
		</form>
	</div>


</div>
	



