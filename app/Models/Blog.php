<?php

namespace App\Models;

use App\Casts\FileAble;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'content', 'image', 'pdf'];

    protected $casts = [
        'image' => FileAble::class,
        'pdf'   => FileAble::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
