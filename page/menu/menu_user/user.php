    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Menu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
              <li class="breadcrumb-item active">User Menu</li>
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
                <h3 class="card-title">Tabel User</h3>
                <br>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                  Tambah User
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                <table id="examplebaru" class="table table-bordered table-striped">

                <thead>
                        <th>No</th>
			                  <th>Nama User</th>
                        <th>Jabatan</th>
                        <th>Username</th>
                        <th>NIP</th>
                        <th>Profil</th>
                        <th>Level</th>
                        <th>Action</th>

                    </thead>
                    <tbody>
                    <?php
                        $no = 0;
                        $query = mysqli_query($koneksi1, "SELECT id_user,nama_lengkap,jabatan,username,pass_user,file_pic,level,nip FROM user");
                        while($row = mysqli_fetch_assoc($query)){
                          $no++;
                          ?>
                      <tr>
                        <td><?php echo $no ; ?></td>
                        <td><?php echo $row['nama_lengkap']; ?></td>
                        <td><?php echo $row['jabatan']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['nip']; ?></td>
                        <td><img src="../../../../request/files/user_pict/<?php echo $row['file_pic']; ?>" width='85' height='85'></td>
                        <td><?php echo $row['level']; ?></td>
                        <td>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?php echo $row['id_user'] ?>">Edit</a></button>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php echo $row['id_user'] ?>">Delete</a></button>
                        </td>


                      </tr>

                      <!-- Modal form Tambah User -->
    <div class="modal fade" id="modal-edit<?php echo $row['id_user'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Pengguna</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" method="POST" action="index.php?page=edit_user" enctype="multipart/form-data">
                <div class="card-body">
                    
                  <div class="form-group">
                    <input type="hidden" name="id_user" value="<?php echo $row['id_user'] ?>">
                    <label for="exampleInputEmail1">Nama User </label>
                    <input type="text" class="form-control" name="nama_user" placeholder="Nama User" value="<?php echo $row['nama_lengkap'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" placeholder="Username" value="<?php echo $row['jabatan'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $row['username'] ?>">
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" name="pass_user" placeholder="Password" autocomplete="off" value="<?php echo $row['pass_user'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="file_pic" placeholder="Profil" value="<?php echo $row['file_pic'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Level</label>
                    <select class="form-control select2" name="level" data-placeholder="Select a Level" style="width: 100%;" <?php echo $row['level'] ?>>
                        <option value="ADMIN<?php echo $row['level'] ?>">Admin</option>
                        <option value="DIREKTUR<?php echo $row['level'] ?>">Direktur</option>
                        <option value="KARYAWAN<?php echo $row['level'] ?>">Karyawan</option>
                    </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Edit</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

                            <!-- Modal form Hapus User -->
    <div class="modal fade" id="modal-delete<?php echo $row['id_user'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Pengguna</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" method="POST" action="index.php?page=delete_user" enctype="multipart/form-data">
                <div class="card-body">


                  <div class="form-group">
                    <input type="hidden" name="id_user" value="<?php echo $row['id_user'] ?>">
                    <label for="exampleInputEmail1">Nama User </label>
                    <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama User" value="<?php echo $row['nama_lengkap'] ?>" Disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" placeholder="Username" value="<?php echo $row['jabatan'] ?>" Disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $row['username'] ?>" Disabled>
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" name="pass_user" placeholder="Password" autocomplete="off" value="<?php echo md5($row['pass_user']) ?>" Disabled>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="file_pic" placeholder="Profil" value="<?php echo $row['file_pic'] ?>" Disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Level</label>
                    <select class="form-control select2" name="level" data-placeholder="Select a Level" style="width: 100%;" <?php echo $row['level'] ?> Disabled>
                        <option value="ADMIN<?php echo $row['level'] ?>">Admin</option>
                        <option value="DIREKTUR<?php echo $row['level'] ?>">Direktur</option>
                        <option value="KARYAWAN<?php echo $row['level'] ?>">Karyawan</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Delete</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


                          <?php } ?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

                </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Modal form Tambah User -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Input User Baru</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" method="POST" action="index.php?page=create_user" enctype="multipart/form-data">
                <div class="card-body">


                  <div class="form-group"> 
                   <label>Masukkan NIP</label> 
                   <select class="form-control select2" name="nip" id="pilihnik"  data-placeholder="Pilih nik" style="width: 100%;" required> 
						      <option value=""></option>
						      <?php
						       $querynik = mysqli_query($koneksi1, "SELECT * FROM jabatan2");
                   while($j = mysqli_fetch_array($querynik)){
							    echo "<option value='$j[no_nik]' data-jabatan='".$j['nama_jabatan']."' data-nama='".$j['nama_user']."'>".$j['no_nik']."</option>";
						      }
						      ?>
                   </select> 
                   </div> 

                 <div class="form-group"> 
                   <label>Jabatan</label> 
                   <select class="form-control select2" name="jabatan" id="pilihjab" data-placeholder="Pilih Jabatan" style="width: 100%;" > 
						      <option value=""></option>
                  <?php
						       $querynik = mysqli_query($koneksi1, "SELECT * FROM jabatan2");
                            while($j = mysqli_fetch_array($querynik)){
							          echo "<option value='".$j['nama_jabatan']."'>".$j['nama_jabatan']."</option>";
						      }
						      ?>
                   </select> 
                 </div>
                 <div class="form-group"> 
                   <label>Nama</label> 
                   <select class="form-control select2" name="nama_lengkap" id="pilihnama" data-placeholder="Pilih Nama" style="width: 100%;" > 
						      <option value=""></option>
                  <?php
						       $querynik = mysqli_query($koneksi1, "SELECT * FROM jabatan2 
							    	LEFT JOIN nik ON nik.id_nik=jabatan2.id_nik
							    	WHERE jabatan2.nama_jabatan like '%%' AND jabatan2.nama_user like '%%'");
                            while($j = mysqli_fetch_array($querynik)){
                            
							    echo "<option value='$j[nama_user]'>".$j['nama_user']."</option>";
						      }
						      ?>
                   </select> 
                 </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Username User</label>
                    <input type="text" class="form-control" name="username"  placeholder="Enter Username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password User</label>
                    <input type="password" class="form-control" name="pass_user" placeholder="Enter Password" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file_pic">
                        <label class="custom-file-label" for="exampleInputFile">Lampiran Pendukung</label>
                      </div>
                  </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Level</label>
                    <select class="form-control select2" name="level" data-placeholder="Select a Level" style="width: 100%;" >
                        <option value="ADMIN">Admin</option>
                        <option value="DIREKTUR">Direktur</option>
                        <option value="KARYAWAN">Karyawan</option>
                    </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->