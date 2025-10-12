jQuery(document).ready(function () {
  jQuery("#frm-csv-upload").on("submit", function (event) {
    event.preventDefault();

    var formData = new FormData(this);

    jQuery.ajax({
      url: cdu_object.ajax_url,
      data: formData,
      datatype: "json",
      method: "POST",
      processData,
      contentType,
      success: function () {},
    });
  });
});
