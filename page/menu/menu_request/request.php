<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ticket</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Ticket</li>
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
          <!-- left column -->
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Ticket</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <?php

                $auto1 = "SELECT COUNT(id_req) AS max_code1 FROM request";
                $hasil1 = mysqli_query($koneksi1,$auto1);
                $data1 = mysqli_fetch_array($hasil1);

                $max_code1 = $data1['max_code1'];

                $nourut1 = (int) substr($max_code1, 0,3);
                $nourut1++;
                                        //035/SK.03/II/2022
                $char1 = 'TICKETINGWM';

                $array_bln = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
                $bln = $array_bln[date('n')];
                $thn = gmdate("Y");
                $kodejadi1 = sprintf("%03s" , $nourut1) .'-'.$char1.""."-".$bln."-".$thn;
                
              ?>

              <form method="POST" action="index.php?page=create_request" enctype="multipart/form-data">

                <div class="card-body">
                  <div class="form-group">
                  <div class="row">
                  <div>
                  <input class="form-control" name="nip" type="hidden" value="<?php echo $_SESSION['n']; ?>">
                  <input class="form-control" type="hidden" value="<?php echo $_SESSION['iduser']; ?>">
                  </div>
                  <div class="col-4">
                    <label for="Subjek">No Tiket</label>
                    <input class="form-control" name="notik" type="text" value="<?php echo $kodejadi1 ?>" readonly>
                  </div>
                  </div>
                  </div>
                  <div class="form-group">
                    <label for="Subjek">Subjek *</label>
                    <input class="form-control" name="subject" type="text" placeholder="Permintaan User (Etc. : Pembuatan...)">
                  </div>
                  <div class="row">
                  <div class="col-4">
                    <label for="Project">Project *</label>
                    <input class="form-control" type="text" name="project" placeholder="Nama Project (Etc. : Pembuatan...)">
                  </div>
                  <div class="col-4">
                    <label for="Modul">Nama Aplikasi *</label>
                    <input class="form-control" type="text" name="nama_app" placeholder="Nama Aplikasi (Etc. : Pembuatan...)">
                  </div>
                    <div class="col-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Jenis Ticket *</label>
                        <select class="form-control" name="id_tiket" id="pilihtik" required>
                          <option value=""></option>

                          <?php
						       $querytiket = mysqli_query($koneksi1, "SELECT * FROM jenis_tiket");
                               while($j = mysqli_fetch_array($querytiket)){
                                echo "<option value='$j[id_tiket]' data-jentik='".$j['jen_tik']."' >".$j['jen_tik']."</option>";
                            }
                            ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Penjelasan</label>
                        <textarea class="form-control" name="ket" rows="3" placeholder="Nama Menu atau Keterangan permintaan..."></textarea>
                      </div>
                      </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="lampiran">
                        <label class="custom-file-label" for="exampleInputFile">Lampiran Pendukung</label>
                      </div>
                  </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->