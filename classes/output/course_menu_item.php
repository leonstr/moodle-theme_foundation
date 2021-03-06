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
 * @copyright  &copy; 2019-onwards G J Barnard.
 * @author     G J Barnard - {@link http://moodle.org/user/profile.php?id=442195}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 */

namespace theme_foundation\output;

defined('MOODLE_INTERNAL') || die();

/**
 * The course menu item.
 *
 * @copyright  &copy; 2019-onwards G J Barnard.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 */
class course_menu_item extends \custom_menu_item {
    /**
     * Adds a custom menu item as a child of this node given its properties.
     *
     * @param string $text
     * @param moodle_url $url
     * @param string $title
     * @param int $sort
     * @return course_menu_item
     */
    public function add($text, \moodle_url $url = null, $title = null, $sort = null) {
        $key = count($this->children);
        if (empty($sort)) {
            $sort = $this->lastsort + 1;
        }
        $this->children[$key] = new course_menu_item($text, $url, $title, $sort, $this);
        $this->lastsort = (int)$sort;
        return $this->children[$key];
    }

    /**
     * Export this data so it can be used as the context for a mustache template.
     *
     * @param renderer_base $output Used to do a final render of any components that need to be rendered for export.
     * @return array
     */
    public function export_for_template(\renderer_base $output) {
        global $CFG;

        require_once($CFG->libdir . '/externallib.php');

        $syscontext = \context_system::instance();

        $context = new \stdClass();
        $context->text = $this->text;
        $context->url = $this->url ? $this->url->out() : null;
        $context->title = external_format_string($this->title, $syscontext->id);
        $context->sort = $this->sort;
        $context->children = array();
        if (preg_match("/^#+$/", $this->text)) {
            $context->divider = true;
        }
        $context->haschildren = !empty($this->children) && (count($this->children) > 0);
        foreach ($this->children as $child) {
            $child = $child->export_for_template($output);
            array_push($context->children, $child);
        }

        return $context;
    }
}
