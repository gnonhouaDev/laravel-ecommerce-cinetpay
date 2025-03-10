<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function image()
    {
        return $this->belongsTo(ImageFile::class, 'image_file_id');
    }
}