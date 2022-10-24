<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">History Ticket</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
              <li class="breadcrumb-item active">History</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Table History Request Ticket</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="table-responsive">
                <table id="examplebaru" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>No. Tiket</th>
                    <th>Subject</th>
                    <th>Project</th>
                    <th>Nama Aplikasi</th>
                    <th>Jenis Tiket</th>
                    <th>Keterangan</th>
                    <th>Lampiran</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  session_start();
                  $_SESSION['iduser'];

                        $no = 0;
                        $query = mysqli_query($koneksi1, "SELECT subject, project, nama_app,jen_tik, ket, lampiran,notik FROM request LEFT JOIN jenis_tiket ON request.id_tiket=jenis_tiket.id_tiket WHERE request.nip=".$_SESSION['n']);
                        while($row = mysqli_fetch_assoc($query)){
                          $no++;
                          ?>
                      <tr>
                        <td><?php echo $no ; ?></td>
                        <td><?php echo $row['notik']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row['project']; ?></td>
                        <td><?php echo $row['nama_app']; ?></td>
                        <td><?php echo $row['jen_tik']; ?></td>
                        <td><?php echo $row['ket']; ?></td>
                        <td><?php if($row['lampiran']!="") { ?><a href='../files/request<?php echo $row['lampiran'] ?>' target='_blank'><i class="fa fa-file"></i><?php echo $row['lampiran'] ?> </a><?php }?>
			                  </td>
                      </tr>
                  
                  </tbody>
                  <?php } ?>
                </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->  