<?php
namespace Themes\Findhouse\Template\Blocks;

use Modules\Template\Blocks\BaseBlock;
use Modules\Location\Models\Location;
use Modules\Media\Helpers\FileHelper;

class OfferBlock extends BaseBlock
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
                ],[
                    'id'            => 'style',
                    'type'          => 'radios',
                    'label'         => __('Style'),
                    'values'        => [
                        [
                            'value'   => '',
                            'name' => __("Style 1")
                        ],
                        [
                            'value'   => 'style_2',
                            'name' => __("Style 2 : With Background Image")
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
                        ]
                    ]
                ],
                [
                    'id'    => 'bg_image',
                    'type'  => 'uploader',
                    'label' => __('Background Image Uploader')
                ],
                [
                    'id'          => 'list_item',
                    'type'        => 'listItem',
                    'label'       => __('List Item(s)'),
                    'title_field' => 'title',
                    'settings'    => [
                        [
                            'id'        => 'title',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Title')
                        ],
                        [
                            'id'        => 'desc',
                            'type'      => 'textArea',
                            'inputType' => 'textArea',
                            'label'     => __('Desc')
                        ],
                        [
                            'id'        => 'featured_icon',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Featured icon (find icon class in : https://icofont.com/icons)')
                        ],
                        [
                            'id'        => 'link_more',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Link More')
                        ],[
                            'id'    => 'bg_image_item',
                            'type'  => 'uploader',
                            'label' => __('Background Image Style 4')
                        ],
                    ]
                ],

            ]
        ]);
    }

    public function getName()
    {
        return __('Offer Block');
    }

    public function content($model = [])
    {
        if (empty($model['style'])) {
            $model['style'] = 'index';
        }
        $model['bg_image_url'] = '';
        if (!empty($model['bg_image'])) {
            $model['bg_image_url'] = FileHelper::url($model['bg_image'], 'full');
        }
        if (!empty($model['bg_image_item'])) {
            $model['bg_image_item_url'] = FileHelper::url($model['bg_image_item'], 'full');
        }
        return view('Template::frontend.blocks.offer-block.'.$model['style'], $model);
    }
}
