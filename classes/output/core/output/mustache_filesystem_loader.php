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
 * @package    theme
 * @subpackage foundation
 * @copyright  &copy; 2018-onwards G J Barnard.
 * @author     G J Barnard - {@link http://moodle.org/user/profile.php?id=442195}
 *             based upon work by Damyon Wiese.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 */

namespace theme_foundation\output\core\output;

defined('MOODLE_INTERNAL') || die();

class mustache_filesystem_loader extends \core\output\mustache_filesystem_loader {

    /**
     * Helper function for getting a Mustache template file name.
     * Uses the leading component to restrict us specific directories.
     *
     * @param string $name
     * @return string Template file name
     */
    protected function getFileName($name) {
        /*
         * Call the theme template finder which supports partials and our inclusion rather
         * than the dependance on the Boost theme.
         *
         * Specify partials in the form 'partial/templatename'.
         */
        return mustache_template_finder::get_template_filepath($name);
    }
}
