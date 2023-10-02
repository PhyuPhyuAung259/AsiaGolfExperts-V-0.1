<?php
namespace Themes\Findhouse\Agencies\Blocks;

use Modules\Template\Blocks\BaseBlock;

class Partners extends BaseBlock
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
                    'label'     => __('Sub Title')
                ],
                [
                    'id'          => 'list_item',
                    'type'        => 'listItem',
                    'label'       => __('List Item(s)'),
                    'title_field' => 'title',
                    'settings'    => [
                        [
                            'id'        => 'avatar',
                            'name'      => 'text',
                            'type'      => 'uploader',
                            'label'     => __('Image')
                        ],
                    ]
                ],
            ]
        ]);
    }

    public function getName()
    {
        return __('Our Partners');
    }

    public function content($model = [])
    {
        return view('Agencies::frontend.blocks.partners', $model);
    }
}
