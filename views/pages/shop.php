<meta name="viewport" content="width=device-width, initial-scale=1.0">
<div class ="shop_title">
    <h1> Unsere Sorten</h1>
    <div class = "shop_text" >
        <p>
            Besuchen Sie unsere/n Käseladen und erleben Sie, warum uns so viele Menschen vertrauen, wenn es um hochwertige Lebensmittel geht.<br>
            Bei Käsesucht erhalten Sie das absolut Beste für Sie und Ihre Familie.
        </p>
    </div>
</div>
<div class = "filter_container">
    <form method="post">
        <label for="taste">Geschmack</label>
        <select id="taste" name="taste">
            <option value="" selected>Keine Präferenz</option>
            <option value="M">Mild</option>
            <option value="W">Würzig</option>
        </select>
        <label for="lactose">Laktose</label>
        <select id="lactose" name="lactose">
            <option value="" selected>Keine Präferenz</option>
            <option value="1">Laktosefrei</option>
            <option value="2">Nicht Laktosefrei</option>
        </select>
        <label for="milkType">Milch</label>
        <select id="milkType" name="milkType">
            <option value="" selected>Keine Präferenz</option>
            <option value="K">Kuh</option>
            <option value="B">Büffel</option>
            <option value="S">Schaf</option>
            <option value="Z">Ziege</option>
        </select>
        <label for="rawMilk">Rohmilch</label>
        <select id="rawMilk" name="rawMilk">
            <option value="" selected>Keine Präferenz</option>
            <option value="1">Ja</option>
            <option value="2">Nein</option>
        </select>
        <input type="submit" name="SubmitFilter" value="Anwenden" >
    </form>
</div>

<?php

if (isset($_POST['SubmitFilter'])){
    $filterStmt = '';
    unset($Products);
    if (isset($_POST['taste'])&& !empty($_POST['taste'])){
        $taste= $_POST['taste'];
        $filterStmt .= ' taste = "'.$taste.'" AND';
    }
    if (isset($_POST['lactose'])&& !empty($_POST['lactose'])){
        $lactose= $_POST['lactose'];
        $filterStmt .= ' lactose = '.$lactose.' AND';
    }
    if (isset($_POST['milkType'])&& !empty($_POST['milkType'])){
        $milkType= $_POST['milkType'];
        $filterStmt .= ' milkType = "'.$milkType.'" AND';
    }
    if (isset($_POST['rawMilk'])&& !empty($_POST['rawMilk'])){
      $rawMilk= $_POST['rawMilk'];
      $filterStmt .= ' rawMilk = '.$rawMilk.' AND';
    }

    $Stmt= preg_replace('/\W\w+\s*(\W*)$/', '$1', $filterStmt);
    $this->LoadProducts($Stmt);
}
else{
    $Products=$this->LoadProducts();
}

?>










