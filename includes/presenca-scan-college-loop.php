<?php
// This page actually needs to have an input field that receives the id of the student and automatically submits it, 
// calling an ajax file that does the loop below
// (maybe the ajax file returns an array of lessons and this files does the mark attendance action?)
// and then performs the mark attendance action to the lesson in question.

// What should happen if there's more than one lesson on one given day?


$nonce = wp_create_nonce("scan_student_nonce");
?>


<div class="tutor-row">
    <div class="tutor-col-12 tutor-col-sm-12 tutor-col-md-12 tutor-col-lg-12 tutor-mb-32">
        <input type="hidden" value="<?php echo $nonce; ?>" name="my_scanned_student_nonce" id="my_scanned_student_nonce">
        <input type="text" id="scanned_student_id" name="scanned_student_id" value="" placeholder="Presença..." class="tutor-form-control">
    </div>
</div>

<div class="scan_student_feedback" style="display:none;"></div>