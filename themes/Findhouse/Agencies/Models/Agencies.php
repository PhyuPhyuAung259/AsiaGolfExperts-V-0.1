<?php
namespace Themes\Findhouse\Agencies\Models;

use App\BaseModel;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Themes\Findhouse\Property\Models\Property;
use Modules\Review\Models\Review;

class Agencies extends BaseModel
{
    /**
     * limit agencies
     */
    const LIMIT_AGENCY = 6;

    use SoftDeletes;
    protected $table = 'bravo_agencies';
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'fax',
        'office',
        'content',
        'social',
        'banner_image_id',
        'status',
        'author_id',
        'image_id',
        'review_score',
        'is_sold'
    ];
    protected $reviewClass;
    protected $agenciesAgentClass;
    protected $propertyClass;
    protected $slugField = 'slug';
    protected $slugFromField = 'name';
    public $type = 'agencies';
    protected $seo_type = 'agency';

    public function __construct()
    {
        parent::__construct();
        $this->reviewClass = Review::class;
        $this->agenciesAgentClass = AgenciesAgent::class;
        $this->propertyClass = Property::class;
    }

    public static function getModelName()
    {
        return __("Agencies");
    }

    public static function isEnable(){
        return setting_item('agency_disable') == false;
    }

    public function getNumberReviewsInService($status = false)
    {
        return $this->reviewClass::countReviewByServiceID($this->id, false, $status,$this->type) ?? 0;
    }

    /**
     * Define relation with agent and agencies
     */
    public function agent()
    {
        return $this->belongsToMany(\Themes\Findhouse\User\Models\User::class, "bravo_agencies_agent", 'agencies_id', 'agent_id');
    }

    /**
     * Get all agencies
     */
    public function getListAgencies()
    {
        return self::leftJoin('bravo_agencies_agent', 'bravo_agencies.id', '=', 'bravo_agencies_agent.agencies_id')
            ->leftJoin('users', 'users.id', '=', 'bravo_agencies_agent.agent_id')
            ->leftJoin('bravo_properties', 'bravo_properties.author_id', '=', 'users.id')
            ->where('bravo_agencies.status', 'publish')
            ->select('bravo_agencies.*', DB::raw('count(bravo_properties.id) as count_listing'),
                'first_name', 'last_name', 'users.name as user_name', 'users.email as user_email', 'avatar_id'
            )
            ->groupBy('bravo_agencies.id')
            ->orderBy('bravo_agencies.id', 'desc')
            ->paginate(self::LIMIT_AGENCY);
    }

    public function update_service_rate(){
        $rateData = $this->reviewClass::selectRaw("AVG(rate_number) as rate_total")->where('object_id', $this->id)->where('object_model',$this->type)->where("status", "approved")->first();
        $rate_number = number_format( $rateData->rate_total ?? 0 , 1);
        $this->review_score = $rate_number;
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(\Themes\Findhouse\User\Models\User::class, 'author_id');
    }

    public function getReviewEnable()
    {
        return setting_item("agencies_enable_review", 0);
    }

    public function getReviewApproved()
    {
        return setting_item("agencies_review_approved", 0);
    }

    public static function getAllStatuses(){
        return [
            'publish'=> __(" Publish "),
            'draft'=> __(" Move to Draft "),
            'pending'=>__( "Move to Pending "),
            'delete'=>__(" Delete "),
        ];
    }

    public static function checkAgentBelongAgencies($agentIds, $agenciesId)
    {
        $collection = AgenciesAgent::whereIn('agent_id', $agentIds);
        if (!empty($agenciesId)) {
            $collection->where('agencies_id', '<>', $agenciesId);
        }
        $check = $collection->count();
        return $check > 0 ? false : true;
    }
    public function getDetailUrl(){
        if(!$this->slug) return '';
        return route('agencies.detail',['slug'=>$this->slug]);
    }

}
