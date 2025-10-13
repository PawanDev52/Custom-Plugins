jQuery(document).ready(function () {
  jQuery("#frm-csv-upload").on("submit", function (event) {
    event.preventDefault();

    var formData = new FormData(this);

    jQuery.ajax({
      url: cdu_object.ajax_url,
      data: formData,
      datatype: "json",
      method: "POST",
      processData: false,
      contentType: false,
      success: function (response) {
        // console.log(response);
        if (response.status) {
          jQuery("#show_uploader_message").text(response.message).css({
            color: "green",
          });
        }
      },
    });
  });
});
