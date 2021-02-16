<div class="head--container">
    <h1>Benutzerdaten ändern</h1>
</div>

<div>
    <p>
        Hallo <?echo($this->currentUser['firstName'].' '.$this->currentUser['lastName']);?>,
        ich weiß wo du wohnst.
        Nämlich in <?echo($this->currentUser['city'].' '.$this->currentUser['zipCode']);?>.
        Dorthin werde ich liefern in die <?echo($this->currentUser['street'].' '.$this->currentUser['strNo']);?>.
        Nehm dich in acht denn unser Käse wird deine Geschmacksnerven sprengen und dich für immer von ihm abhängig machen.
    </p>
</div>
<div id="id">
    <a href="javascript:toggle('dataid')">Nutzerdaten ändern</a>
    <div id="dataid" style="display:none">
        <form method="POST" id="editUser" action="">
            
            <input type="text" value="<?echo($this->currentUser['email']);?>" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" class="inputtext">
            <input type="text" value="<?echo($this->currentUser['city']);?>" id="city" name="city" placeholder="Ort" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ort'" class="inputtext">
            <input type="text" value="<?echo($this->currentUser['street']);?>" id="street" name="street" placeholder="Straße" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Straße'" class="inputtext">
            <input type="text" value="<?echo($this->currentUser['strNo']);?>" id="strNo" name="strNo" placeholder="Straßennummer" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Straßennummer'" class="inputtext">
            <input type="text" value="<?echo($this->currentUser['zipCode']);?>" id="zipCode" name="zipCode" placeholder="PLZ" onfocus="this.placeholder = ''" onblur="this.placeholder = 'PLZ'" class="inputtext">
            <input type="submit" name="submit" id="editUser" value="editUser" class="button">
        </form>
    </div>
</div>

<div id="id">
    <a href="javascript:toggle('orderid')">Meine Bestellungen</a>
    <div id="orderid" style="display:none">
        <?foreach($this->params['orders'] as $key => $value):?>
        
            <div class="panel has--border">
                <?echo('Datum: '.$value[0]['orderDate'].' Zahlungsmethode: '.$value[0]['payMethod']);?>
                <?foreach($value as $item):?>
                    <div class="table--object">
                        <div class="column--prim">
                        <img src="<?echo(ASSETPATH.'images'.DIRECTORY_SEPARATOR.$item['pictureName']);?>" class="column--image">
                        
                        Produkt: <?echo($item['cheeseName']);?>
                        Stückzahl: <?echo($item['quantity']);?>
                        Preis: <?echo($item['price']);?> €
                        </div>
                        
                    </div>
                <?endforeach;?>
            </div>
        <?endforeach;?>
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