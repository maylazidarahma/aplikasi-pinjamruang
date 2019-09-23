<div class="single-product-tab-area mg-tb-15">
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-6">
                    <div class="review-tab-pro-inner">
                        <div id="myTabContent" class="tab-content custom-product-edit">
                        <h3>Tambah Peminjaman</h3>
                        <?php if($this->session->flashdata('hasil')!=null): ?>
                        <div class= "alert alert-success"><?= $this->session->flashdata('hasil');?></div>
                        <?php endif?>
                        <form action="<?php echo base_url() ?>index.php/Peminjaman/create" method="post">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="review-content-section">
                                    <div class="input-group mg-b-pro-edt">
                                        <input type="hidden" class="form-control" value="<?php echo $id_ruang?>" name="id_ruang" >
                                    </div>
                                    <div class="input-group mg-b-pro-edt">
                                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        <label for="" style="padding-left: 30px;">Waktu Pinjam</label>
                                        <input type="datetime-local" class="form-control" name="waktu_pinjam" >
                                    </div>
                                    <div class="input-group mg-b-pro-edt">
                                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                       <label for="" style="padding-left: 30px;">Waktu Kembali</label>
                                        <input type="datetime-local" class="form-control"name="waktu_kembali" placeholder="Waktu Kembali" >
                                    </div>
                                    <div class="input-group mg-b-pro-edt">
                                        <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                        <label for="" style="padding-left: 30px;">Keterangan Pinjam</label>
                                        <textarea type="text" class="form-control" name="ket_pinjam" placeholder="Keterangan" > </textarea>
                                    </div>
                                    <div class="input-group mg-b-pro-edt">
                                        <input type="hidden" class="form-control" name="id_user" value="<?php echo $this->session->userdata('id_user')?>" >
                                    </div>
                                    <div class="text-center mg-b-pro-edt custom-pro-edt-ds">
                                    <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light m-r-10" method="post">Konfirmasi
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>