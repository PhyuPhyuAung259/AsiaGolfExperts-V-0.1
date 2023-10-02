<?php
namespace Themes\Findhouse\Property\Models;

use App\BaseModel;

class PropertyTerm extends BaseModel
{
    protected $table = 'bravo_property_term';
    protected $fillable = [
        'term_id',
        'target_id'
    ];
}
