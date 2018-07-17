<?php

namespace App\YamlModels;


class Alert extends YamlObject
{
    public static function getActive()
    {
        $collection = self::where('active', true);

        if ($collection->count() > 0) {
            return $collection;
        }

        return false;

    }
}
