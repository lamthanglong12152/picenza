<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    use HasFactory;
    protected $table = 'project_category';
    protected $fillable = ['name', 'status', 'seo_title', 'seo_description', 'seo_keyword', 'seo_robots', 'slug', 'seo_url'];
}
