// contao/dca/tl_content.php
$GLOBALS['TL_DCA']['tl_content']['config']['ptable'] = 'tl_xippo_bs_slid';
$GLOBALS['TL_DCA']['tl_content']['fields']['bootstrapSlider'] = [
			'label' => &$GLOBALS['TL_LANG']['tl_content']['bootstrapSlider'],
			'inputType' => 'select',
			'foreignKey' => 'tl_xippo_bs_slider.name',
			'sql' => ['type' => 'integer', 'unsigned' => true, 'notnull' => true, 'default' => 0],
			'eval' => [
				'mandatory' => true,
				'includeBlankOption' => true
			]
		];
$GLOBALS['TL_DCA']['tl_content']['palettes']['bootstrapSlider'] = '{type_legend},type,headline;{bootstrapSlider_legend},bootstrapSlider;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space';