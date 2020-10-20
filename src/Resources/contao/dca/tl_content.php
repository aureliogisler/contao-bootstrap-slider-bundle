// system/modules/news/dca/tl_content.php

 /**
  * Dynamically add parent table
  */
 if (\Input::get('do') == 'news')
 {
     $GLOBALS['TL_DCA']['tl_content']['config']['ptable'] = 'tl_xippo_bs_slid';
 }