<?php

    namespace Themes\Findhouse\Template\Blocks;

    use Modules\Template\Blocks\BaseBlock;
    use Themes\Findhouse\Property\Models\Property;
    use Modules\Media\Helpers\FileHelper;

    class BannerProperty extends BaseBlock
    {
        function getOptions()
        {
            $arg[] = [
                'id'     => 'layout',
                'type'   => 'radios',
                'label'  => __('Layout'),
                'values' => [
                    [
                        'value' => '',
                        'name'  => __("Layout 1"),
                    ],
                    [
                        'value' => 'layout_2',
                        'name'  => __("Layout 2")
                    ],
                ],
                'default'    => ''
            ];
            $arg[] = [
                'id'          => 'list_slider',
                'type'        => 'listItem',
                'label'       => __('- Style Slider: List Item(s)'),
                'title_field' => 'title',
                'settings'    => [
                    [
                        'id'        => 'title',
                        'type'      => 'input',
                        'inputType' => 'text',
                        'label'     => __('Title')
                    ],
                    [
                        'id'        => 'sub_title',
                        'type'      => 'input',
                        'inputType' => 'text',
                        'label'     => __('Sub title')
                    ],
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
                            'ajax'  => [
                                'url'      => route('property.admin.getForSelect2', ['type' => 'property']),
                                'dataType' => 'json'
                            ],
                            'width' => '100%',
                        ],
                        'pre_selected' => route('property.admin.getForSelect2', [
                            'type'         => 'property',
                            'pre_selected' => 1
                        ]),

                    ]
                ],
            ];
            $arg[] = [
                'id'     => 'hide_slider_controls',
                'type'   => 'checkbox',
                'label'  => __('Hide Slider Controls'),
                'values' => [
                    [
                        'value' => '1',
                        'name'  => __("Yes")
                    ],
                ],
                'default'=>''
            ];
            return ([
                'settings' => $arg
            ]);
        }

        public function getName()
        {
            return __('Banner Property');
        }

        public function content($model = [])
        {
            if (!empty($model['list_slider'])) {
                $propertyIds = \Arr::pluck($model['list_slider'], 'property_id');
                if (!empty($propertyIds)) {
                    $rows = Property::whereIn('id', $propertyIds)->where('status', 'publish')->with(['Category', 'user'])->get();
                    foreach ($model['list_slider'] as &$item) {
                        $item['row'] = $rows->where('id', $item['property_id'])->first();
                    }
                }
            }
            switch ($model['layout']) {
                case 'layout_2':
                    $view = 'Template::frontend.blocks.banner-property.layout_2';
                    break;
                default:
                    $view = 'Template::frontend.blocks.banner-property.index';
                    break;
            }
            return view($view, $model);
        }
    }
