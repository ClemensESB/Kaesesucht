<div>
    
<?pre_r($this->currentUser);?>

    <div>
        E-Mail <?echo($this->currentUser['email']);?>
    </div>
    <div>
        Vorname <?echo($this->currentUser['firstName']);?>
    </div>
    <div>
        Nachname <?echo($this->currentUser['lastName']);?>
    </div>
    <div>
        Stadt <?echo($this->currentUser['city']);?>
    </div>
    <div>
        PLZ <?echo($this->currentUser['zipCode']);?>
    </div>
    <div>
        Straße <?echo($this->currentUser['street']);?>
    </div>
    <div>
        Hausnummer <?echo($this->currentUser['strNo'].' '.$this->currentUser['strAdd']);?>
    </div>



</div>
<div>
    <form method="POST" id="signupform" action="">
        <p>Signup</p>
        <input type="text" value="" id="firstName" name="firstName" placeholder="Vorname" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Vorname'" class="inputtext">
        <input type="text" value="" id="lastName" name="lastName" placeholder="Nachname" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nachname'" class="inputtext">
        <input type="text" value="" id="street" name="street" placeholder="Straße" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Straße'" class="inputtext">
        <input type="text" value="" id="strNo" name="strNo" placeholder="Straßennummer" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Straßennummer'" class="inputtext">
        <input type="text" value="" id="zipCode" name="zipCode" placeholder="PLZ" onfocus="this.placeholder = ''" onblur="this.placeholder = 'PLZ'" class="inputtext">
        <input type="text" value="" id="city" name="city" placeholder="Ort" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ort'" class="inputtext">
        <input type="text" value="" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" class="inputtext">
        <input type="password" id="password" name="password" placeholder="Passwort" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Passwort'" class="inputtext">
        <input type="password" id="password1" name="password1" placeholder="Passwort wiederholen" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Passwort wiederholen'" class="inputtext">
        <input type="submit" name="submit" id="signupbutton" value="Signup" class="button">
    </form>
</div>