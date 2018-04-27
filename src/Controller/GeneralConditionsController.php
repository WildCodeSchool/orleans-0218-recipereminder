<?php
/**
 * Created by PhpStorm.
 * User: mattcrl
 * Date: 30/03/18
 * Time: 13:49
 */

namespace Controller;

class GeneralConditionsController extends AbstractController
{
    public function generalConditions()
    {
        return $this->twig->render('GeneralConditions/general-conditions.html.twig');
    }
}
