<div class="registration content-align-mid">
    <form method="POST" id="signupform" action="">
        <p class="head">Signup</p>
        <input type="text" value="<?echo(isset($_POST['firstName']) ? $_POST['firstName'] : '');?>" id="firstName" name="firstName" placeholder="Vorname" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Vorname'" class="inputtext">
        <div><?echo (isset($this->params['errors']['firstName']) ? $this->params['errors']['firstName'] : '');?></div>
        <input type="text" value="<?echo(isset($_POST['lastName']) ? $_POST['lastName'] : '');?>" id="lastName" name="lastName" placeholder="Nachname" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nachname'" class="inputtext">
        <div><?echo (isset($this->params['errors']['lastName']) ? $this->params['errors']['lastName'] : '' );?></div>
        <input type="text" value="<?echo(isset($_POST['street']) ? $_POST['street'] : '');?>" id="street" name="street" placeholder="Straße" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Straße'" class="inputtext">
        <div><?echo (isset($this->params['errors']['street']) ? $this->params['errors']['street'] : '' );?></div>
        <input type="text" value="<?echo(isset($_POST['strNo']) ? $_POST['strNo'] : '');?>" id="strNo" name="strNo" placeholder="Straßennummer" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Straßennummer'" class="inputtext">
        <div><?echo (isset($this->params['errors']['strNo']) ? $this->params['errors']['strNo'] : '' );?></div>
        <input type="text" value="<?echo(isset($_POST['zipCode']) ? $_POST['zipCode'] : '');?>" id="zipCode" name="zipCode" placeholder="PLZ" onfocus="this.placeholder = ''" onblur="this.placeholder = 'PLZ'" class="inputtext">
        <div><?echo (isset($this->params['errors']['zipCode']) ? $this->params['errors']['zipCode'] : '' );?></div>
        <input type="text" value="<?echo(isset($_POST['city']) ? $_POST['city'] : '');?>" id="city" name="city" placeholder="Ort" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ort'" class="inputtext">
        <div><?echo(isset($this->params['errors']['city']) ? $this->params['errors']['city'] : '');?></div>
        <input type="text" value="<?echo(isset($_POST['email']) ? $_POST['email'] : '');?>" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" class="inputtext">
        <div><?echo(isset($this->params['errors']['email']) ? $this->params['errors']['email'] : '' );?></div>
        <input type="password" id="password" name="password" placeholder="Passwort" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Passwort'" class="inputtext">
        <div><?echo(isset($this->params['errors']['password']) ? $this->params['errors']['password'] : '' );?></div>
        <input type="password" id="password1" name="password1" placeholder="Passwort wiederholen" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Passwort wiederholen'" class="inputtext">
        
        <input type="submit" name="submit" id="signupbutton" value="Signup" class="button">
    </form>
        <div class="filler"></div>
        <script type="text/javascript" src="assets/scripts/valid.js"></script>
</div>