<?php
/**
 * Created by PhpStorm.
 * User: wilder18
 * Date: 12/04/18
 * Time: 17:18
 */

namespace Model;

class UploadManager
{
    /**
     * Upload Image
     * @throws \Exception
     */
    public function upload($file)
    {
        if (isset($_FILES)) {
            $uploadDir = 'assets/images/';
            $uploadFile = $uploadDir . basename($file['img']['name']);
            if ($file["img"]["size"] > 1000000) {
                throw new \Exception('Votre image est trop lourde !');
            }
            $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
            if ($imageFileType == null) {
                $filename = null;
                return $filename;
            }
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
                throw new \Exception('Oups pas le bon format !');
            }
            $extension = pathinfo($file['img']['name'], PATHINFO_EXTENSION);
            $filename = "Image" . uniqid() . '.' . $extension;
            move_uploaded_file($file['img']['tmp_name'], 'assets/images/' . $filename);
            return $filename;
        }
    }
}
