<?php

//globale Hilfsfunktionen

function pre_r($array,$dbg = 'DBG: ')
{
	echo('<pre>');
	echo($dbg);
	print_r($array);
	echo('</pre>');
}

function handleSubmit($data)
{
	$error = array();
	$requestWrapper = [
		'status' => 200,
		'data' => null,
	];

	if(isset($_REQUEST['submit']) || isset($data) && $data != null)
	{
		if(isset($data) && $data != null)
		{
			foreach ($data as $key => $value) {
				$storage[$key] = $value;
			}
		}
		else
		{
			foreach ($_REQUEST as $key => $value) {
				$storage[$key] = $value;
			}
		}

		if(count($error) === 0)
		{
			foreach ($_REQUEST as $key => $value) {
				unset($_REQUEST[$key]);
			}
			$requestWrapper['status'] = 200;
			$requestWrapper['data'] = $storage;
		}
	}
	if(isset($data) && $data != null)
	{
		return $requestWrapper;
	}
	else
	{
		return count($error) > 0 ? $error : true;
	}
}
