<?php
/**
 * Created by PhpStorm.
 * User: wilder17
 * Date: 03/04/18
 * Time: 14:24
 */

namespace Controller;


class EventController extends AbstractController
{

    /**
     * Display item listing
     *
     * @return string
     */
    public function listEvent()
    {
        $title = 'Evénements';
        $eventManager = new EventManager();
        $events = $eventManager->selectAllThumb();

        return $this->twig->render('list.html.twig', ['title' => $title, 'list' => $events]);
    }
}