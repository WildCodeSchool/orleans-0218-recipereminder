<?php
/**
 * Created by PhpStorm.
 * User: wilder17
 * Date: 03/04/18
 * Time: 14:24
 */

namespace Controller;

use Model\EventManager;

class EventController extends AbstractController
{

    /**
     * Display event listing
     *
     * @return string
     */
    public function listEvent()
    {
        $eventManager = new EventManager();
        $events = $eventManager->selectAll();

        return $this->twig->render('Event/eventslist.html.twig', ['events' => $events]);
    }
}
