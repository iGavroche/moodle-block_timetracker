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
 * Online users block settings.
 *
 * @package    block_timetracker
 * @copyright  1999 onwards Martin Dougiamas (http://dougiamas.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $settings->add(new admin_setting_configcheckbox('block_timetracker/showtimer',
        get_string('showtimer', 'block_timetracker'),
        get_string('showtimer_desc', 'block_timetracker'), 0));

    $settings->add(new admin_setting_configtext('block_timetracker/loginterval',
        get_string('loginterval', 'block_timetracker'),
        get_string('loginterval_desc', 'block_timetracker'), 15, PARAM_INT));

    $settings->add(new admin_setting_configtext('block_timetracker/inactivitytime',
        get_string('inactivitytime', 'block_timetracker'),
        get_string('inactivitytime_desc', 'block_timetracker'), 30, PARAM_INT));

    $settings->add(new admin_setting_configtext('block_timetracker/inactivitytime_small',
        get_string('inactivitytime_small', 'block_timetracker'),
        get_string('inactivitytime_small_desc', 'block_timetracker'), 30, PARAM_INT));
}

