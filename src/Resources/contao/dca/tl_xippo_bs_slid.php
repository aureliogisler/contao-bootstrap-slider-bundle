// contao/dca/tl_xippo_bs_slid.php
$GLOBALS['TL_DCA']['tl_xippo_bs_slid'] = [
    'config' => [
        'dataContainer' => 'Table',
		'ptable' => 'tl_xippo_bs_slider',
        'ctable' => ['tl_content'],
        'enableVersioning' => true,
        'sql' => [
            'keys' => [
                'id' => 'primary',
            ],
        ],
		'onload_callback' => [
            function () {
                $db = \Contao\Database::getInstance();
                $pid = \Contao\Input::get('pid');
                $result = $db->prepare('SELECT `name` FROM `tl_xippo_bs_slider` WHERE `id` = ?')
                             ->execute([$pid]);
                $prefix = strtoupper(substr($result->name, 0, 2));
            },
        ],
    ],
    'list' => [
        'sorting' => [
            'mode' => 1,
            'fields' => ['sorting'],
            'flag' => 1,
            'panelLayout' => 'search,limit'
        ],
        'label' => [
            'fields' => ['name'],
            'format' => '%s',
        ],
        'operations' => [
            'edit' => [
                'href' => 'table=tl_content',
                'icon' => 'edit.svg',
            ],
            'editheader' => [
                'href' => 'act=edit',
                'icon' => 'header.svg',
            ],
            'delete' => [
                'href' => 'act=delete',
                'icon' => 'delete.svg',
            ],
            'show' => [
                'href' => 'act=show',
                'icon' => 'show.svg'
            ],
        ],
    ],
    'fields' => [
        'id' => [
            'sql' => ['type' => 'integer', 'unsigned' => true, 'autoincrement' => true],
        ],
		'pid' => [
            'foreignKey' => 'tl_xippo_bs_slider.name',
            'sql' => ['type' => 'integer', 'unsigned' => true, 'default' => 0],
            'relation' => ['type'=>'belongsTo', 'load'=>'lazy']
        ],
        'tstamp' => [
            'sql' => ['type' => 'integer', 'unsigned' => true, 'default' => 0]
        ],
		'sorting' => [
			'sql' => ['type' => 'integer', 'unsigned' => true, 'notnull' => true, 'default' => 0 ]
		],
        'name' => [
            'label' => &$GLOBALS['TL_LANG']['tl_xippo_bs_slid']['name'],
            'search' => true,
            'inputType' => 'text',
            'eval' => ['tl_class' => 'w50', 'maxlength' => 255, 'mandatory' => true],
            'sql' => ['type' => 'string', 'length' => 255, 'default' => '']
        ],
		'image' => [
            'label' => &$GLOBALS['TL_LANG']['tl_xippo_bs_slid']['image'],
            'search' => false,
            'inputType' => 'fileTree',
            'eval' => ['filesOnly' => 'true', 'fieldType' => 'radio'],
            'sql' => ['type' => 'binary', 'length' => 16]
        ],
    ],
    'palettes' => [
        'default' => '{slider_legend},name,image'
    ],
];
