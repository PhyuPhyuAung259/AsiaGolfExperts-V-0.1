<?php

namespace Themes\Findhouse\Review\Models;

use Illuminate\Support\Facades\Cache;

class Review extends \Modules\Review\Models\Review
{
    public static function getTotalViewAndRateAvg($objectId, $objectModel)
    {
        $list_score = [
            'score_total'  => 0,
            'total_review' => 0,
        ];
        if (empty($objectId) || empty($objectModel)) {
            return $list_score;
        }

        $list_score = Cache::rememberForever('review_'.$objectModel.'_' . $objectId, function () use ($objectId, $objectModel) {
            $dataReview = self::selectRaw(" AVG(rate_number) as score_total , COUNT(id) as total_review ")->where('object_id', $objectId)->where('object_model', $objectModel)->where("status", "approved")->first();
            $score_total = !empty($dataReview->score_total) ? number_format($dataReview->score_total, 1) : 0;
            return [
                'score_total'  => $score_total,
                'total_review' => !empty($dataReview->total_review) ? $dataReview->total_review : 0,
            ];
        });
        return $list_score;
    }

}
