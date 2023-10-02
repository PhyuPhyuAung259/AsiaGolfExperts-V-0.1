<?php
namespace Themes\Findhouse\Template\Blocks;

use Modules\Template\Blocks\BaseBlock;
use Modules\Location\Models\Location;
use Themes\Findhouse\Property\Models\Property;
use Modules\Core\Models\Attributes;
use Modules\Core\Models\Terms;
use Modules\Media\Helpers\FileHelper;
use Themes\Findhouse\Property\Models\PropertyCategory;

class FormSearchAllService extends BaseBlock
{
    function getOptions()
    {
        $list_attr = [];
        $list_attr_select = [];
        $list_attribute = Attributes::where("service", 'property')
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($list_attribute as $key => $service) {
            $list_service[] = ['value'   => $service['id'],
                               'name' => ucwords($service['name'])
            ];
        }
        $arg[] = [
            'id'            => 'attr_hide',
            'type'          => 'checklist',
            'listBox'          => 'true',
            'label'         => "<strong>".__('Show Attribute')."</strong>",
            'values'        => $list_service,
        ];
        $arg[] = [
            'id'        => 'title',
            'type'      => 'input',
            'inputType' => 'text',
            'label'     => __('Title')
        ];
        $arg[] = [
            'id'        => 'sub_title',
            'type'      => 'input',
            'inputType' => 'text',
            'label'     => __('Sub Title')
        ];
        $arg[] = [
            'id'        => 'desc',
            'type'      => 'input',
            'inputType' => 'text',
            'label'     => __('Desc')
        ];
        $arg[] =  [
            'id'            => 'style',
            'type'          => 'radios',
            'label'         => __('Style Background'),
            'values'        => [
                [
                    'value'   => '',
                    'name' => __("Style 1")
                ],
                [
                    'value'   => 'style_2',
                    'name' => __("Style 2 - Slider Carousel")
                ],
                [
                    'value'   => 'style_3',
                    'name' => __("Style 3")
                ],
                [
                    'value'   => 'style_4',
                    'name' => __("Style 4")
                ],
                [
                    'value'   => 'style_5',
                    'name' => __("Style 5")
                ],
                [
                    'value'   => 'style_6',
                    'name' => __("Style 6")
                ],
                [
                    'value'   => 'style_7',
                    'name' => __("Style 7")
                ],
            ]
        ];
        $arg[] = [
            'id'    => 'bg_image',
            'type'  => 'uploader',
            'label' => __('- Style: Background Image Uploader'),

        ];
        $arg[] =[
            'id'           => 'category_ids',
            'type'         => 'select2',
            'label'        => __('Select Category'),
            'select2'      => [
                'ajax'     => [
                    'url'      => route('property.admin.category.getForSelect2', ['type' => 'property']),
                    'dataType' => 'json'
                ],
                'multiple' => "true",
                'width'    => '100%',
            ],
            'pre_selected' => route('property.admin.category.getForSelect2', [
                'type'         => 'property',
                'pre_selected' => 1
            ]),

        ];
        $arg[] = [
            'id'          => 'list_slider',
            'type'        => 'listItem',
            'label'       => __('- Style Slider: List Item(s)'),
            'title_field' => 'title',
            // 'conditions'=>['style'=>'style_6, style_7'],
            'settings'    => [
                [
                    'id'    => 'bg_image',
                    'type'  => 'uploader',
                    'label' => __('Background Image Uploader')
                ],
                [
                    'id'           => 'property_id',
                    'type'         => 'select2',
                    'label'        => __('Select property'),
                    'select2'      => [
                        'ajax'     => [
                            'url'      => route('property.admin.getForSelect2', ['type' => 'property']),
                            'dataType' => 'json'
                        ],
                        'width'    => '100%',
                    ],
                    'pre_selected' => route('property.admin.getForSelect2', [
                        'type'         => 'property',
                        'pre_selected' => 1
                    ]),

                ]
            ]
        ];
        $arg[] = [
            'id'        => 'video_url',
            'type'      => 'input',
            'inputType' => 'text',
            'label'     => __('Video URL'),
            'conditions'=>['style'=>'style_4']
        ];
        $arg[] = [
            'type'=> "checkbox",
            'label'=>__("Hide form search service?"),
            'id'=> "hide_form_search",
            'default'=>false
        ];

        return ([
            'settings' => $arg
        ]);
    }

    public function getName()
    {
        return __('Form Search All Service');
    }

    public function content($model = [])
    {
        if (empty($model['style'])) {
            $model['style'] = 'style_1';
        }
        $showAttrId = isset($model['attr_show']) ? $model['attr_show'] : false;
        $model['attr_show'] = [];
        if(!empty($showAttrId)) {
            $model['attr_show'] = Attributes::with('terms')->find($showAttrId);
        }
        $hideAttrId = isset($model['attr_hide']) ? $model['attr_hide'] : [];
        $model['attr_hide'] = [];
        if(!empty($hideAttrId)) {
            $model['attr_hide'] = Attributes::with('terms')->whereIn("id", $hideAttrId)->get();
        }

        $model['bg_image_url'] = FileHelper::url($model['bg_image'], 'full') ?? "";
        $model['modelBlock'] = $model;
        $model['property_min_max_price'] = Property::getMinMaxPrice();

        $limit_location = 15;
        $model['list_location'] = Location::where('status', 'publish')->with(['translation'])->get()->toTree();
        $model['list_category'] = PropertyCategory::where('status', 'publish')->get()->toTree();

        $model['list_slider'] = $model['list_slider'] ?? "";

        $model_property = Property::query()->with(['translation']);
        $model_property->where("status","publish");

        if (!empty($model['list_slider'])) {
            $propertyIds = \Arr::pluck($model['list_slider'], 'property_id');
            if (!empty($propertyIds)) {
                $rows = Property::whereIn('id', $propertyIds)->where('status', 'publish')->with(['Category', 'user'])->get();
                foreach ($model['list_slider'] as &$item) {
                    if(empty($item['property_id'])) continue;
                    $item['row'] = $rows->where('id', $item['property_id'])->first();
                }
            }
        }
        $data = [
            'title'         => $model['title']??"",
            'sub_title'         => $model['sub_title']??"",
            'desc'          => $model['desc'] ?? "",
            'layout'        => !empty($model['style']) ? $model['style'] : "style_1",
            'list_location' =>$model['list_location'] ?? '',
            'list_category' =>$model['list_category'] ?? '',
            'list_slider'   =>$model['list_slider'] ?? '',
            'bg_image_url'  =>$model['bg_image_url'] ?? '',
            'property_min_max_price' => $model['property_min_max_price'],
            'video_url'=>$model['video_url']??""
        ];

        if(!empty($model['category_ids'])){
            $data['category_ids'] = PropertyCategory::whereIn('id',$model['category_ids'])->get();
        }
        return $this->view('Template::frontend.blocks.form-search-all-service.'.$model['style'], $data);
    }
}
