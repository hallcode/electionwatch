<?php

namespace App\YamlModels;

use Yaml;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class YamlObject
{
    protected $attributes;

    protected $title;

    public static function getObject()
    {
        return str_plural(class_basename(static::class));
    }

    public static function open($filename)
    {
        $filename = strtolower($filename);
        $filepath = studly_case(self::getObject()) . '/' . $filename . '.yaml';

        $file = Storage::disk('static')->get($filepath);

        $yaml = explode('---', $file);

        $attributes = Yaml::parse($yaml[0]);

        if (isset($yaml[1])) {
            $attributes['_markdown'] = $yaml[1];
        }

        return new static($filename, $attributes);
    }

    public static function all()
    {
        $idList = self::getAllIds();

        $collection = collect([]);

        if ($idList !== false) {
            foreach ($idList as $id)
            {
                $collection->push(self::open($id));
            }
        }

        return $collection;
    }

    public static function where($key, $value)
    {
        $collection = self::all();

        return $collection->where($key, $value);
    }

    public static function getAllIds()
    {
        $array = Storage::disk('static')->files(studly_case(self::getObject()));

        if (empty($array))
        {
            return false;
        }

        $list = array_map(function($value){
            preg_match('/\/(.+)\.[a-z]+/', $value, $regmatch, PREG_OFFSET_CAPTURE, 0);
            return $regmatch[1][0];
        }, $array);

        return $list;
    }

    public function __construct($title, $attributes = null)
    {
        $this->title = $title;
        $this->attributes = $attributes;

        $this->attributes['_title'] = $this->title;

        return $this;
    }

    public function save()
    {
        $filename = strtolower($this->title);
        $filepath = studly_case(self::getObject()) . '/' . $filename . '.yaml';

        if (!isset($this->attributes['_id']))
        {
            $this->_id = Str::uuid();
        }

        $yaml = Yaml::dump($this->attributes);

        Storage::disk('static')->put($filepath, $yaml);
    }

    public function delete()
    {
        $filename = strtolower($this->title);
        $filepath = studly_case(self::getObject()) . '/' . $filename . '.yaml';

        Storage::disk('static')->delete($filepath);
    }

    public function __get($name)
    {
        if (isset($this->attributes[$name])) {
            return $this->attributes[$name];
        }
        else
        {
            return null;
        }
    }

    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function __isset($name)
    {
        return isset($this->attributes[$name]);
    }

    public function __unset($name)
    {
        unset($this->attributes[$name]);
    }
}
