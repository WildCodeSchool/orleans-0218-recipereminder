<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 26/04/18
 * Time: 16:18
 */

namespace Controller;

use Model\CompanyManager;
use Model\Company;

class CompanyController extends AbstractController
{
    public function changeCatchPhrase()
    {
        $catchPhrase = trim($_POST['catchPhrase']);
        if($catchPhrase != ''){
            $companyManager = new CompanyManager();
            $companyManager->changeCatchPhrase(trim($_POST['catchPhrase']));
        }
    }
}
