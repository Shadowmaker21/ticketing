 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard Ticketing</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Dashboard Ticketing</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-solid fa-wrench"></i></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><label>Total Request Modifikasi</label></span>
                <?php 
                    $auto1 = "SELECT COUNT(IF(id_tiket='1', id_tiket,NULL)) AS max_code1 FROM request";
                    $hasil1 = mysqli_query($koneksi1,$auto1);
                    $data1 = mysqli_fetch_array($hasil1);
                                      
                    $max_code1 = $data1['max_code1'];
                ?>
                <span class="info-box-number">
                  <?php echo $max_code1 ?>
                  <label>Request</label>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-regular fa-circle-plus"></i></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><label>Totak Request Aplikasi Baru</label></span>
                <?php 
                    $auto = "SELECT COUNT(IF(id_tiket='2', id_tiket,NULL)) AS max_code FROM request";
                    $hasil = mysqli_query($koneksi1,$auto);
                    $data = mysqli_fetch_array($hasil);
                                      
                    $max_code = $data['max_code'];
                ?>
                <span class="info-box-number">
                    <?php echo $max_code ?>
                    <label>Request</label>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-regular fa-clock"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tanggal & Waktu</span>
                
                <span id="jam" class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- Info boxes -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ucapan Selamat Datang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                <div id="accordion">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                        <?php echo $_SESSION['nama'] ?> - <?php echo $_SESSION['n'] ?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                      <div class="card-body">
                        Hai <b><?php echo $_SESSION['nama'] ?></b> , Selamat datang di Sistem Ticketing Request. Anda dapat melakukan Request dengan 2 pilihan, yaitu :<br><b>Modifikasi</b> dan <b>Program Baru</b>.<br><br>Anda Bisa melihat menu disamping :<br><b> - Request</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Melakukan permintaan terkait modifikasi, maupun permintaan baru.<br><b> - History Request</b> &nbsp;&nbsp;: Melihat history terkait permintaan baru maupun modifikasi.<br><br>Silahkan jika setelah melakukan request, konfirmasi terhadap pihak terkait.
                        
                        Jika masih mengalami kesulitan, silahkan menghubungi TSI.
                      </div>
                    </div>
                  </div>
                </div>
                </div>
              <!-- /.card-body -->
            </div>
         </section>
        <!-- /.content -->
					<div class="row">
				<div class="col-4">
					<div class="calendar">
						<div class="header">
							<a data-action="prev-month" href="javascript:void(0)" title="Previous Month"><i></i></a>
							<div class="text" data-render="month-year"></div>
							<a data-action="next-month" href="javascript:void(0)" title="Next Month"><i></i></a>
						</div>
						<div class="months" data-flow="left">
							<div class="month month-a">
								<div class="render render-a"></div>
							</div>
							<div class="month month-b">
								<div class="render render-b"></div>
							</div>
						</div>
					</div>
				</div>
			</div>



              
