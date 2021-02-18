<meta name="viewport" content="width=device-width, initial-scale=1.0">
<div class = "filter_container content-align-mid">
    <form method="get">
        <input type="hidden" name="c" value="pages">
        <input type="hidden" name="a" value="shop">
        <label for="taste">Geschmack</label>
        <select id="taste" class="select-field content-align-mid" name="taste">
            <option value="" <?echo(empty($_GET['taste']) ? 'selected' : '');?>>Keine Präferenz</option>
            <option value="M"<?echo(isset($_GET['taste']) && $_GET['taste'] == 'M' ? 'selected' : '');?>>Mild</option>
            <option value="W"<?echo(isset($_GET['taste']) && $_GET['taste'] == 'W' ? 'selected' : '');?>>Würzig</option>
        </select>
        <label for="lactose">Laktose</label>
        <select id="lactose" class="select-field content-align-mid" name="lactose">
            <option value="" <?echo(empty($_GET['lactose']) ? 'selected' : '');?>>Keine Präferenz</option>
            <option value="1"<?echo(isset($_GET['lactose']) && $_GET['lactose'] == 1 ? 'selected' : '');?>>Laktosefrei</option>
            <option value="2"<?echo(isset($_GET['lactose']) && $_GET['lactose'] == 2 ? 'selected' : '');?>>Nicht Laktosefrei</option>
        </select>
        <label for="milkType">Milch</label>
        <select id="milkType" class="select-field content-align-mid" name="milkType">
            <option value="" <?echo(empty($_GET['milkType']) ? 'selected' : '' );?>>Keine Präferenz</option>
            <option value="K"<?echo(isset($_GET['milkType']) && $_GET['milkType'] == 'K' ? 'selected' : '' );?>>Kuh</option>
            <option value="B"<?echo(isset($_GET['milkType']) && $_GET['milkType'] == 'B' ? 'selected' : '' );?>>Büffel</option>
            <option value="S"<?echo(isset($_GET['milkType']) && $_GET['milkType'] == 'S'? 'selected' : '' );?>>Schaf</option>
            <option value="Z"<?echo(isset($_GET['milkType']) && $_GET['milkType'] == 'Z'? 'selected' : '' );?>>Ziege</option>
        </select>
        <label for="rawMilk">Rohmilch</label>
        <select id="rawMilk" class="select-field content-align-mid" name="rawMilk">
            <option value="" <?echo(empty($_GET['rawMilk']) ? 'selected' : '');?>>Keine Präferenz</option>
            <option value="1"<?echo(isset($_GET['rawMilk']) && $_GET['rawMilk'] == 1 ? 'selected' : '');?>>Ja</option>
            <option value="2"<?echo(isset($_GET['rawMilk']) && $_GET['rawMilk'] == 2 ? 'selected' : '');?>>Nein</option>
        </select>
        <input type="submit" name="SubmitFilter" value="Anwenden" class="button content-align-mid" >
    </form>
</div>

<?
$this->loadProducts($this->params['stmt']);
?>