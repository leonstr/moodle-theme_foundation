<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Foundation theme.
 *
 * @package    theme_foundation
 * @copyright  &copy; 2018-onwards G J Barnard.
 * @author     G J Barnard - {@link http://moodle.org/user/profile.php?id=442195} - based upon work by Tim Hunt in theme_config.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_foundation;

defined('MOODLE_INTERNAL') || die();

/**
 * Abstract 'basement' class that all theme modules should extend.
 *
 * @copyright  &copy; 2018-onwards G J Barnard.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 */
abstract class module_basement {

    /**
     * Gets the module main SCSS.
     *
     * @param theme_config $theme The theme configuration object for the theme the SCSS is for.
     * @param toolbox $toolbox The toolbox instance.
     * @return string SCSS.
     */
    public function get_main_scss_content(\theme_config $theme, $toolbox) {
        return '';
    }

    /**
     * Gets the module extra SCSS.
     *
     * @param string $themename The theme name the SCSS is for.
     * @param toolbox $toolbox The toolbox instance.
     * @return string SCSS.
     */
    public function extra_scss($themename, $toolbox) {
        return '';
    }

    /**
     * Add the module settings to the theme.
     *
     * @param array $settingspages Reference to the settings pages array so that a module can add a new page to it.
     * @param boolean $adminfulltree If true then all settings required, if false then only the pages.  See /lib/adminlib.php.
     * @param toolbox $toolbox The toolbox instance.
     */
    public function add_settings(&$settingspages, $adminfulltree, $toolbox) {
    }

    /**
     * Gets the language strings for the given language code.
     * See 'What do codes like "en" and "en_us" or "es" and "es_mx" and "es_ve" mean??' on:
     * https://docs.moodle.org/35/en/Language_FAQ
     *
     * @param string $lang The language code to get.
     * @param toolbox $toolbox The toolbox instance.
     * @return array Array of strings for the module.
     */
    public function get_lang_strings($lang, $toolbox) {
        return array();
    }
}
