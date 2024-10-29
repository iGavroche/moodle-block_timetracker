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
 *
 * Lang strings for the timetracker block.
 *
 * @package    block_timetracker
 * @copyright  2014 Barbara Dębska, Łukasz Sanokowski, Łukasz Musiał
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['blockname'] = 'Time Tracker';
$string['pluginname'] = 'Timetracker';
$string['blocktitle'] = 'Time Tracker';
$string['nologs'] = 'No logs found!';
$string['calculate'] = 'Calculate';
$string['viewreport'] = 'View report';
$string['summary'] = 'Total course time';
$string['start'] = 'Start:';
$string['end'] = 'End:';
$string['days'] = ' days ';
$string['hours'] = ' hours ';
$string['minuts'] = ' minutes ';
$string['seconds'] = ' seconds ';
$string['time'] = 'Time';
$string['choosetimeperiod'] = 'Choose time period';
$string['loginterval'] = 'Log interval (seconds)';
$string['loginterval_desc'] = 'The time interval in which the user\'s activity is logged. The minimum value is 10 seconds.';
$string['inactivitytime'] = 'Inactivity time (big screens) (seconds)';
$string['inactivitytime_desc'] = 'The time in seconds after which the user is considered inactive. The minimum value is 10 seconds.';
$string['inactivitytime_small'] = 'Inactivity time (small screens)';
$string['inactivitytime_small_desc'] = 'The time in seconds after which the user is considered inactive when the user\'s activity is logged in small screens. The minimum value is 10 seconds.';
$string['totaltime'] = 'Total time';
$string['totaltime_desc'] = 'The total time spent by the user in the course. The time is calculated as the sum of the reported time and the inactivity time. The minimum value is 10 seconds.';
$string['totaltime_small'] = 'Total time (small screens)';
$string['totaltime_small_desc'] = 'The total time spent by the user in the course when the user\'s activity is logged in small screens. The time is calculated as the sum of the reported time and the inactivity time. The minimum value is 10 seconds.';
$string['loginterval_help'] = 'The time interval in which the user\'s activity is logged.';
$string['showtimer'] = 'Show timer';
$string['showtimer_desc'] = 'If enabled, the time counter will be visible to all enrolled users. If disabled, the time counter will be visible only to users with the "block/timetracker:viewtimer" capability.';
$string['reportedtime'] = 'Reported time';
$string['inactivitytime'] = 'Inactivity time';
$string['plugin_info'] = "This block tracks the time you spend in the course. You need to spend a minimum time of 15 active seconds for the time to be logged.";
$string['timetracker:viewreport'] = 'View report';
$string['timetracker:viewtimer'] = 'View timer';
$string['timetracker:addinstance'] = 'Add a new Timetracker block';
$string['timetracker:view'] = 'View the Timetracker block';
$string['privacy:metadata:block_timetracker'] = 'Timetracker Block';
$string['privacy:metadata:block_timetracker'] = 'Information about the time spent by the user in a specific log entry.';
$string['privacy:metadata:block_timetracker:log_id'] = 'The ID of the user related to the log entry.';
$string['privacy:metadata:block_timetracker:timespent'] = 'The time spent by the user in the log entry.';
