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

        return $this->twig->render('Event/eventList.html.twig', ['events' => $events]);
    }

    public function adminListEvent(){
        $eventManager = new EventManager();
        $events = $eventManager->selectAll();

        return $this->twig->render(
            'Admin/Event/eventList.html.twig',
            [
                'events' => $events
            ]
        );
    }
}
