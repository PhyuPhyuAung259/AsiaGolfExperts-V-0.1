<?php

    namespace Themes\Findhouse\Template\Blocks;

    use Modules\Template\Blocks\BaseBlock;
    use Themes\Findhouse\Property\Models\Property;
    use Modules\Media\Helpers\FileHelper;

    class PageBanner extends BaseBlock
    {
        function getOptions()
        {
            return ([
                'settings' => [
                    [
                        'id'        => 'title',
                        'type'      => 'input',
                        'inputType' => 'text',
                        'label'     => __('Custom Title')
                    ],
                    [
                        'id'    => 'bg_image',
                        'type'  => 'uploader',
                        'label' => __('Background Image')
                    ],
                ]
            ]);
        }

        public function getName()
        {
            return __('Page Banner');
        }

        public function content($model = [])
        {
            $model['bg_image_url'] = '';
            if (!empty($model['bg_image'])) {
                $model['bg_image_url'] = FileHelper::url($model['bg_image'], 'full');
            }
            return view('Template::frontend.blocks.page-banner.index', $model);
        }
    }
