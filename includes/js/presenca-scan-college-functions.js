// $('body').css('background', '#f30');

$(document).ready(function () {

    $('#scanned_student_id').focus();
    $('#scanned_student_id').on('change', function (e) {
        e.preventDefault();

        nonce = $('#my_scanned_student_nonce').val();
        scanned_student_id = $('#scanned_student_id').val();

        // Here is the ajax petition.
        $.ajax({
            type: 'post',
            dataType: "json",
            url: scanStudentAjax.ajaxurl,
            data: {
                action: "scan_student",
                nonce: nonce,
                scanned_student_id: scanned_student_id,
            },

            beforeSend: function () {
                $('.scan_student_feedback').html('Loading...').fadeIn(200);
                $('#scanned_student_id').attr("disabled", true);
            },

            success: function (response) {
                console.log(response);

                // You can craft something here to handle the message return
                //alert(response.type);

                $('.scan_student_feedback').html('Presença confirmada').delay(3000).fadeOut(300);
                $('#scanned_student_id').attr("disabled", false).val('').focus();
            },

            fail: function (err) {
                // You can craft something here to handle an error if something goes wrong when doing the AJAX request.
                // alert("There was an error: " + err);

                $('.scan_student_feedback').html("There was an error: " + err).delay(3000).fadeOut(300);
                $('#scanned_student_id').attr("disabled", false).val('').focus();
            }

        });
    });




});