<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 26/04/18
 * Time: 16:18
 */

namespace Controller;


use Model\AccrocheManager;
use Model\Accroche;

class AccrocheController extends AbstractController
{
    public function changeAccroche()
    {
        $accroche = new AccrocheManager();
        $accroche->changeAccroche(trim($_POST['accroche']));
    }


}