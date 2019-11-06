<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_config extends Model
{
    protected $table = 'category_config';
    protected $fillable = [
        'category_name',
        'search_text_0',
        'search_field_0',
        'search_text_1',
        'search_field_1',
        'search_text_2',
        'search_field_2',
        'search_text_3',
        'search_field_3',
        'search_text_4',
        'search_field_4',
        'search_text_5',
        'search_field_5',
        'search_text_6',
        'search_field_6',
        'search_text_7',
        'search_field_7',
        'search_text_8',
        'search_field_8',
        'search_text_9',
        'search_field_9',
        'show_array'
    ];
}
