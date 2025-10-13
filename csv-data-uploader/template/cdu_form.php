<h3>CSV Data Uploader</h3>

<p id="show_uploader_message"></p>
<form action="javascript:void(0)" id="frm-csv-upload" enctype="multipart/form-data">
  <p>
    <label for="">Upload CSV File</label>
    <input type="file" name="csv_data_file" id="csv_data_file">
    <input type="hidden" name="action" value="cdu_submit_form_data">
  </p>
  <p>
    <button type="submit">Upload CSV</button>
  </p>
</form>