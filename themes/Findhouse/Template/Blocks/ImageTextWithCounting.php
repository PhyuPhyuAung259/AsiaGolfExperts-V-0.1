<?php

    namespace Themes\Findhouse\Template\Blocks;

    use Modules\Template\Blocks\BaseBlock;
    use Themes\Findhouse\Property\Models\Property;
    use Modules\Media\Helpers\FileHelper;

    class ImageTextWithCounting extends BaseBlock
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
                        'id'    => 'image',
                        'type'  => 'uploader',
                        'label' => __('Image')
                    ],
                    [
                        'id'        => 'video_url',
                        'type'      => 'input',
                        'inputType' => 'text',
                        'label'     => __('Video Url (Youtube, Vimeo, ..)')
                    ],
                    [
                        'id'    => 'description',
                        'type'      => 'editor',
                        'label' => __('Description')
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
                                'label'     => __('Label')
                            ],
                            [
                                'id'        => 'value',
                                'type'      => 'input',
                                'inputType' => 'text',
                                'label'     => __('Value')
                            ],
                            [
                                'id'        => 'icon_class',
                                'type'      => 'input',
                                'inputType' => 'text',
                                'label'     => __('Icon Class')
                            ]
                        ]
                    ],
                ]
            ]);
        }

        public function getName()
        {
            return __('Image Text With Counting');
        }

        public function content($model = [])
        {

            return view('Template::frontend.blocks.image-text.index', $model);
        }
    }
