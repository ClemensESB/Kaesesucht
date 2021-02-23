<?php

//globale Hilfsfunktionen

function pre_r($array,$dbg = 'DBG: ')
{
	echo('<pre>');
	echo($dbg);
	print_r($array);
	echo('</pre>');
}

function nfProducts ($params = '',$key1)
{
return \kae\controller\PagesController::loadNProducts($params,$key1);
}

