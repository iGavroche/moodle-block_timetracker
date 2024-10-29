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
 * Contains the class for the timetracker block.
 *
 * @package    block_timetracker
 * @copyright  2014 Barbara Dębska, Łukasz Sanokowski, Łukasz Musiał
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/blocks/timetracker/locallib.php');

/**
 * Timetracker block class.
 *
 * @package    block_timetracker
 * @copyright  2014 Barbara Dębska, Łukasz Sanokowski, Łukasz Musiał; 2024 iGavroche
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_timetracker extends block_base {

    /**
     * Initialises the block.
     *
     * @return void
     * @throws coding_exception
     */
    public function init() {
        $this->title = get_string('blocktitle', 'block_timetracker');
    }

    /**
     * Returns the contents.
     *
     * @return stdClass contents of block
     * @throws dml_exception
     * @throws moodle_exception
     */
    public function get_content() {
        global $COURSE, $OUTPUT, $USER, $DB;
        if ($this->content !== null) {
            return $this->content;
        }
        $contextid = $this->page->cm ? $this->page->cm->context->id : $this->page->context->id;
        $context = context_block::instance($this->instance->id);
        $userisenrolled = is_enrolled($context);
        $config = get_config('block_timetracker');
        $this->content = new stdClass();
        $this->content->text = '';
        $canseetimer = has_capability('block/timetracker:viewtimer', $context);

        $total_time = 0;
        if ($userisenrolled) {
            $logs = block_timetracker_build_logs_array($COURSE, $USER->id);
            foreach ($logs['logs'] as $log) {
                if ($log->userid == $USER->id) {
                    $total_time += $log->timespent;
                }
            }
        }

        $data = new stdClass();
        $data->courseid = $COURSE->id;
        $data->shouldseetimer = $userisenrolled && ($canseetimer || ($config->showtimer ?? false));
        $data->loginterval = $config->loginterval ?? 0;
        $data->plugin_info_string = get_string('plugin_info', 'block_timetracker', $data->loginterval);
        $data->shouldseereport = has_capability('block/timetracker:viewreport', $context);
        $data->formatted_time = format_time($total_time); // Add formatted time to data
        $this->content->text = $OUTPUT->render_from_template('block_timetracker/main', $data);
        // If the user is not enrolled in the course, we don't want to count the time.
        if ($userisenrolled) {
            $this->page->requires->js_call_amd('block_timetracker/event_emiiter', 'init', [$contextid, $config]);
        }
        return $this->content;
    }

    /**
     * Defines where the block can be added.
     *
     * @return array
     */
    public function applicable_formats() {
        return [
            'site-index' => false,
            'course-view' => true,
            'course-view-social' => true,
            'mod' => true,
            'mod-quiz' => true,
            'course' => true,
        ];
    }

    public function has_config() {
        return true;
    }

    public function instance_allow_multiple() {
        return false;
    }

    public function get_config_for_external() {
        $configs = get_config('block_timetracker');
        return (object)[
            'instance' => new stdClass(),
            'plugin' => $configs,
        ];
    }
}
