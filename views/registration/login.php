<div class="background">
    <div class="registration content-align-mid">
        <form method="POST" class="content-align-mid" id="loginform" action="">
            <p class="head">Anmeldung</p>
            <input type="text" value="" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" class="inputtext content-align-mid">
            <input type="password" id="password" name="password" placeholder="Passwort" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Passwort'" class="inputtext content-align-mid">
            <input type="submit" name="submit" id="loginbutton" value="anmelden" class="button content-align-mid">
        </form>
        <div>
            <?echo (isset($errors['account']) ? $errors['account'] : '');?>
        </div>
        <p>
            <a href="index.php?c=registration&a=signup">registrieren</a>
        </p>
        <div class="filler"></div>
    </div>
</div>