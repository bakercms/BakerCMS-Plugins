/* ****************************************************************************************************
 *  File: /plugins/post_manager/javascript/post_manager.js
 *  Purpose: Ajax for Post_Manager Plugin
 *  Notes:
 *  License:
 *
 *   This file is part of Baker CMS (http://bakercms.com/).
 *
 *   Baker CMS is free software: you can redistribute it and/or modify it under the terms of the
 *   GNU General Public License as published by the Free Software Foundation, either version 3 of
 *   the License, or (at your option) any later version.
 *
 *   Baker CMS is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 *   even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License along with Baker CMS. If not,
 *   see http://www.gnu.org/licenses/.
 *
 *   Copyright (C) 2009 Baker CMS - http://bakercms.com/
 *
 **************************************************************************************************** */

jQuery('document').ready(function($) {

	$('#checkall').click(function () {
		$(this).parents('fieldset:eq(0)').find(':checkbox').attr('checked', this.checked);
	});

});

