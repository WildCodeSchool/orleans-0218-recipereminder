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
use Model\CompanyManager;
use Model\Company;

class HomepageController extends AbstractController
{
    public function index()
    {
        $recipeManager = new RecipeManager();
        $lastRecipes = $recipeManager->selectLastRecipes();

        $eventManager = new EventManager();
        $lastEvents = $eventManager->selectLastEvents();

        $companyManager = new CompanyManager();
        $catchPhrase = $companyManager->selectCatchPhrase();

        return $this->twig->render(
            'Homepage/homepage.html.twig',
            ['lastrecipes' => $lastRecipes, 'lastevents' => $lastEvents, 'catchPhrase' => $catchPhrase]
        );
    }

    public function adminIndex()
    {
        $companyManager = new CompanyManager();
        $catchPhrase = $companyManager->selectCatchPhrase();

        return $this->twig->render('Admin/adminHomepage.html.twig', ['catchPhrase' => $catchPhrase]);
    }
}
