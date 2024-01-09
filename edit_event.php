<?php
include "header.php";

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM event WHERE id_event = $id");

if ($data) {
  $row = mysqli_fetch_assoc($data);

} else {
  echo "Data tidak ditemukan.";
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Event</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item"><a href="event.php">Event</a></li>
            <li class="breadcrumb-item active">Edit Event</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">





        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Form Edit Event</h3>
            </div>
            <div class="card-body">








              <form role="form" method="POST" action="proses_edit_event.php" enctype="multipart/form-data">
                <input type="hidden" name="id_event" value="<?php echo $row['id_event']; ?>">

                <div class="form-group row">
                  <div class="col-sm-2 col-form-label"><label for="exampleInputJudul">Judul</label></div>
                  <div class="col-sm-10">
                    <input required type="text" class="form-control" id="Judul" placeholder="Masukan Judul Event"
                      name="judul" value="<?php echo $row['judul']; ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2 col-form-label"><label for="exampleInputIsi">Isi</label></div>
                  <div class="col-sm-10">
                    <textarea required class="form-control" id="isi" placeholder="Masukan Isi Event"
                      name="isi"><?php echo $row['isi']; ?></textarea>
                  </div>
                </div>

                <div class="form-group row mb-3">
                  <div class="col-sm-2 col-form-label"><label for="jenis">Kategori</label></div>
                  <div class="col-sm-10">
                    <select name="jenis" id="jenis" class="form-control select2">
                      <?php
                      $results_jenis = mysqli_query($conn, "SELECT * FROM kategori");
                      $option_jenis = '';

                      while ($row_jenis = mysqli_fetch_array($results_jenis, MYSQLI_ASSOC)) {
                        if ($row['id_kategori'] == $row_jenis['id_kategori']) {
                          $option_jenis .= '<option selected value="' . $row_jenis['id_kategori'] . '">' . $row_jenis['nama_kategori'] . '</option>';
                        } else {
                          $option_jenis .= '<option value="' . $row_jenis['id_kategori'] . '">' . $row_jenis['nama_kategori'] . '</option>';
                        }
                      }

                      echo $option_jenis;
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2 col-form-label"><label for="exampleInputLokasi">Lokasi</label></div>
                  <div class="col-sm-10">
                    <input required type="text" class="form-control" id="Lokasi" placeholder="Masukan Lokasi Event"
                      name="lokasi" value="<?php echo $row['lokasi']; ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2 col-form-label"><label for="exampleInputHarga">Harga</label></div>
                  <div class="col-sm-10">
                    <input required type="text" class="form-control" id="Harga" placeholder="Masukan Harga Event"
                      name="harga" value="<?php echo $row['harga']; ?>">
                  </div>
                </div>

                <?php
                // Format tanggal dari database
                $tanggal_database = $row['tanggal'];

                // Ubah format tanggal
                $tanggal = date("m-d-Y", strtotime($tanggal_database));
                ?>
                <div class="form-group row">
                  <div class="col-sm-2 col-form-label"><label for="exampleInputTgl">Tanggal</label></div>
                  <div class="col-sm-10">
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">

                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                      <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"
                        name="tanggal" value="<?php echo $tanggal; ?>" />
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2 col-form-label">
                    <label for="exampleInputFile">File input</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="file" id="exampleInputFile" name="fileToUpload">
                    <p class="help-block">
                      <label style=" color:red" class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i>
                        File Max 1 mb (Wajib dalam format PNG/ JPG)</label>
                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-dark btn-primary">Submit</button>
                </div>

              </form>

            </div>
          </div>
        </div>

      </div>
      <!-- /.row -->
      <!-- Main row -->
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.2.0
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
      format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function (event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function () {
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function (file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function () { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function (progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function (file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function (progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function () {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function () {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
</body>

</html>