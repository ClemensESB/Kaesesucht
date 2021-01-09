<?php

/**
 * @author Kristof Friess <kristof.friess@fh-erfurt.de>
 * @copyright Since 2021 by Kristof Friess
 * @version 1.0.0
 */

namespace kae\controller;

class ErrorsController extends \kae\core\Controller
{

	public function actionError404()
	{
        $errorMessage = 'Unknown error, please check your code!';

        if(isset($_GET['error']))
        {
            switch($_GET['error'])
            {
                case 'nocontroller':
                    $errorMessage = 'Sorry, aber der Kontroller oder in Englisch Controller, der ist weggerannt.';
                    break;
                case 'viewpath':
                    $errorMessage = 'View konnte nicht gefunden werden.';
                    break;
            }
        }

        // though the error message variable to the view, so we can show it to our customers
        $this->setParam('errorMessage', $errorMessage);
	}
}