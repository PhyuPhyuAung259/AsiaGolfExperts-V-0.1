<?php


namespace Themes\Golf\Hotel\Models;


class MytravelHotelTranslation extends \Modules\Hotel\Models\HotelTranslation
{

    protected $casts = [
        'policy'  => 'array',
        'surrounding' => 'array',
        'badge_tags' => 'array',
    ];

}
