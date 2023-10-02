<?php
namespace Themes\Findhouse\News\Blocks;

use Modules\Template\Blocks\BaseBlock;
use Modules\News\Models\News;
use Modules\News\Models\NewsCategory;
use Modules\Media\Helpers\FileHelper;

class ListNews extends BaseBlock
{
    function getOptions()
    {
        return ([
            'settings' => [
                [
                    'id'        => 'title',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Title')
                ],
                [
                    'id'        => 'desc',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Desc')
                ],
                [
                    'id'        => 'number',
                    'type'      => 'input',
                    'inputType' => 'number',
                    'label'     => __('Number Item')
                ],
                [
                    'id'    => 'bg_image',
                    'type'  => 'uploader',
                    'label' => __('Background Image Uploader')
                ],
                [
                    'id'      => 'category_id',
                    'type'    => 'select2',
                    'label'   => __('Filter by Category'),
                    'select2' => [
                        'ajax'  => [
                            'url'      => url('/admin/module/news/category/getForSelect2'),
                            'dataType' => 'json'
                        ],
                        'width' => '100%',
                        'allowClear' => 'true',
                        'placeholder' => __('-- Select --')
                    ],
                    'pre_selected'=>url('/admin/module/news/category/getForSelect2?pre_selected=1')
                ],
                [
                    'id'            => 'order',
                    'type'          => 'radios',
                    'label'         => __('Order'),
                    'values'        => [
                        [
                            'value'   => 'id',
                            'name' => __("Date Create")
                        ],
                        [
                            'value'   => 'title',
                            'name' => __("Title")
                        ],
                    ]
                ],
                [
                    'id'            => 'order_by',
                    'type'          => 'radios',
                    'label'         => __('Order By'),
                    'values'        => [
                        [
                            'value'   => 'asc',
                            'name' => __("ASC")
                        ],
                        [
                            'value'   => 'desc',
                            'name' => __("DESC")
                        ],
                    ]
                ],[
                    'id'        => 'bg_color',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Background Color - get code in <a href="https://html-color-codes.info" target="_blank">https://html-color-codes.info</a>'),
                    'placeholder'=> "#f7f7f7",
                ],
            ]
        ]);
    }

    public function getName()
    {
        return __('News: List Items');
    }

    public function content($model = [])
    {
        $model_Tour = News::select("core_news.*")->with(['translation']);
        if(empty($model['order'])) $model['order'] = "id";
        if(empty($model['order_by'])) $model['order_by'] = "desc";
        if(empty($model['number'])) $model['number'] = 5;
        if (!empty($model['category_id'])) {
            $category_ids = [$model['category_id']];
            $list_cat = NewsCategory::whereIn('id', $category_ids)->where("status","publish")->get();
            if(!empty($list_cat)){
                $where_left_right = [];
                foreach ($list_cat as $cat){
                    $where_left_right[] = " ( core_news_category._lft >= {$cat->_lft} AND core_news_category._rgt <= {$cat->_rgt} ) ";
                }
                $sql_where_join = " ( ".implode("OR" , $where_left_right)." )  ";
                $model_Tour
                    ->join('core_news_category', function ($join) use($sql_where_join) {
                        $join->on('core_news_category.id', '=', 'core_news.cat_id')
                            ->WhereRaw($sql_where_join);
                    });
            }
        }

        $model_Tour->orderBy("core_news.".$model['order'], $model['order_by']);
        $model_Tour->where("core_news.status", "publish");
        $model_Tour->groupBy("core_news.id");
        $list = $model_Tour->limit($model['number'])->get();
        $data = [
            'rows'       => $list,
            'title'      => $model['title'] ?? "",
            'desc'      => $model['desc'] ?? "",
            'bg_image_url'  => '',
	    'bg_color'      => $model['bg_color'] ?? "#f7f7f7",
        ];
        $data = array_merge($model, $data);
        if (!empty($model['bg_image'])) {
            $data['bg_image_url'] = FileHelper::url($model['bg_image'], 'full');
        }

        return view('News::frontend.blocks.list-news.index', $data);
    }
}
