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
use Model\EventRecipeManager;
use Model\UploadManager;
use Model\RecipeManager;
use Model\UpdateManager;

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
        return $this->twig->render('Admin/Event/eventList.html.twig');
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
      
        return $this->twig->render('Admin/Event/addEvent.html.twig', [ 'errors' => $errors, 'data' => $data]);
    }

    public function showEvent(int $id)
    {
        $eventManager = new EventManager();
        $event = $eventManager->selectOneById($id);
        $showRecipes = $eventManager->showLinkedRecipes($id);

        return $this->twig->render('Event/show-one-event.html.twig', ['event' => $event, 'showRecipes' => $showRecipes]);
    }

    public function showAdminEvent(int $id)
    {
        $eventManager = new EventManager();
        $event = $eventManager->selectOneById($id);

        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll();

        $showRecipes = $eventManager->showLinkedRecipes($id);

        return $this->twig->render('Admin/Event/show-one-event-admin.html.twig', ['event' => $event, 'showRecipes' => $showRecipes, 'categories' => $categories]);
    }

    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
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
        $events = $eventManager->selectEventLimit(trim($_POST['event']), $_POST['dateStart'], $_POST['dateEnd'],$_POST['page'],THUMB_LIMIT);

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

    /**
     * Send all the recipes that can be linked to one event (not already linked) and corresponding
     * to the  requested name /category to the modal view in admin/event/id
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function searchRecipeToLink()
    {
        $eventRecipeManager = new EventRecipeManager();

        if (empty(trim($_POST['findRecipe'])) && empty($_POST['categoryId'])) {
            $recipes = $eventRecipeManager->selectNotLinkedRecipes($_POST['eventId']);
        } else {
            $recipes = $eventRecipeManager->selectNotLinkedRecipes(
                $_POST['eventId'],
                trim($_POST['findRecipe']),
                $_POST['categoryId']
            );
        }

        return $this->twig->render('Admin/Event/searchRecipeToLink.html.twig', ['recipes' => $recipes]);
    }

    /**
     * Link one recipe to one event (new entry in the table event_recipe)
     * only if this link (event/recipe pair) does not already exist.
     */
    public function linkRecipeToEvent()
    {
        if (!empty($_POST['recipeId']) && !empty($_POST['eventId'])) {
            $data = $_POST;

            $eventRecipeManager = new EventRecipeManager();

            if ($eventRecipeManager->testNoLink($_POST['recipeId'], $_POST['eventId'])) {
                $eventRecipeManager->insert($data);
            }
        }
    }

    public function updateEvent(int $id)
    {   $data = $_POST;
        $errors = null;
        $eventManager = new EventManager();
        try {
        if (!empty($_POST)) {

                if (empty(trim($_POST['comment']))) {
                    throw new \Exception('Merci d\'ajouter un commentaire!');
                }
            if (empty(trim($_POST['name']))) {
                throw new \Exception('Le champ nom ne doit pas etre vide !');
            }
            if (empty(trim($_POST['date']))) {
                throw new \Exception('Le champ date doit être renseigné !');
            }

            if (empty($_FILES['filename']['name'])) {
                $eventManager->update($id, $data);
                header('Location:/admin/eventList');
            } else {
                $event = $eventManager->selectOneById($id);
                $imageName = $event->getImg();

                // upload du fichier
                $upload = new UploadManager();
                $filename = $upload->upload($_FILES['filename']);
                $data['img'] = $filename;

                // supprimer l'ancien fichier s'il existe
                $upload->unlink($imageName);

                // update de tous les champs

                $eventManager->update($id, $data);
                header('Location:/admin/eventList');
                exit();
            }
        }

        $event = $eventManager->selectOneById($id);

        } catch (\Exception $e) {
            $errors = $e->getMessage();
        }
        return $this->twig->render('Admin/Event/updateEvent.html.twig', ['data' => $event, 'errors'=>$errors]);
    }

    public function searchEventAdmin()
    {
        $eventManager = new EventManager();
        $events=$eventManager->selectEventLimit(trim($_POST['name']),$_POST['dateStart'],$_POST['dateEnd'],$_POST['page'], MEDIA_LIMIT);

        return $this->twig->render('Admin/Event/search_eventList.html.twig', ['events' => $events ]);
    }

}

