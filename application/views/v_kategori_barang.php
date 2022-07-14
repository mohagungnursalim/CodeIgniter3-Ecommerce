<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
	</ol>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider1.jpg">
		</div>
		<div class="carousel-item">
			<img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider2.jpg">
		</div>
		<div class="carousel-item">
			<img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider3.jpg">
		</div>
		<div class="carousel-item">
			<img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider4.jpg">
		</div>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>



<div class="card card-solid">
	<div class="card-body pb-0">
		<div class="row">
			<?php foreach ($barang as $key => $value) { ?>
				<div class="col-sm-4">
					<?php
					echo form_open('belanja/add');
					echo form_hidden('id', $value->id_barang);
					echo form_hidden('qty', 1);
					echo form_hidden('price', $value->harga);
					echo form_hidden('name', $value->nama_barang);
					echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
					?>
					<div class="card bg-light">
						<div class="card-header text-muted border-bottom-0">
							<h2 class="lead"><b><?= $value->nama_barang ?></b></h2>
							<p class="text-muted text-sm"><b>Kategori : </b><?= $value->nama_kategori ?></p>
						</div>
						<div class="card-body pt-0">
							<div class="row">
								<div class="col-12 text-center">
									<img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="300px" height="250px">
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="row">
								<div class="col-sm-6">
									<div class="text-left">
										<h4><span class="badge bg-primary">Rp. <?= number_format($value->harga, 0) ?></span></h4>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="text-right">
										<a href="<?= base_url('home/detail_barang/' . $value->id_barang)  ?>" class="btn btn-sm btn-success">
											<i class="fas fa-eye"></i>
										</a>
										<button type="submit" class="btn btn-sm btn-primary swalDefaultSuccess">
											<i class="fas fa-cart-plus"> Add</i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
			<?php } ?>

		</div>
	</div>
</div>

<script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">
	$(function() {
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 8000
		});

		$('.swalDefaultSuccess').click(function() {
			Toast.fire({
				icon: 'success',
				title: 'Barang Berhasil Ditambahkan Ke Keranjang !!!'
			})
		});
	});
</script>
