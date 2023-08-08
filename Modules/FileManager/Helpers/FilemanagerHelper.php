<?php

namespace Modules\FileManager\Helpers;

use Exception;

class FilemanagerHelper
{
    /**
     * @throws Exception
     */
    public static function getThumbsImage()
    {
        if (! config('filemanager.thumbs')) {
            throw new Exception("'thumbs' params is not founded");
        }

        return config('filemanager.thumbs');
    }

    /**
     * @throws Exception
     */
    public static function getImagesExt()
    {
        if (! config('filemanager.images_ext')) {
            throw new Exception("'images_ext' params is not founded");
        }

        return config('filemanager.images_ext');
    }
}
