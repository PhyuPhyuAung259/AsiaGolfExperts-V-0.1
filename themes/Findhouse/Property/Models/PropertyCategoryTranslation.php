<?php
namespace Themes\Findhouse\Property\Models;

use App\BaseModel;

class PropertyCategoryTranslation extends BaseModel
{
    protected $table = 'bravo_property_category_translations';
    protected $fillable = [
        'name',
        'content',
    ];
    protected $cleanFields = [
        'content'
    ];
}
