<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 26/04/18
 * Time: 16:18
 */

namespace Controller;

use Model\CatchPhraseManager;
use Model\CatchPhrase;

class CatchPhraseController extends AbstractController
{
    public function changeCatchPhrase()
    {
        $catchPhrase = new CatchPhraseManager();
        $catchPhrase->changeCatchPhrase(trim($_POST['catchPhrase']));
    }
}
