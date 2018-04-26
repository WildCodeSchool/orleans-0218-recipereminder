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
use Model\CatchPhraseManager;
use Model\CatchPhrase;

class HomepageController extends AbstractController
{
    public function index()
    {
        $recipeManager = new RecipeManager();
        $lastRecipes = $recipeManager->selectLastRecipes();

        $eventManager = new EventManager();
        $lastEvents = $eventManager->selectLastEvents();

        $catchPhraseManager= new CatchPhraseManager();
        $catchPhrase = $catchPhraseManager->selectCatchPhrase();

        return $this->twig->render(
            'Homepage/homepage.html.twig',
            ['lastrecipes' => $lastRecipes, 'lastevents' => $lastEvents,'catchPhrase'=> $catchPhrase]
        );
    }

    public function adminIndex()
    {
        $catchPhraseManager= new catchPhraseManager();
        $catchPhrase = $catchPhraseManager->selectcatchPhrase();

        return $this->twig->render('Admin/adminHomepage.html.twig', ['catchPhrase'=> $catchPhrase]);
    }
}
