// system/modules/news/dca/tl_content.php
$GLOBALS['TL_DCA']['tl_content'] = [
	'config' => [
		'ptable' => 'tl_xippo_bs_slid'
	],
	'fields' => [
		'boostrapSlider' => [
			'label' => &$GLOBALS['TL_LANG']['tl_content']['bootStrapSlider'],
			'inputType' => 'select',
			'foreignKey' => 'tl_xippo_bs_slider.name',
			'eval' => [
				'mandatory' => true,
				'includeBlankOption' => true
			]
		],
	],
	'palettes' => [
		'bootstrapSlider' => '{type_legend},type,headline;{bootstrapSlider_legend},bootstrapSlider;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space'
	]
];