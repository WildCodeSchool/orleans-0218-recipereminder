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
     * @return string|null
     */
    public function upload($file): ?string
    {
        if (!empty($file['name'])) {
            $uploadFile = APP_UPLOADDIR . basename($file['name']);
            if ($file["size"] > self::MAXSIZE) {
                throw new \Exception('Votre image devrait faire moins de '. self::MAXSIZE / 1000000 . 'Mo');
            }

            $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

            $extensionAuth = ["jpg", "png", "gif"];
            if (!in_array($imageFileType, $extensionAuth)) {
                throw new \Exception('Oups pas le bon format ' . implode(", ", $extensionAuth));
            }

            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = "Image" . uniqid() . '.' . $extension;

            if (empty($filename)) {
                throw new \Exception('erreur création fichier');
            }
            move_uploaded_file($file['tmp_name'], 'assets/upload/' . $filename);
        }
        return $filename ?? null;
    }

    /**
     * @param string $file
     */
    public function unlink(string $file)
    {
        $fileName = 'assets/upload/' . $file;

        if (!file_exists($fileName)) {
            throw new \Exception('fichier introuvable');
        }
        unlink($fileName);

    }
}
