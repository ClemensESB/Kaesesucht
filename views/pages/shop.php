<?
if(isset($_POST['endless'])) // only for javascript is needed to make the "endless" scrolling stop it's endlessness
{
    if($_POST['p'] > $pages)
    {
        echo("END");
    }
    else
    {
        $this->loadProducts($products);
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
        <select id="taste" class="select-field content-align-mid" name="t">
            <option value="" <?echo(empty($_GET['t']) ? 'selected' : '');?>>Keine Präferenz</option>
            <option value="M"<?echo(isset($_GET['t']) && $_GET['t'] == 'M' ? 'selected' : '');?>>Mild</option>
            <option value="W"<?echo(isset($_GET['t']) && $_GET['t'] == 'W' ? 'selected' : '');?>>Würzig</option>
        </select>
        <label for="lactose">Laktose</label>
        <select id="lactose" class="select-field content-align-mid" name="l">
            <option value="" <?echo(empty($_GET['l']) ? 'selected' : '');?>>Keine Präferenz</option>
            <option value="1"<?echo(isset($_GET['l']) && $_GET['l'] == 1 ? 'selected' : '');?>>Laktosefrei</option>
            <option value="2"<?echo(isset($_GET['l']) && $_GET['l'] == 2 ? 'selected' : '');?>>Nicht Laktosefrei</option>
        </select>
        <label for="milkType">Milch</label>
        <select id="milkType" class="select-field content-align-mid" name="m">
            <option value="" <?echo(empty($_GET['m']) ? 'selected' : '' );?>>Keine Präferenz</option>
            <option value="K"<?echo(isset($_GET['m']) && $_GET['m'] == 'K' ? 'selected' : '' );?>>Kuh</option>
            <option value="B"<?echo(isset($_GET['m']) && $_GET['m'] == 'B' ? 'selected' : '' );?>>Büffel</option>
            <option value="S"<?echo(isset($_GET['m']) && $_GET['m'] == 'S'? 'selected' : '' );?>>Schaf</option>
            <option value="Z"<?echo(isset($_GET['m']) && $_GET['m'] == 'Z'? 'selected' : '' );?>>Ziege</option>
        </select>
        <label for="rawMilk">Rohmilch</label>
        <select id="rawMilk" class="select-field content-align-mid" name="r">
            <option value="" <?echo(empty($_GET['r']) ? 'selected' : '');?>>Keine Präferenz</option>
            <option value="1"<?echo(isset($_GET['r']) && $_GET['r'] == 1 ? 'selected' : '');?>>Ja</option>
            <option value="2"<?echo(isset($_GET['r']) && $_GET['r'] == 2 ? 'selected' : '');?>>Nein</option>
        </select>
        <label for="sort">Sorte</label>
        <select id="sort" class="select-field content-align-mid" name="s">
                <option value="" <?echo(empty($_GET['s']) ? 'selected' : '');?>>Keine Präferenz</option>
            <?foreach($sorts as $value):?>
                <?if(isset($_GET['s']) && $_GET['s'] == $value['id']):?>
                    <option value="<?echo($value['id']);?>" selected><?echo($value['sortName']);?></option>
                <?else:?>
                    <option value="<?echo($value['id']);?>"><?echo($value['sortName']);?></option>
                <?endif;?>
            <?endforeach;?>
        </select>
        <input type="submit" name="SF" value="Filtern" class="button content-align-mid" >
    </form>
</div>


  

<!-- (A) CONTENTS -->
<div id="page-content" class="page_container content-align-mid">
 <? $this->loadProducts($products);?>
</div>
<!-- (B) NOW LOADING -->
<div id="page-loading" class="panel" style="display: none;">keine Ergebnisse</div>
<?
//$this->paging($this->params['stmt']);
//$this->loadNProducts($this->params['stmt'],3);
//$this->loadProducts($this->params['products']);
?>
<div class="noscript">
<noscript>
  <form method="get">
    <input type="hidden" name="c" value="pages">
    <input type="hidden" name="a" value="shop">
    <button class="button" name="p" value="<?echo($_GET['p']>1 ? $_GET['p']-1:1);?>" style="float: left;">previous</button>
    <button class="button" name="p" value="<?echo($_GET['p']<$pages ? $_GET['p']+1:$_GET['p']);?>" style="float: right;">next</button>
    <input type="hidden" name="t" value="<?echo(isset($_GET['t']) ? $_GET['t']:'');?>">
    <input type="hidden" name="l" value="<?echo(isset($_GET['l']) ? $_GET['l']:'');?>">
    <input type="hidden" name="m" value="<?echo(isset($_GET['m']) ? $_GET['m']:'');?>">
    <input type="hidden" name="r" value="<?echo(isset($_GET['r']) ? $_GET['r']:'');?>">
    <input type="hidden" name="s" value="<?echo(isset($_GET['s']) ? $_GET['s']:'');?>">
    <input type="hidden" name="SF" value="A">
  </form>
</noscript>
</div>

<script type="text/javascript" src="assets/scripts/endless.js"></script>

