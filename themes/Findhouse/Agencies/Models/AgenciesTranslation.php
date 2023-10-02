<?php
namespace Themes\Findhouse\Agencies\Models;

use App\BaseModel;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Themes\Findhouse\Property\Models\Property;
use Modules\Review\Models\Review;

class AgenciesTranslation extends Agencies
{
    /**
     * limit agencies
     */
    const LIMIT_AGENCY = 6;

    use SoftDeletes;
    protected $table = 'bravo_agencies_translations';
    protected $fillable = [
        'name',
        'content',
    ];
    protected $slugField = false;
    protected $seo_type = 'agency_translation';
}
