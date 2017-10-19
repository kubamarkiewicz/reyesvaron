<?php namespace KubaMarkiewicz\Products\Models;

use Model;

/**
 * Model
 */
class Product extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /*
     * Validation
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'kubamarkiewicz_products_products';

    public $implement = ['RainLab.Translate.Behaviors.TranslatableModel']; 

    public $translatable = [
        'name',
        'description',
        'section_1',
        'section_2',
        'section_3',
        'section_4',
        'section_5',
        'section_6',
        'section_7',
        'section_8',
        'section_9',
        'section_10',
    ];


    /*
     * Relations
     */
    public $attachOne = [
        'image' => 'System\Models\File',
        'image_1' => 'System\Models\File',
        'image_2' => 'System\Models\File',
        'image_3' => 'System\Models\File',
        'image_4' => 'System\Models\File',
        'image_5' => 'System\Models\File',
        'image_6' => 'System\Models\File',
        'image_7' => 'System\Models\File',
        'image_8' => 'System\Models\File',
        'image_9' => 'System\Models\File',
        'image_10' => 'System\Models\File',
    ];
}