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
        if(isset($_POST['name'])){
            try{
                $category = new Category();
                $category->setName($_POST['name']);

                $categoryManager = new CategoryManager();
                $categoryManager->addCategory($category);

            }catch(\PDOException $p){
                if($p->errorInfo[0]==23000){
                    $error='Ce nom existe déjà.';
                }else{
                    $error=$p->getMessage();
                }


            }catch(\Exception $e){
                $error=$e->getMessage();
            }

        }
            $categoryManager = new CategoryManager();
            $categories = $categoryManager->selectAll();

        return $this->twig->render('Admin/Category/category.html.twig', ['categories' => $categories , 'error' => $error]);
    }
}
