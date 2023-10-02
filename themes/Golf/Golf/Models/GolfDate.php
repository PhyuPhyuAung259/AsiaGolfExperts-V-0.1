<?php
namespace Themes\Golf\Golf\Models;

use App\BaseModel;

class GolfDate extends BaseModel
{
    protected $table = 'bravo_golf_dates';

    protected $casts = [
        'ticket_types'=>'array',
        'time_slot'=>'array'
    ];

    public static function getDatesInRanges($start_date,$end_date,$id){
        return static::query()->where([
            ['start_date','>=',$start_date],
            ['end_date','<=',$end_date],
            ['target_id','=',$id],
        ])->take(100)->get();
    }
}
