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
use Model\UploadManager;

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
        $data = $_POST;
        $errors = null;
        if (!empty($_POST)) {
            try {
                if (empty(trim($_POST['comment']))) {
                    throw new \Exception('Merci d\'ajouter un commentaire!');
                }
                if (empty(trim($_POST['name']))) {
                    throw new \Exception('Le champ nom ne doit pas etre vide !');
                }
                if (empty(trim($_POST['date']))) {
                    throw new \Exception('Le champ date doit être renseigné !');
                }
                if (isset($_FILES)) {
                    $upload = new UploadManager();
                    $filename = $upload->upload($_FILES);
                    $data['img'] = $filename;
                }

                $EventManager = new EventManager();
                $EventManager->insert($data);
                header('Location:Admin/recipe.html.twig');
            } catch (\Exception $e) {
                $errors = $e->getMessage();
            }
        }
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll();
        return $this->twig->render('Admin/addEvent.html.twig', ['categories' => $categories, 'errors' => $errors, 'post' => $data]);
    }
}
