<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 15:38
 * PHP version 7
 */

namespace Controller;

class ErrorsController extends AbstractController
{
    /**
     *  Initializes this class.
     */
    public function errors()
    {
        return $this->twig->render('/Errors/error404.html.twig');

    }
}
