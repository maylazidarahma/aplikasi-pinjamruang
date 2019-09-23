<div class="product-status mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h3>Data Admin</h3>
                    <a style="margin-bottom: 10px;" href="#tambah" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                    <table>
                        <tr>
                            <th style="text-align:center;">No</th>
                            <th style="text-align:center;">Nama</th>
                            <th style="text-align:center;">username</th>
                            <th style="text-align:center;">Aksi</th>
                        </tr>
                        <?php
                        $no=1;
                            foreach ($dataadmin as $l) {
                                echo '<tr>                          
                            <td style="text-align:center;">'.$no.'</td>
                            <td style="text-align:center;">'.$l->nama.'</td>
                            <td style="text-align:center;">'.$l->username.'</td>
                            <td style="text-align:center;">
                            <a class="btn btn-primary btn-md" onclick="ubah_admin('.$l->id_user.')" data-toggle="modal" data-target="#edit"> Edit </a>
                            <a class="btn btn-danger btn-md" onclick="return confirm(\'Anda yakin ingin menghapus?\')" href="'.base_url().'index.php/Admin/delete/'.$l->id_user.'"> Hapus </a>
                            </td>
                            <tr>';
                            $no++;
                            }   
                        ?>
                    </table>

                    <div id="tambah" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" data-toggle="modal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-4">
                                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close" style="color: black;"></i></a>
                                        <h4 class="modal-title">Tambah Admin</h4>
                                    </div>
                                    <form action="<?php echo base_url('index.php/Admin/create'); ?>" method="post">
                                    <center><div class="modal-body">
                                    <div class="row">
                                    <input type="text" class="form-control" placeholder="Nama" name="nama">
                                    <input type="username" class="form-control" placeholder="Username" name="username" >
                                    <input type="password" class="form-control" placeholder="Password" name="password" >
                                    <input type="hidden" class="form-control" value="2" name="id_lvl">
                                    <div class="" style="text-align:right; margin-right:45px; margin-bottom:10px;">
                                        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">                                    </div>
                                    </div>
                                    </div><center>
                        </form>
                        </div>
                        </div>
                        </div>
                        <div id="edit" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" data-toggle="modal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <form action="<?php echo base_url('index.php/Admin/edit'); ?>" method="post" >
                                    <div class="modal-header header-color-modal bg-color-4">
                                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close" style="color: black;"></i></a>
                                        <h4 class="modal-title">Ubah Admin</h4>
                                        <div class="modal-close-area modal-close-df">     
                                        </div>
                                    </div>
                                    <center><div class="modal-body">
                                    <input type="hidden" name="ubah_id_user" id="ubah_id_user">
                                    <input type="text" class="form-control" id="ubah_nama" name="ubah_nama" >
                                    <input type="text" class="form-control" id="ubah_username" name="ubah_username" >
                                    <input type="text" class="form-control" id="ubah_password" name="ubah_password" >
                                    <input type="hidden" class="form-control" value="2" name="id_lvl">
                                    <br><div class="" style="text-align:right; margin-right:45px; margin-bottom:10px;">
                                        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">

                                    </div>
                                    </div></center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php if($this->session->flashdata('hasil')!=null): ?>
			        <div class= "alert alert-success"><?= $this->session->flashdata('hasil');?></div>
			        <?php endif?>
                </div>
            </div>
        </div>
    </div>
</div>
     
<script type="text/javascript">
        function ubah_admin(id_user) {
      $.getJSON("http://localhost/rest-api/index.php/detilUser/"+id_user, function(data){
			$("#ubah_id_user").val(data.id_user);
            $("#ubah_nama").val(data.nama);
            $("#ubah_username").val(data.username);
            $("#ubah_password").val(data.password);
          });
        }
        </script>