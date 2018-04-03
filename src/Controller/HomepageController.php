<?php
/**
 * Created by PhpStorm.
 * User: mattcrl
 * Date: 30/03/18
 * Time: 13:49
 */

namespace Controller;


class HomepageController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Homepage/homepage.html.twig');
    }
}