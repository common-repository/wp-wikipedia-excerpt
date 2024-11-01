<?php
/*
Plugin Name: Wp-Wikipedia-Excerpt
Plugin Uri: http://4thmouse.com
Description: Allows the addition of [wikipedia]name[/wikipedia] tags which turn into a link to the wikipedia page for that word.
Author: Michael Smit
Version: 0.2
Author URI: http://4thmouse.com/
*/

#
#  Copyright (c) 2008 Michael Smit
#
#
#  Wp-Wikipedia-Excerpt is free software; you can redistribute it and/or modify it under
#  the terms of the GNU General Public License as published by the Free
#  Software Foundation; either version 2 of the License, or (at your option)
#  any later version.
#
#  Wp-Wikipedia-Excerpt is distributed in the hope that it will be useful, but WITHOUT ANY
#  WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
#  FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
#  details.
#
#  You should have received a copy of the GNU General Public License along
#  with Wp-Wikipedia-Excerpt; if not, write to the Free Software Foundation, Inc., 59
#  Temple Place, Suite 330, Boston, MA 02111-1307 USA
#

function wp_wikipedia_excerpt_substitute($match){
    #Mike Lay of http://www.mikelay.com/ suggested query.
    return '<a href="http://www.wikipedia.org/search-redirect.php?language=en&go=Go&search='.urlencode($match[1]).'">'.$match[1].'</a>';
}

function wp_wikipedia_excerpt_filter($content){
    return preg_replace_callback(
        "/\[wikipedia\]([^\[]*)\[\/wikipedia\]/",
        "wp_wikipedia_excerpt_substitute",
        $content);
}

add_filter('the_content','wp_wikipedia_excerpt_filter');
add_filter('the_excerpt','wp_wikipedia_excerpt_filter');
add_filter('comment_text', 'wp_wikipedia_excerpt_filter');
?>
