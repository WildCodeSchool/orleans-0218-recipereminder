<?php
/**
 * Created by PhpStorm.
 * User: mattcrl
 * Date: 30/03/18
 * Time: 13:49
 */

namespace Controller;

use Model\EventManager;
use Model\RecipeManager;

class HomepageController extends AbstractController
{
    public function index()
    {
        $recipeManager = new RecipeManager();
        $lastRecipes = $recipeManager->selectLastRecipes();

        $eventManager = new EventManager();
        $lastEvents = $eventManager->selectLastEvents();

        return $this->twig->render('Homepage/homepage.html.twig', ['lastrecipes' => $lastRecipes, 'lastevents' => $lastEvents]);
    }

    public function adminIndex()
    {
        return $this->twig->render('Admin/adminHomepage.html.twig');
    }
}

?>

