// system/modules/news/dca/tl_content.php
$GLOBALS['TL_DCA']['tl_content']['config']['ptable'] = 'tl_xippo_bs_slid';
$GLOBALS['TL_DCA']['tl_content']['palettes']['bootstrapSlider'] = '{type_legend},type,headline;{bootstrapSlider_legend},bootstrapSlider;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['fields']['boostrapSlider'] = [ 
	'label' => &$GLOBALS['TL_LANG']['tl_content']['bootStrapSlider'],
	'inputType' => 'select',
	'eval' => [
		'mandatory' => true,
		'includeBlankOption' => true
		]
	]
