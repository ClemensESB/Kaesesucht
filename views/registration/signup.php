
<div class="background">   
    <div class="registration content-align-mid">
        <form method="POST" id="signupform" action="">
            <p class="head">Registrierung</p>
            <input type="text" value="<?echo(isset($_POST['firstName']) ? $_POST['firstName'] : '');?>" id="firstName" name="firstName" placeholder="Vorname" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Vorname'" class="inputtext">
            <span id="firstNameError"><?echo (isset($errors['firstName']) ? $this->errors['firstName'] : '');?></span>
            <input type="text" value="<?echo(isset($_POST['lastName']) ? $_POST['lastName'] : '');?>" id="lastName" name="lastName" placeholder="Nachname" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nachname'" class="inputtext">
            <span id="lastNameError"><?echo (isset($errors['lastName']) ? $this->errors['lastName'] : '' );?></span>
            <input type="text" value="<?echo(isset($_POST['street']) ? $_POST['street'] : '');?>" id="street" name="street" placeholder="Straße" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Straße'" class="inputtext">
            <span id="streetError"><?echo (isset($errors['street']) ? $this->errors['street'] : '' );?></span>
            <input type="text" value="<?echo(isset($_POST['strNo']) ? $_POST['strNo'] : '');?>" id="strNo" name="strNo" placeholder="Straßennummer" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Straßennummer'" class="inputtext">
            <span id="strNoError"><?echo (isset($errors['strNo']) ? $this->errors['strNo'] : '' );?></span>
            <input type="text" value="<?echo(isset($_POST['zipCode']) ? $_POST['zipCode'] : '');?>" id="zipCode" name="zipCode" placeholder="PLZ" onfocus="this.placeholder = ''" onblur="this.placeholder = 'PLZ'" class="inputtext">
            <span id="zipCodeError"><?echo (isset($errors['zipCode']) ? $this->errors['zipCode'] : '' );?></span>
            <input type="text" value="<?echo(isset($_POST['city']) ? $_POST['city'] : '');?>" id="city" name="city" placeholder="Ort" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ort'" class="inputtext">
            <span id="cityError"><?echo(isset($errors['city']) ? $this->errors['city'] : '');?></span>
            <input type="text" value="<?echo(isset($_POST['email']) ? $_POST['email'] : '');?>" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" class="inputtext">
            <span id="emailError"><?echo(isset($errors['email']) ? $this->errors['email'] : '' );?></span>
            <input type="password" id="password" name="password" placeholder="Passwort" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Passwort'" class="inputtext">
            <span id="passwordError"><?echo(isset($errors['password']) ? $this->errors['password'] : '' );?></span>
            <input type="password" id="password1" name="password1" placeholder="Passwort wiederholen" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Passwort wiederholen'" class="inputtext">
            <span id="password1Error"><?echo(isset($errors['password1']) ? $this->errors['password1'] : '' );?></span>
            <input type="submit" name="submit" id="signupbutton" value="registrieren" class="button">
        </form>
            <div class="filler"></div>
            
    </div>
</div>
