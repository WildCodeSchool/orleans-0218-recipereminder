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
    public function listRecipe()
    {
        $title = 'Recettes';
        $recipeManager = new RecipeManager();
        $recipes = $recipeManager->selectAllThumb();

        return $this->twig->render('list.html.twig', ['title' => $title , 'list' => $recipes ]);
    }
}
