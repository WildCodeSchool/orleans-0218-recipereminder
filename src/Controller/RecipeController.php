<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 29/03/18
 * Time: 17:14
 */

namespace Controller;


use Model\Recipe;
use Model\RecipeManager;

/**
 * Class RecipeController
 *
 */
class RecipeController extends AbstractController
{
    /**
     * Display item listing
     *
     * @return string
     */
    public function recipe()
    {
        /*$itemManager = new RecipeManager();
        $items = $itemManager->selectAll();*/

        $title = 'Recettes';
        $recipeManager = new RecipeManager();
        $recipes = $recipeManager->selectAllThumb();



        return $this->twig->render('Recipe/list.html.twig', ['title' => $title , 'list' => $recipes ]);
    }
}