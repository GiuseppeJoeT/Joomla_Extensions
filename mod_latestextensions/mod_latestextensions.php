<?php
/*------------------------------------------------------------------------
# mod_latestextensions.php (module)
# ------------------------------------------------------------------------
# version		1.0.0
# author    	Giuseppe Tiberi
# copyright 	Copyright (c) 2015 Verde Industry All rights reserved.
# @license 		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL

-------------------------------------------------------------------------
*/

defined('_JEXEC') or die;
/* All our PHP files will include the defined or die statement that prevents people from directly executing this PHP file. */

require_once __DIR__ . '/helper.php';

$list = mod_latestextensionsHelper::getlist($params);
/* We then need to load the data from the helper and put it into an array called $list 
so that we can display this information in our VIEW 

NOTE: this module has just the BACKEND VIEW */

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
// A module class suffix is a paramater used to add a custom class to a module.
/* That line of code loads our parameter for module class suffix and puts it into a variable called $moduleclass_sfx so that we can use it in the view. */
/* htmlspecialchars (PHP String Function) — Convert special characters to HTML entities */

	require JModuleHelper::getLayoutPath('mod_latestextensions', $params->get('layout', 'default'));
	/* That line of code tells the module to load the default layout (backend) in our view, which is in /tmpl/default.php */
	

/* Notice that there is no closing ?> PHP tag required on any PHP
file in Joomla!. No closing tag is recommended because whitespace
after the trailing ?> will go into the output buffer and this can
prevent the header() function from working. */