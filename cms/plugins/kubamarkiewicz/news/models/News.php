<?php namespace KubaMarkiewicz\News\Models;

use Model;

/**
 * Model
 */
class News extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
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
    public $table = 'kubamarkiewicz_news_news';

    public $implement = ['RainLab.Translate.Behaviors.TranslatableModel']; 

    public $translatable = ['name','content'];


    /*
     * Relations
     */
    public $attachOne = [
        'image' => 'System\Models\File'
    ];
    
}