<?php
/**
 * name: Post RSS
 * description: RSS Feeds for Posts
 * version: 0.1
 * folder: post_rss
 * class: PostRss
 * type: post_rss
 * hooks: theme_index_top
 * author: Nick Ramsay
 * authorurl: http://Baker CMS.org/member.php?1-Nick
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

class PostRss
{
	/**
	 * Determine if we should show an RSS feed for posts
	 */
	public function theme_index_top($h)
	{
		if ($h->pageName != 'rss') { return false; }
		
		require_once(PLUGINS . 'post_rss/libs/PostRssFunctions.php');
		$rss_funcs = new PostRssFunctions();

		$rss_funcs->feed_results = $rss_funcs->postRssFeedQuery($h);
		$rss_funcs->doPostRssFeed($h, $rss_funcs->feed_results);
		exit;
	}
}
?>
