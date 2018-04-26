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
use Model\AccrocheManager;
use Model\Accroche;

class HomepageController extends AbstractController
{
    public function index()
    {
        $recipeManager = new RecipeManager();
        $lastRecipes = $recipeManager->selectLastRecipes();

        $eventManager = new EventManager();
        $lastEvents = $eventManager->selectLastEvents();

        $accrocheManager= new AccrocheManager();
        $accroche = $accrocheManager->selectAccroche();

        return $this->twig->render(
            'Homepage/homepage.html.twig',
            ['lastrecipes' => $lastRecipes, 'lastevents' => $lastEvents,'accroche'=> $accroche]
        );
    }

    public function adminIndex()
    {
        $accrocheManager= new AccrocheManager();
        $accroche = $accrocheManager->selectAccroche();

        return $this->twig->render('Admin/adminHomepage.html.twig', ['accroche'=> $accroche]);
    }
}
