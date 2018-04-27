<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\Category;
use Model\CategoryManager;

/**
 * Class ItemController
 *
 */
class CategoryController extends AbstractController
{

    /**
     * Display item listing
     *
     * @return string
     */
    public function list()
    {
        $error=null;
        if (isset($_POST['name'])) {
            try {
                $cleanPost['name'] = trim($_POST['name']);

                if (empty($cleanPost['name'])) {
                    throw new \Exception('Le nom de la catégorie est vide');
                }

                $categoryManager = new CategoryManager();
                $categoryManager->insert($cleanPost);
            } catch (\PDOException $p) {
                if ($p->errorInfo[0]==23000) {
                    $error='Ce nom existe déjà.';
                } else {
                    $error=$p->getMessage();
                }
            } catch (\Exception $e) {
                $error=$e->getMessage();
            }
        }
            $categoryManager = new CategoryManager();
            $categories = $categoryManager->selectAll();

        return $this->twig->render(
            'Admin/Category/category.html.twig',
            [
                        'categories' => $categories ,
                        'error' => $error
            ]
        );
    }


    public function update()
    {
        if(!empty($_POST['categoryId']) && !empty($_POST['newName'])){
            $categoryId = $_POST['categoryId'];
            $data['name']=trim($_POST['newName']);
            $categoryManager = new CategoryManager();
            $categoryManager->update($categoryId,$data);
          
            header('location:/admin/category');
        }
    }
  
    public function delete()
    {
        if (!empty($_POST['categoryId'])) {
            $id= trim($_POST['categoryId']);
            $categoryManager = new CategoryManager();
            $categoryManager->delete($id);
          
          header('location:/admin/category');
        }
    }
}
