<?php
/**
 * Created by PhpStorm.
 * User: mattcrl
 * Date: 30/03/18
 * Time: 13:49
 */

namespace Controller;

class MentionsController extends AbstractController
{
    public function mentionsLegales()
    {
        return $this->twig->render('MentionsLegales/mentions-legales.html.twig');
    }
}
