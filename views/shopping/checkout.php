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
				<option value="B">Bitcoin</option>
				<option value="P">Paypal</option>
				<option value="S">Sofortüberweisung</option>
			</select>
				<button type="submit" class="btn btn--submit2" name="submit">Eingabe Bestätigen</button>
			
			<div class="duoBox">
				<div>
					<input type="text" class="pay--field" name="dummy1" placeholder="dummy1">
					<input type="text"  class="pay--field" name="dummy2" placeholder="dummy2">
				</div>
				<div>
					<input type="text"  class="pay--field" name="dummy3" placeholder="dummy3">
					<input type="tetx"  class="pay--field" name="dummy4" placeholder="dummy4">
				</div>
			</div>
		</form>
	</div>
	<div class ="panel">



	</div>
</div>
	



