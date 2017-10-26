<?php namespace KubaMarkiewicz\Recetas\Models;

use Model;

/**
 * Model
 */
class Receta extends Model
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
    public $table = 'kubamarkiewicz_recetas_recetas';


    /*
     * Relations
     */
    public $attachOne = [
        'image' => 'System\Models\File'
    ];
}