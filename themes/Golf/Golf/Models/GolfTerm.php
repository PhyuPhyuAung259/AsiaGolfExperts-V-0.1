<?php
namespace Themes\Golf\Golf\Models;

use App\BaseModel;

class GolfTerm extends BaseModel
{
    protected $table = 'bravo_golf_term';
    protected $fillable = [
        'term_id',
        'target_id'
    ];
}
