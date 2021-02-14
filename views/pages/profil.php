<div class="head--container">
    <h1>Benutzerdaten ändern</h1>
</div>
<div id="id">
    <a href="javascript:toggle('containerid')">Nutzerdaten ändern</a>
    <div id="containerid" style="display:none">
        <form method="POST" id="editUser" action="">
            
            <input type="text" value="<?echo($this->currentUser['email']);?>" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" class="inputtext">
            <input type="text" value="<?echo($this->currentUser['city']);?>" id="city" name="city" placeholder="Ort" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ort'" class="inputtext">
            <input type="text" value="<?echo($this->currentUser['street']);?>" id="street" name="street" placeholder="Straße" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Straße'" class="inputtext">
            <input type="text" value="<?echo($this->currentUser['strNo']);?>" id="strNo" name="strNo" placeholder="Straßennummer" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Straßennummer'" class="inputtext">
            <input type="text" value="<?echo($this->currentUser['zipCode']);?>" id="zipCode" name="zipCode" placeholder="PLZ" onfocus="this.placeholder = ''" onblur="this.placeholder = 'PLZ'" class="inputtext">
            <input type="password" id="password" name="password" placeholder="Passwort" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Passwort'" class="inputtext">
            <input type="password" id="password1" name="password1" placeholder="Passwort wiederholen" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Passwort wiederholen'" class="inputtext">
            <input type="submit" name="submit" id="editUser" value="editUser" class="button">
        </form>
    </div>
</div>
<noscript>
    <div id="id" >
    <form method="POST" id="editUser" action="">
        
        <input type="text" value="<?echo($this->currentUser['email']);?>" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" class="inputtext">
        <input type="text" value="<?echo($this->currentUser['city']);?>" id="city" name="city" placeholder="Ort" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ort'" class="inputtext">
        <input type="text" value="<?echo($this->currentUser['street']);?>" id="street" name="street" placeholder="Straße" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Straße'" class="inputtext">
        <input type="text" value="<?echo($this->currentUser['strNo']);?>" id="strNo" name="strNo" placeholder="Straßennummer" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Straßennummer'" class="inputtext">
        <input type="text" value="<?echo($this->currentUser['zipCode']);?>" id="zipCode" name="zipCode" placeholder="PLZ" onfocus="this.placeholder = ''" onblur="this.placeholder = 'PLZ'" class="inputtext">
        <input type="password" id="password" name="password" placeholder="Passwort" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Passwort'" class="inputtext">
        <input type="password" id="password1" name="password1" placeholder="Passwort wiederholen" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Passwort wiederholen'" class="inputtext">
        <input type="submit" name="submit" id="editUser" value="editUser" class="button">
    </form>
</div>
</noscript>






<script type="text/javascript">
  function toggle(id){
    var e = document.getElementById(id);
    
    if (e.style.display == "none"){
       e.style.display = "";
    } else {
       e.style.display = "none";
    }
  }
</script>