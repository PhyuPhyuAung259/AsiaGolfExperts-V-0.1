<?php
namespace App;

use App\Traits\HasStatus;
use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Core\Helpers\SitemapHelper;
use Modules\Core\Models\SEO;
use Modules\Media\Helpers\FileHelper;

class BaseModel extends Model
{
    use HasStatus;
    use HasTranslations;

    protected $dateFormat    = 'Y-m-d H:i:s';
    protected $slugField     = '';
    protected $slugFromField = '';
    protected $cleanFields = [];
    protected $seo_type;
    public $translationForeignKey = 'origin_id';

    public static function getModelName()
    {

    }

    public static function getAsMenuItem($id)
    {
        return false;
    }

    public static function searchForMenu($q = false)
    {
        return [];
    }

    public function save(array $options = [])
    {
        // Clear Sitemap on Save
        if($this->type or $this->sitemap_type){
            $sitemapHelper = app()->make(SitemapHelper::class);
            $sitemapHelper->clear($this->sitemap_type ? $this->sitemap_type : $this->type);
        }

        if ($this->create_user) {
            $this->update_user = Auth::id();
        } else {
            $this->create_user = Auth::id();
        }
        if ($this->slugField && $this->slugFromField) {
            $slugField = $this->slugField;
            $this->$slugField = $this->generateSlug($this->$slugField);
        }
        $this->cleanFields();
        return parent::save($options); // TODO: Change the autogenerated stub
    }

    /**
     * @todo HTMLPurifier
     * @param array $fields
     */
    protected function cleanFields($fields = [])
    {
        if (empty($fields))
            $fields = $this->cleanFields;
        if (!empty($fields)) {
            foreach ($fields as $field) {

                if ($this->$field !== NULL) {
                    $this->$field = clean($this->$field,'youtube');
                }
            }
        }
    }

    public function generateSlug($string = false, $count = 0)
    {
        $slugFromField = $this->slugFromField;
        if (empty($string))
            $string = $this->$slugFromField;
        $slug = $newSlug = $this->strToSlug($string);
        $newSlug = $slug . ($count ? '-' . $count : '');
        $model = static::select('count(id)');
        if ($this->id) {
            $model->where('id', '<>', $this->id);
        }
        $check = $model->where($this->slugField, $newSlug)->count();
        if (!empty($check)) {
            return $this->generateSlug($slug, $count + 1);
        }
        return $newSlug;
    }

    // Add Support for non-ascii string
    // Example বাংলাদেশ   ব্যাংকের    রিজার্ভের  অর্থ  চুরির   ঘটনায়   ফিলিপাইনের
    protected function strToSlug($string) {
        $slug = Str::slug($string);
        if(empty($slug)){
            $slug = preg_replace('/\s+/u', '-', trim($string));
        }
        return $slug;
    }

    public function getDetailUrl()
    {
        return '';
    }

    public function getEditUrl()
    {
        return '';
    }

    public function author()
    {
        return $this->belongsTo(User::class, "author_id", "id")->withDefault();
    }

    public function vendor(){
        return $this->belongsTo(User::class, "vendor_id", 'id')->withDefault();
    }

    public function cacheKey(){
        return strtolower($this->table);
    }

    public function findById($id)
    {
        return Cache::rememberForever($this->cacheKey() . ':' . $id, function () use ($id) {
            return $this->find($id);
        });
    }

    public function currentUser()
    {
        return Auth::user();
    }

    public function origin(){
        return $this->hasOne(get_class($this),'id','origin_id');
    }

    public function getIsTranslationAttribute(){
        if($this->origin_id) return true;
        return false;
    }


    public function getTranslationsByLocalesAttribute(){
        $translations = $this->translations;
        $res = [];

        foreach ($translations as $translation)
        {
            $res[$translation->lang]  = $translation;
        }
        return $res;
    }


    public function getIsPublishedAttribute(){

        if($this->is_translation){

            $origin = $this->origin;

            if(empty($origin)) return false;
            return $origin->status == 'publish';
        }else{
            return $this->status == 'publish';
        }
    }

    public function saveSEO(\Illuminate\Http\Request $request , $locale = false)
    {
        if(!$this->seo_type) return;
        $seo_key = $this->seo_type;
        if(!empty($locale)) $seo_key = $seo_key."_".$locale;
        $meta = SEO::where('object_id', $this->id)->where('object_model', $seo_key)->first();
        if (!$meta) {
            $meta = new SEO();
            $meta->object_id = $this->id;
            $meta->object_model = $seo_key;
        }
        $meta->fill($request->input());
        return $meta->save();
    }

    public function getSeoMeta($locale = false)
    {
        if(!$this->seo_type) return;
        $seo_key = $this->seo_type;
        if(!empty($locale)) $seo_key = $seo_key."_".$locale;
        $meta = SEO::where('object_id',  $this->id ? $this->id : $this->origin_id )->where('object_model', $seo_key)->first();
        if(!empty($meta)){
            $meta = $meta->toArray();
        }
        $meta['slug'] = $this->slug;
        $meta['full_url'] = $this->getDetailUrl();
        $meta['service_title'] = $this->title ?? $this->name;
        $meta['service_desc'] = $this->short_desc;
        $meta['service_image'] = $this->image_id;
        return $meta;
    }

    public function getSeoMetaWithTranslation($locale,$translation){
        if(is_default_lang($locale)) return $this->getSeoMeta();
        if(!empty($translation->origin_id)){
            $meta = $translation->getSeoMeta( $locale );
            $meta['full_url'] = $this->getDetailUrl();
            $meta['slug'] = $this->slug;
            $meta['service_image'] = $this->image_id;;
            return $meta;
        }
    }

    public function fillByAttr($attributes , $input)
    {
        if(!empty($attributes)){
            foreach ( $attributes as $item ){
                $this->$item = isset($input[$item]) ? ($input[$item]) : null;
            }
        }
        return $this;
    }

    public function review_after_booking(){

    }


    public static function getTableName()
    {
        return with(new static)->table;
    }

    public function hasPermissionDetailView(){
        if($this->status == "publish"){
            return true;
        }
        if(Auth::id() and $this->author_id == Auth::id() and Auth::user()->hasPermission('dashboard_vendor_access')){
            return true;
        }
        return false;
    }

    public function getForSitemap(){
        switch ($this->type){
            case("location");
            // code here
            break;
        }
        $all = parent::query()->where('status','publish')->get();
        $res = [];
        foreach ($all as $item){
            $res[] = [
                'loc'=>$item->getDetailUrl(),
                'lastmod'=>date('c',strtotime($item->updated_at ? $item->updated_at : $item->created_at)),
            ];
        }
        return $res;
    }

    public function getImageUrlAttribute($size = "medium")
    {
        $url = FileHelper::url($this->image_id, $size);
        return $url ? $url : '';
    }

    public function getGallery($featuredIncluded = false)
    {
        if (empty($this->gallery))
        {
            return [];
        }
        $list_item = [];
        if ($featuredIncluded and $this->image_id) {
            $list_item[] = [
                'large' => FileHelper::url($this->image_id, 'full'),
                'thumb' => FileHelper::url($this->image_id, 'thumb')
            ];
        }
        $items = explode(",", $this->gallery);
        foreach ($items as $k => $item) {
            $large = FileHelper::url($item, 'full');
            $thumb = FileHelper::url($item, 'thumb');
            if(!empty($large)){
                $list_item[] = [
                    'large' => $large,
                    'thumb' => $thumb
                ];
            }
        }
        return $list_item;
    }
}
