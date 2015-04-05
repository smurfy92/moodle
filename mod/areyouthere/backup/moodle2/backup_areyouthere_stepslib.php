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
 * Define all the backup steps that will be used by the backup_areyouthere_activity_task
 *
 * @package   mod_areyouthere
 * @category  backup
 * @copyright 2011 Your Name <your@email.adress>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

/**
 * Define the complete areyouthere structure for backup, with file and id annotations
 *
 * @package   mod_areyouthere
 * @category  backup
 * @copyright 2011 Your Name <your@email.adress>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class backup_areyouthere_activity_structure_step extends backup_activity_structure_step {

    protected function define_structure() {

        // To know if we are including userinfo
        $userinfo = $this->get_setting_value('userinfo');

        // Define each element separated
        $areyouthere = new backup_nested_element('areyouthere', array('id'), array(
            'name', 'intro', 'introformat', 'grade'));

        // Build the tree

        // Define sources
        $areyouthere->set_source_table('areyouthere', array('id' => backup::VAR_ACTIVITYID));

        // Define id annotations

        // Define file annotations
        $areyouthere->annotate_files('mod_areyouthere', 'intro', null); // This file areas haven't itemid

        // Return the root element (areyouthere), wrapped into standard activity structure
        return $this->prepare_activity_structure($areyouthere);
    }
}
