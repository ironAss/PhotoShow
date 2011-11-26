<?php
/**
 * This file implements the class CurrentUser.
 * 
 * PHP versions 4 and 5
 *
 * LICENSE:
 * 
 * This file is part of PhotoShow.
 *
 * PhotoShow is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * PhotoShow is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with PhotoShow.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @category  Website
 * @package   Photoshow
 * @author    Thibaud Rohmer <thibaud.rohmer@gmail.com>
 * @copyright 2011 Thibaud Rohmer
 * @license   http://www.gnu.org/licenses/
 * @link      http://github.com/thibaud-rohmer/PhotoShow-v2
 */

/**
 * CurrentUser
 *
 * Stores the information of the currently logged user.
 * Implements login and logout function.
 *
 * @category  Website
 * @package   Photoshow
 * @author    Thibaud Rohmer <thibaud.rohmer@gmail.com>
 * @copyright Thibaud Rohmer
 * @license   http://www.gnu.org/licenses/
 * @link      http://github.com/thibaud-rohmer/PhotoShow-v2
 */
class JS
{
	
	public function __construct(){

		switch(CurrentUser::$action){
			case "Page":		if(is_file(CurrentUser::$path)){
										$b = new ImagePanel(CurrentUser::$path);
									$this->script_load("image_panel");
									$b->toHTML();
								}else{
									$b = new Board(CurrentUser::$path);
									$this->script_load("panel");
									$b->toHTML();
								}

								echo "<script> update_url('?f=".File::a2r(CurrentUser::$path)."','".basename(CurrentUser::$path)."'); </script>";
			case "Adm":			$page = new Admin();
								$page->toHTML();
		}

	}
}


?>