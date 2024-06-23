<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'category_slug',
        'status',
    ];
    public function changestatus($blogcategory)
    {
        $status = ($blogcategory->status == 0) ? 1 : 0;

        $blogcategory->update([
            'status' => $status,

        ]);
    }
}
