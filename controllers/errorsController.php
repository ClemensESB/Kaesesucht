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
                    $errorMessage = 'no valid controller';
                    break;
                case 'viewpath':
                    $errorMessage = 'no valid view';
                    break;
            }
        }
        // though the error message variable to the view, so we can show it to our customers
        $this->setParam('errorMessage', $errorMessage);
	}
}