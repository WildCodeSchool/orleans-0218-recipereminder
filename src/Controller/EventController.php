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

        return $this->twig->render('Event/eventList.html.twig', ['events' => $events]);
    }


    public function adminListEvent()
    {
        $eventManager = new EventManager();
        $events = $eventManager->selectAll();

        return $this->twig->render(
            'Admin/Event/eventList.html.twig',
            [
                'events' => $events
            ]
        );
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
                    $filename = $upload->upload($_FILES['img']);
                    $data['img'] = $filename;
                }

                $EventManager = new EventManager();
                $EventManager->insert($data);
                header('Location:/admin/eventList');
            } catch (\Exception $e) {
                $errors = $e->getMessage();
            }
        }

        return $this->twig->render('Admin/Event/addEvent.html.twig', ['errors' => $errors, 'data' => $data]);
    }

    public function showEvent(int $id)
    {
        $eventManager = new EventManager();
        $event = $eventManager->selectOneById($id);

        return $this->twig->render('Event/show-one-event.html.twig', ['event' => $event]);
    }

    public function showAdminEvent(int $id)
    {
        $eventManager = new EventManager();
        $event =  $eventManager->selectOneById($id);

        return $this->twig->render('Admin/Event/show-one-event-admin.html.twig', ['event' => $event]);
    }

    public function searchEvent()
    {
        $eventManager = new EventManager();
        try {
            // j'instancie des dates pour les tester
            $start = new \DateTime($_POST['dateStart']);
            $end = new \DateTime($_POST['dateEnd']);
        } catch (\Exception $e) {
            exit();
        }
        $events = $eventManager->selectEventLikeName(trim($_POST['event']), $_POST['dateStart'], $_POST['dateEnd']);

        return $this->twig->render('Event/inc_listEvent.html.twig', ['events' => $events]);

    }

    public function deleteEvent()
    {
        $eventManager = new EventManager();
        if (!empty($_POST)) {
            $id = $_POST['id'];
        }

        $eventManager->delete($id);

        header('Location: /admin/eventList');
    }
}
