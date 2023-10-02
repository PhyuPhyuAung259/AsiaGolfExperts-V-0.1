<?php

namespace Themes\Golf\Golf\Models;

use App\BaseModel;

class GolfTranslation extends Golf
{
    protected $table = 'bravo_golf_translations';

    protected $fillable = [
        'title',
        'content',
        'faqs',
        'address',
        'course_details',
    ];

    protected $slugField     = false;
    protected $seo_type = 'golf_translation';

    protected $cleanFields = [
        'content'
    ];
    protected $casts = [
        'faqs'  => 'array',
        'course_details'  => 'array',
    ];

    public function getSeoType(){
        return $this->seo_type;
    }
    public function getRecordRoot(){
        return $this->belongsTo(Golf::class,'origin_id');

    }
    public static function boot() {
		parent::boot();
		static::saving(function($table)  {
			unset($table->extra_price);
			unset($table->price);
			unset($table->sale_price);
		});
	}
}
