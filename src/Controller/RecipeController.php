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
use Model\UploadManager;

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
     * Ajouter une recette !
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
                if (empty($_POST['comment'])) {
                    throw new \Exception('Merci d\'ajouter un commentaire!');
                }
                if (empty($_POST['name'])) {
                    throw new \Exception('Le champ nom ne doit pas etre vide !');
                }
                $data = $_POST;
                if (isset($_FILES)) {
                    $upload = new UploadManager();
                    $filename = $upload->upload($_FILES);
                    $data['img'] = $filename;
                }
                $recipeManager = new RecipeManager();
                $recipeManager->insert($data);
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
