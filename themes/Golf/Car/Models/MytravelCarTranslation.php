<?php
namespace Themes\Golf\Car\Models;
class MytravelCarTranslation extends \Modules\Car\Models\CarTranslation
{
    protected $casts = [
        'faqs'  => 'array',
        'specifications' => 'array',
    ];

    protected $fillable = [
        'title',
        'content',
        'faqs',
        'address',
        'specifications'
    ];
}
