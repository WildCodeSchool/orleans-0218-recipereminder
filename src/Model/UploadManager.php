<?php
/**
 * Created by PhpStorm.
 * User: wilder18
 * Date: 12/04/18

 * Time: 22:45
 */

namespace Model;

class UploadManager
{
    const MAXSIZE = 1000000;
    /**
     * Upload Image
     * @throws \Exception
     */
    public function upload($file)
    {
        if (isset($_FILES)) {
            $uploadDir = '/assets/upload/';
            $uploadFile = $uploadDir . basename($file['img']['name']);
            if ($file["img"]["size"] > self::MAXSIZE) {
                throw new \Exception('Votre image devrait faire moins de '. self::MAXSIZE . 'ko');
            }
            $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
            if ($imageFileType == null) {
                $filename = null;
                return $filename;
            }
            $extensionAuth = ["jpg", "png", "gif"];
            if (!in_array($imageFileType, $extensionAuth)) {
                throw new \Exception('Oups pas le bon format ' . implode(", ", $extensionAuth));
            }
            $extension = pathinfo($file['img']['name'], PATHINFO_EXTENSION);
            $filename = "Image" . uniqid() . '.' . $extension;
            move_uploaded_file($file['img']['tmp_name'], 'assets/upload/' . $filename);
            return $filename;
        }
    }

}
