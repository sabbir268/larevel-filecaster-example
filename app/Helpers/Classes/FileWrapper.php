<?php

namespace App\Helpers\Classes;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FileWrapper
{
    protected $value;
    protected $className;
    protected $id;

    public function __construct($value, $className, $id)
    {
        $this->value = $value;
        $this->className = $className;
        $this->id = $id;


        if (!$this->value || ($this->value && !Storage::disk('public')->exists($this->value))) {
            return null;
        }
    }

    public function __toString(): String
    {
        return $this->value ? $this->value : '';
    }

    public function url($dimension = null): String
    {
        if (!$dimension) {
            $file = Storage::disk('public')->url($this->value);
        } else {
            // $file = resizeImage($dimension, Str::slug($this->className), $this->id, $this->value);
        }

        return $file;
    }

    public function name(): String
    {
        $file = Storage::disk('public')->url($this->value);
        $filenameWithExt = basename($file);

        return $filenameWithExt;
    }

    public function exists(): bool
    {
        if (!$this->value || ($this->value && !Storage::disk('public')->exists($this->value))) {
            return false;
        }

        return true;
    }
}
