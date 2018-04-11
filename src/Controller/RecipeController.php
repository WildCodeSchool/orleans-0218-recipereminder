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
use Model\CategoryManager;

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

        return $this->twig->render('Recipe/list_recipe.html.twig', ['recipes' => $recipes]);
    }

    /**
     * Ajouter une recette
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function addRecipe()
    {
        $errors = null;
        if (!empty($_POST)) {
            try {
                $recipe = new Recipe();
                $data = $_POST;
                $recipe->setName($_POST['name']);
                $recipe->setComment($_POST['comment']);
                $data['name'] = $recipe->getName();
                $data['comment'] = $recipe->getComment();

                $FormManager = new RecipeManager();
                $FormManager->insert($data);
                header('Location:Admin/recipe.html.twig');
            } catch (\Exception $e) {
                $errors = $e->getMessage();
            }
        }
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll();
        return $this->twig->render('Admin/addRecipe.html.twig', ['categories' => $categories, 'errors' => $errors, 'post' => $_POST]);
    }
}
