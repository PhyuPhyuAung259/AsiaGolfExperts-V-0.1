<?php

    namespace Themes\Findhouse\Template\Blocks;

    use Modules\Template\Blocks\BaseBlock;

    class Gallery extends BaseBlock
    {
        function getOptions()
        {
            return ([
                'settings' => [
                    [
                        'id'          => 'gallery',
                        'type'        => 'listItem',
                        'label'       => __('Gallery Images'),
                        'title_field' => 'title',
                        'settings'    => [
                            [
                                'id'    => 'image',
                                'type'  => 'uploader',
                                'label' => __('Image')
                            ]
                        ]
                    ],
                ]
            ]);
        }

        public function getName()
        {
            return __('Gallery');
        }

        public function content($model = [])
        {

            return view('Template::frontend.blocks.gallery.index', $model);
        }
    }
