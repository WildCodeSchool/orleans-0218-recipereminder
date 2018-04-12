<?php
/**
 * Created by PhpStorm.
 * User: wilder17
 * Date: 03/04/18
 * Time: 14:24
 */

namespace Controller;

use Model\Event;
use Model\EventManager;
use Model\CategoryManager;

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
    public function addEvent()
    {
        $errors= null;
        if (!empty($_POST)) {
            try {
                $recipe = new Event();
                $data = $_POST;
                $recipe->setName($_POST['name']);
                $recipe->setComment($_POST['comment']);
                $data['name'] = $recipe->getName();
                $data['comment'] = $recipe->getComment();
                $FormManager = new EventManager();
                $FormManager->insert($data);
                header('Location:Admin/event.html.twig');
            } catch (\Exception $e) {
                $errors = $e->getMessage();
            }
        }
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll();
        return $this->twig->render('Admin/addEvent.html.twig', ['categories' => $categories, 'errors' => $errors, 'post'=> $_POST]);
    }
}
