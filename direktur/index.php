<?php 
include "../config/koneksi.php";

session_start();
//berfungsi mengecek apakah user sudah login atau belum
if($_SESSION['level']==""){
	header("location:../index.php?alert=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="../../request/assets/dist/img/wmlogo.jpg" type="image/ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Request Ticket | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../request/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../request/assets/plugins/fontawesome-free-6.2.0-web/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../request/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../request/assets/dist/css/adminlte.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../request/assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../request/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="../../request/assets/plugins/fullcalendar/main.css">
 

  <!-- DataTables -->
  <link rel="stylesheet" href="../../request/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../request/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../request/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation" src="../../request/assets/dist/img/loader.gif" alt="AdminLTELogo" height="80" width="140">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?page=dashboard" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      
      <?php 
        $sql_get = mysqli_query($koneksi1,"SELECT * FROM request 
        LEFT JOIN jenis_tiket ON request.id_tiket=jenis_tiket.id_tiket 
        WHERE request.id_tiket='1' or request.id_tiket='2'");
            $count = mysqli_num_rows($sql_get);
          ?>

      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge" id="count"><?php echo $count;?></span>
        </a>


        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header" id="count"><?php echo $count;?> Notifications</span>
          <div class="dropdown-divider"></div>

          <?php
              $sql_get = mysqli_query($koneksi1,"SELECT * FROM request 
              LEFT JOIN jenis_tiket ON request.id_tiket=jenis_tiket.id_tiket LEFT JOIN jabatan2 ON request.nip=jabatan2.no_nik 
              WHERE request.id_tiket='1' or request.id_tiket='2'");
              if(mysqli_num_rows($sql_get)>0)
              {
                while($row = mysqli_fetch_assoc($sql_get)){
                 
                  if($row['id_tiket']=="1") {
					  echo '<a class="dropdown-item text-light" href="index.php?page=history" >&#x21d2; '.$row['nama_user'].'-'.$row['notik'].'-'.$row['subject'].'</a>';
					echo '<div class="dropdown-divider"></div>';
				  } else if($row['id_tiket']="2") {
					  echo '<a class="dropdown-item text-success" href="index.php?page=history" >&#x21d2; '.$row['nama_user'].'-'.$row['notik'].'-'.$row['subject'].'</a>';
					echo '<div class="dropdown-divider"></div>';
				  }
				  
                }
              }
              else
              {
                echo '<a class="dropdown-item text-danger font-weight-bold" href="#" >Sorry! No Message</a>';
              }

            ?>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="logout.php">
          <i class="fas fa-power-off" aria-hidden="true"></i>
          <span class="badge badge-warning navbar-badge"></span>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php?page=dashboard" class="brand-link">
      <img src="../../request/assets/dist/img/wmlogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-normal"><b>Ticketing Request</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-2 pb-2 mb-2 d-flex">
        <div class="image mt-3 pb-3 mb-3">
        <img src="../../../../request/files/user_pict/<?php echo $_SESSION['pict']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
			<!-- CEK ECHO -->
          <a class="d-block"><?php echo $_SESSION['nama']; ?></a>
          <a class="d-block"><?php echo $_SESSION['jab']; ?></a>
          <i class="fa fa-circle fa-2xs" style="color: #15ff00;"></i> <a>Online</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="index.php?page=request" class="nav-link">
              <i class="nav-icon fa-solid fa-elevator"></i>
              <p>
                Request
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=history" class="nav-link">
            <i class="nav-icon fa-solid fa-book-open"></i>
              <p>
                History Request
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <?php
            include "../config/pages.php"
        ?>
    </div>
    <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
  <img class="brand-image img-circle" src="../../request/assets/dist/img/wmlogo.jpg" alt="AdminLTELogo" height="30" width="30"> <strong>Copyright &copy; 2022 <a href="https://bprwm.co.id/" target="_blank">PT. BPR Weleri Makmur</a> | </strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Ticketing</b>V.0.0.1
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../../request/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../request/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../request/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../request/assets/dist/js/adminlte.js"></script>

<!-- bs-custom-file-input -->
<script src="../../request/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../../request/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../../request/assets/plugins/raphael/raphael.min.js"></script>
<script src="../../request/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../../request/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../../request/assets/plugins/chart.js/Chart.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="../../request/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../request/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../request/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../request/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../request/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../request/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../request/assets/plugins/jszip/jszip.min.js"></script>
<script src="../../request/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../request/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../request/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../request/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../request/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Bootstrap 4 -->
<script src="../../request/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../../request/assets/plugins/select2/js/select2.full.min.js"></script>

<!-- fullCalendar 2.2.5 -->
<script src="../../request/assets/plugins/moment/moment.min.js"></script>
<script src="../../request/assets/plugins/fullcalendar/main.js"></script>

<!-- jQuery UI -->
<script src="../../request/assets/plugins/jquery-ui/jquery-ui.min.js"></script>


<!-- AdminLTE for demo purposes -->
<script src="../../request/assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../request/assets/dist/js/pages/dashboard2.js"></script>

<script>
  $(function () {
  bsCustomFileInput.init();
})

$(document).ready(function(){
			 $(".alert").delay(3000).addClass("in").fadeOut("slow");
		});

	$("#pilihtik").change(function(){

			var getValue= $(this).val();
      var jentik = $("#pilihtik option[value='"+getValue+"']").attr('data-jentik');
      var nama = $("#pilihtik option[value='"+getValue+"']").attr('data-nama');
			
		});

    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
	
	
	$("#examplebaru").DataTable({
      "responsive": false, "lengthChange": true, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#examplebaru_wrapper .col-md-6:eq(0)');
	
	
	
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
  });

  $(document).ready(function(){
			 $(".alert").delay(3000).addClass("in").fadeOut("slow");
		});

	$("#pilihnik").change(function(){

			var getValue= $(this).val();
      var jabatan = $("#pilihnik option[value='"+getValue+"']").attr('data-jabatan');
      var nama = $("#pilihnik option[value='"+getValue+"']").attr('data-nama');
			
			if(getValue == 0){
				$("#pilihjab").html("<option> </option>");
        $("#pilihnama").html("<option> </option>");
        $("#pilihnik").html("<option> </option>");
			}else{
        $("#pilihnama").val(nama).trigger('change');
        $("#pilihjab").val(jabatan).trigger('change');
			}
		}) 

//Initialize Select2 Elements
$('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
  theme: 'bootstrap4'
})

window.onload = function() { jam(); }
       
       function jam() {
           var e = document.getElementById('jam'),
           d = new Date(), h, m, s, dd, M, Y;
           dd = d.getDate();
           M = d.getMonth();
           Y = d.getFullYear();
           h = d.getHours();
           m = set(d.getMinutes());
           s = set(d.getSeconds());
      
           e.innerHTML =dd +'-'+ M +'-'+ Y +'/'+ h +':'+ m +':'+ s;
      
           setTimeout('jam()', 1000);
       }
      
       function set(e) {
           e = e < 10 ? '0'+ e : e;
           return e;
       }


       $(function () {

/* initialize the external events
 -----------------------------------------------------------------*/
function ini_events(ele) {
  ele.each(function () {

    // create an Event Object (https://fullcalendar.io/docs/event-object)
    // it doesn't need to have a start or end
    var eventObject = {
      title: $.trim($(this).text()) // use the element's text as the event title
    }

    // store the Event Object in the DOM element so we can get to it later
    $(this).data('eventObject', eventObject)

    // make the event draggable using jQuery UI
    $(this).draggable({
      zIndex        : 1070,
      revert        : true, // will cause the event to go back to its
      revertDuration: 0  //  original position after the drag
    })

  })
}


ini_events($('#external-events div.external-event'))

/* initialize the calendar
 -----------------------------------------------------------------*/
//Date for the calendar events (dummy data)
var date = new Date()
var d    = date.getDate(),
    m    = date.getMonth(),
    y    = date.getFullYear()

var Calendar = FullCalendar.Calendar;
var Draggable = FullCalendar.Draggable;

var containerEl = document.getElementById('external-events');
var checkbox = document.getElementById('drop-remove');
var calendarEl = document.getElementById('calendar');

// initialize the external events
// -----------------------------------------------------------------

new Draggable(containerEl, {
  itemSelector: '.external-event',
  eventData: function(eventEl) {
    return {
      title: eventEl.innerText,
      backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
      borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
      textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
    };
  }
});

var calendar = new Calendar(calendarEl, {
  headerToolbar: {
    left  : 'prev,next today',
    center: 'title',
    right : 'dayGridMonth,timeGridWeek,timeGridDay'
  },
  themeSystem: 'bootstrap',
  //Random default events
  events: [
    {
      title          : 'All Day Event',
      start          : new Date(y, m, 1),
      backgroundColor: '#f56954', //red
      borderColor    : '#f56954', //red
      allDay         : true
    },
    {
      title          : 'Long Event',
      start          : new Date(y, m, d - 5),
      end            : new Date(y, m, d - 2),
      backgroundColor: '#f39c12', //yellow
      borderColor    : '#f39c12' //yellow
    },
    {
      title          : 'Meeting',
      start          : new Date(y, m, d, 10, 30),
      allDay         : false,
      backgroundColor: '#0073b7', //Blue
      borderColor    : '#0073b7' //Blue
    },
    {
      title          : 'Lunch',
      start          : new Date(y, m, d, 12, 0),
      end            : new Date(y, m, d, 14, 0),
      allDay         : false,
      backgroundColor: '#00c0ef', //Info (aqua)
      borderColor    : '#00c0ef' //Info (aqua)
    },
    {
      title          : 'Birthday Party',
      start          : new Date(y, m, d + 1, 19, 0),
      end            : new Date(y, m, d + 1, 22, 30),
      allDay         : false,
      backgroundColor: '#00a65a', //Success (green)
      borderColor    : '#00a65a' //Success (green)
    },
    {
      title          : 'Click for Google',
      start          : new Date(y, m, 28),
      end            : new Date(y, m, 29),
      url            : 'https://www.google.com/',
      backgroundColor: '#3c8dbc', //Primary (light-blue)
      borderColor    : '#3c8dbc' //Primary (light-blue)
    }
  ],
  editable  : true,
  droppable : true, // this allows things to be dropped onto the calendar !!!
  drop      : function(info) {
    // is the "remove after drop" checkbox checked?
    if (checkbox.checked) {
      // if so, remove the element from the "Draggable Events" list
      info.draggedEl.parentNode.removeChild(info.draggedEl);
    }
  }
});

calendar.render();
// $('#calendar').fullCalendar()

/* ADDING EVENTS */
var currColor = '#3c8dbc' //Red by default
// Color chooser button
$('#color-chooser > li > a').click(function (e) {
  e.preventDefault()
  // Save color
  currColor = $(this).css('color')
  // Add color effect to button
  $('#add-new-event').css({
    'background-color': currColor,
    'border-color'    : currColor
  })
})
$('#add-new-event').click(function (e) {
  e.preventDefault()
  // Get value and make sure it is not null
  var val = $('#new-event').val()
  if (val.length == 0) {
    return
  }

  // Create events
  var event = $('<div />')
  event.css({
    'background-color': currColor,
    'border-color'    : currColor,
    'color'           : '#fff'
  }).addClass('external-event')
  event.text(val)
  $('#external-events').prepend(event)

  // Add draggable funtionality
  ini_events(event)

  // Remove event from text input
  $('#new-event').val('')
})
})


</script>

</body>
</html>
