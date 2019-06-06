<?php

namespace malankateam\luya\trello\frontend\controllers;

use luya\admin\ngrest\base\Controller;

/**
 * Class DefaultController
 *
 * @package malankateam\luya\trello\frontend\controllers
 * @author Robert Kuznetsov <robert@malanka.pro>
 */
class DefaultController extends Controller
{
    public function actionIndex()
    {
        //@TODO add real common trello information
        return 'Index Controller';
    }
}