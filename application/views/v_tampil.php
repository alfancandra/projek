<!DOCTYPE html>
<html>
<head>
	<title></title>

<!-- Page level plugin CSS-->
<link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">


<link href="<?php echo base_url('css/pro/bootstrap.min.css') ?>" rel="stylesheet">
  <!-- Bootstrap Datatables CSS -->
  <link href="<?php echo base_url('css/mdb.min.css') ?>" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="<?php echo base_url('css/style.css') ?>" rel="stylesheet">
</head>
<body>

	<div class="container">
		<h1>Data Barang</h1>
		<button class="btn blue-gradient" data-toggle="modal" data-target="#tambah">Tambah Data</button>
		<br />
		<br />
		<!-- Modal -->
						<form action="<?php echo base_url(). 'crud/tambah'; ?>" method="post">
                            <div class="modal fade" id="tambah" tabindex="-1" role="dialog">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Tambah Data</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body mx-3">
                                    <div class="md-form mb-5">
                                      
                                      <input type="text" id="orangeForm-name" name="nama" class="form-control validate">
                                      <label data-error="wrong" data-success="right" for="orangeForm-name">Nama Produk</label>
                                    </div>
                                    <div class="md-form mb-5">
                                      <input type="number" name="harga" id="orangeForm-harga" class="form-control validate" >
                                      <label data-error="wrong" data-success="right" for="orangeForm-harga">Harga</label>
                                    </div>
                                    <div class="md-form mb-4">
                                      <textarea type="text" id="form7" name="desk" class="md-textarea md-textarea-auto form-control" mdbInput></textarea>
                                      <label for="form7">Deskripsi</label>
                                    </div>
                                  </div>
                                  <div class="modal-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-default btn-rounded waves-effect">Tambah</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            </form>
        <!-- Modal -->

	<div class="table-responsive">
              <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Harga</th>
						<th>Deskripsi</th>
						<th>Aksi</th>
					</tr>
				</thead>
					
				<tbody>
					<?php
					$no = 1;
					foreach ($produk as $p) {
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $p->nama;?></td>
						<td><?php echo $p->harga;?></td>
						<td><?php echo $p->desk;?></td>
						<td align="center">
							<button data-toggle="modal" data-target="#edit<?php echo $p->id_produk; ?>" class='btn aqua-gradient'>Edit</button> | | 
							<button data-toggle="modal" data-target="#hapus<?php echo $p->id_produk; ?>" class='btn peach-gradient'>Hapus</button>
							
							<!-- EDIT MODAL -->
							<form action="<?php echo base_url(). 'crud/edit/'.$p->id_produk;; ?>" method="post">
                            <div class="modal fade" id="edit<?php echo $p->id_produk; ?>" tabindex="-1" role="dialog">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Edit Data</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body mx-3">
                                    <div class="md-form mb-5">
                                      <input type="hidden" name="id_produk" value="<?php echo $p->id_produk; ?>">
                                      <input type="text" id="orangeForm-name" name="nama" class="form-control validate" value="<?php echo $p->nama; ?>">
                                      <label data-error="wrong" data-success="right" for="orangeForm-name">Nama Produk</label>
                                    </div>
                                    <div class="md-form mb-5">
                                      <input type="number" id="orangeForm-name" name="harga" class="form-control validate" value="<?php echo $p->harga; ?>">
                                      <label data-error="wrong" data-success="right" for="orangeForm-name">Harga</label>
                                    </div>
                                    <div class="md-form mb-4">
                                      <input type="text" id="orangeForm-name" name="desk" class="form-control validate" value="<?php echo $p->desk; ?>">
                                      <label data-error="wrong" data-success="right" for="orangeForm-name">Deskripsi</label>
                                    </div>
                                  </div>
                                  <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn aqua-gradient" type="submit" href="crud/hapus/<?php echo $p->id_produk; ?>">Edit</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            </form>
                            <!-- EDIT MODAL -->

							<!-- HAPUS MODAL -->
							<div class="modal fade" id="hapus<?php echo $p->id_produk; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            				aria-hidden="true">
				            <div class="modal-dialog" role="document">
				              <div class="modal-content">
				                <div class="modal-header">
				                  <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
				                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                    <span aria-hidden="true">&times;</span>
				                  </button>
				                </div>
				                <div class="modal-body">
				                  Apa Anda yakin ingin menghapus ?
				                </div>
				                <div class="modal-footer">
				                  <a class="btn btn-success" data-dismiss="modal">Batal</a>
				                  <a class="btn btn-danger" href="crud/hapus/<?php echo $p->id_produk; ?>">Hapus</a>
				                </div>
				              </div>
				            </div>
				          </div>
						</td>
					</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
  <script src="<?php echo base_url('js/jquery-3.4.1.min.js') ?>"></script>
  <!-- Bootstrap tooltips -->
  <script src="<?php echo base_url('js/popper.min.js') ?>"></script>
  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
  <!-- MDB core JavaScript -->
  <script src="<?php echo base_url('js/mdb.min.js') ?>"></script>
<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.js') ?>"></script>
<!-- Demo scripts for this page-->
<script src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>
<script src="<?php echo base_url('js/demo/chart-area-demo.js') ?>"></script>
</body>
</html>