<?php
/**
 * Template for Categories (Menu Bar)
 *
 * PHP version 5
 *
 * LICENSE: Baker CMS is free software: you can redistribute it and/or 
 * modify it under the terms of the GNU General Public License as 
 * published by the Free Software Foundation, either version 3 of 
 * the License, or (at your option) any later version. 
 *
 * Baker CMS is distributed in the hope that it will be useful, but WITHOUT 
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or 
 * FITNESS FOR A PARTICULAR PURPOSE. 
 *
 * You should have received a copy of the GNU General Public License along 
 * with Baker CMS. If not, see http://www.gnu.org/licenses/.
 * 
 * @category  Content Management System
 * @package   Baker CMS
 * @author    Nick Ramsay / Stuart Duff
 * @copyright Copyright (c) 2009, Baker CMS
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link      http://bakercms.com/
 */

?>

<div id="category_bar">
	<ul>
		<?php $h->pluginHook('category_bar_start'); ?>
		<?php echo $h->vars['output']; ?>
		<?php $h->pluginHook('category_bar_end'); ?>
	</ul>
</div>

<div class="clear"></div>