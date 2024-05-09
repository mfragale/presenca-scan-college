<?php

function scan_student()
{
    // nonce check for an extra layer of security, the function will exit if it fails
    if (!wp_verify_nonce($_REQUEST["nonce"], "scan_student_nonce")) {
        exit("Woof Woof Woof");
    }

    // Check if action was fired via Ajax call. If yes, JS code will be triggered, else the user is redirected to the post page
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

        $scanned_student_id = $_REQUEST['scanned_student_id'];
        $enrolled_courses = tutor_utils()->get_enrolled_courses_ids_by_user($scanned_student_id);

        foreach ($enrolled_courses as $course_id) {

            $topics = tutor_utils()->get_topics($course_id);

            foreach ($topics->posts as $topic) {

                $args = array(
                    'post_type'      => 'lesson',
                    'post_parent'    => $topic->ID,
                    'posts_per_page' => '-1',
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                    'meta_query' => array(
                        '0' => array(
                            'key' => '_content_drip_settings',
                            'value' => date("d-m-Y"), //today
                            'compare' => 'LIKE',
                        ),
                    ),
                );

                $lesson_query = new WP_Query($args);

                foreach ($lesson_query->posts as $lesson) {
                    $lesson_id = $lesson->ID;
                }
            }
        }
        wp_reset_postdata();

        global $wpdb;
        $table_attendance_logs = $wpdb->prefix . 'tlms_attendance_logs';

        $data = array(
            'course_id'       => tutor_utils()->get_course_id_by_subcontent($lesson_id),
            'lesson_id'       => $lesson_id,
            'user_id'         => $scanned_student_id,
            'ip_address'      => '-',
            'device_id'       => 'desktop',
            'log_by_user_id'  => get_current_user_id(),
            'attendance_type' => 'present',
            'comment'         => 'scanned',
            'created_at'      => current_datetime()->format('Y-m-d H:i:s')
        );

        $format = array(
            '%d',
            '%d',
            '%d',
            '%s',
            '%s',
            '%d',
            '%s',
            '%s',
            '%s'
        );

        $wpdb->insert($table_attendance_logs, $data, $format);

        update_user_meta($scanned_student_id, '_tutor_completed_lesson_id_' . $lesson_id, tutor_time());

        $result = json_encode($data);
        echo $result;
    } else {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    // don't forget to end your scripts with a die() function - very important
    wp_die();
}
