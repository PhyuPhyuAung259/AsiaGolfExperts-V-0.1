<?php
namespace Themes\Findhouse\Template\Blocks;

use Themes\Findhouse\Property\Models\Property;
use Modules\Template\Blocks\BaseBlock;

class Map extends BaseBlock
{
    function getOptions()
    {
        return ([
            'settings' => [
                [
                    'id'           => 'custom_ids',
                    'type'         => 'select2',
                    'label'        => __('List Location by ID'),
                    'select2'      => [
                        'ajax'     => [
                            'url'      => route('location.admin.getForSelect2'),
                            'dataType' => 'json'
                        ],
                        'width'    => '100%',
                    ],
                    'pre_selected' => route('location.admin.getForSelect2', [
                        'pre_selected' => 2
                    ])
                ],
                [
                    'id'        => 'number',
                    'type'      => 'input',
                    'inputType' => 'number',
                    'label'     => __('Number Item'),
                    'default'=>6
                ],
            ],

        ]);
    }

    public function getName()
    {
        return __('Property Map by location');
    }

    public function content($model = [])
    {
        $model['markers'] = [];
        if(!empty($model['custom_ids'])){
            $list = Property::where('status','publish')->whereHas('location',function ($q) use ($model){
                $q->where('status','publish')->where('id',$model['custom_ids']);
            })->limit($model['number'])->get();
            if (!empty($list)) {
                foreach ($list as $row) {
                    $model['markers'][] = [
                        "id"      => $row->id,
                        "title"   => $row->title,
                        "lat"     => (float)$row->map_lat,
                        "lng"     => (float)$row->map_lng,
                        "gallery" => $row->getGallery(true),
                        "infobox" => view('Property::frontend.layouts.search.loop-gird', ['row' => $row,'disable_lazyload'=>1,'wrap_class'=>'infobox-item'])->render(),
                        'marker'  => url('images/icons/png/pin.png'),
                    ];
                }
            }
        }
        return view('Template::frontend.blocks.map.index', $model);
    }
}
