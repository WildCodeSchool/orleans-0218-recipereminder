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
        $recipeManager = new RecipeManager();
        $recipes = $recipeManager->selectAllRecipe();

        return $this->twig->render('Recipe/list_recipe.html.twig', ['recipes' => $recipes ]);
    }

    public function adminListRecipe(){
        $RecipeManager = new RecipeManager();
        $recipes = $RecipeManager->selectAll();

        return $this->twig->render(
            'Admin/Recipe/recipeList.html.twig',
            [
                'recipes' => $recipes
            ]
        );
    }

}
