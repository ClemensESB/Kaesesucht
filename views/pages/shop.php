<?
if(isset($_POST['p']) &&  $_POST['p'] > 1 && isset($_POST['js'])) // only for javascript is needed to make the "endless" scrolling stop it's endlessness
{
    if($_POST['p'] == $this->params['pages']+1)
    {
        echo("END");
    }
    else
    {
        $this->loadProducts($this->params['products']);
    }
    exit();
}

?>


<meta name="viewport" content="width=device-width, initial-scale=1.0">
<div class = "filter_container content-align-mid">
    <form method="get">
        <input type="hidden" name="c" value="pages">
        <input type="hidden" name="a" value="shop">
        <input type="hidden" name="p" value="1">
        <label for="taste">Geschmack</label>
        <select id="taste" class="select-field" name="taste">
            <option value="" <?echo(empty($_GET['taste']) ? 'selected' : '');?>>Keine Präferenz</option>
            <option value="M"<?echo(isset($_GET['taste']) && $_GET['taste'] == 'M' ? 'selected' : '');?>>Mild</option>
            <option value="W"<?echo(isset($_GET['taste']) && $_GET['taste'] == 'W' ? 'selected' : '');?>>Würzig</option>
        </select>
        <label for="lactose">Laktose</label>
        <select id="lactose" class="select-field" name="lactose">
            <option value="" <?echo(empty($_GET['lactose']) ? 'selected' : '');?>>Keine Präferenz</option>
            <option value="1"<?echo(isset($_GET['lactose']) && $_GET['lactose'] == 1 ? 'selected' : '');?>>Laktosefrei</option>
            <option value="2"<?echo(isset($_GET['lactose']) && $_GET['lactose'] == 2 ? 'selected' : '');?>>Nicht Laktosefrei</option>
        </select>
        <label for="milkType">Milch</label>
        <select id="milkType" class="select-field" name="milkType">
            <option value="" <?echo(empty($_GET['milkType']) ? 'selected' : '' );?>>Keine Präferenz</option>
            <option value="K"<?echo(isset($_GET['milkType']) && $_GET['milkType'] == 'K' ? 'selected' : '' );?>>Kuh</option>
            <option value="B"<?echo(isset($_GET['milkType']) && $_GET['milkType'] == 'B' ? 'selected' : '' );?>>Büffel</option>
            <option value="S"<?echo(isset($_GET['milkType']) && $_GET['milkType'] == 'S'? 'selected' : '' );?>>Schaf</option>
            <option value="Z"<?echo(isset($_GET['milkType']) && $_GET['milkType'] == 'Z'? 'selected' : '' );?>>Ziege</option>
        </select>
        <label for="rawMilk">Rohmilch</label>
        <select id="rawMilk" class="select-field" name="rawMilk">
            <option value="" <?echo(empty($_GET['rawMilk']) ? 'selected' : '');?>>Keine Präferenz</option>
            <option value="1"<?echo(isset($_GET['rawMilk']) && $_GET['rawMilk'] == 1 ? 'selected' : '');?>>Ja</option>
            <option value="2"<?echo(isset($_GET['rawMilk']) && $_GET['rawMilk'] == 2 ? 'selected' : '');?>>Nein</option>
        </select>
        <input type="submit" name="SubmitFilter" value="Anwenden" class="button" >
    </form>
</div>


  

<!-- (A) CONTENTS -->
<div id="page-content" class="">
 <? $this->loadProducts($this->params['products']);?>
</div>
<!-- (B) NOW LOADING -->
<div id="page-loading" class="panel" style="display: none;">Now loading...</div>
<?
//$this->paging($this->params['stmt']);
//$this->loadNProducts($this->params['stmt'],3);
//$this->loadProducts($this->params['products']);
?>
<div>
<noscript>
  <form method="get">
    <input type="hidden" name="c" value="pages">
    <input type="hidden" name="a" value="shop">
    <button class="button" name="p" value="<?echo($_GET['p']>1 ? $_GET['p']-1:1);?>" style="float: left;">previous</button>
    <button class="button" name="p" value="<?echo($_GET['p']<$this->params['pages'] ? $_GET['p']+1:$_GET['p']);?>" style="float: right;">next</button>
    <input type="hidden" name="taste" value="<?echo(isset($_GET['taste']) ? $_GET['taste']:'');?>">
    <input type="hidden" name="lactose" value="<?echo(isset($_GET['lactose']) ? $_GET['lactose']:'');?>">
    <input type="hidden" name="milkType" value="<?echo(isset($_GET['milkType']) ? $_GET['milkType']:'');?>">
    <input type="hidden" name="rawMilk" value="<?echo(isset($_GET['rawMilk']) ? $_GET['rawMilk']:'');?>">
    <input type="hidden" name="SubmitFilter" value="Anwenden">
  </form>
</noscript>

<script type="text/javascript" src="assets/scripts/endless.js"></script>
</div>