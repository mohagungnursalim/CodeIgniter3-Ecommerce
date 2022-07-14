<div class="card card-solid">
	<div class="card-body pb-0">


	<div class="col-lg col-6">
	<!-- small box -->
	<div class="small-box bg-success">
		<div class="inner">
		<?php if ($this->session->userdata('email') == "") { ?>
					
					belum ada data

				<?php } else { ?>

				<h1 class="display-4">My Account</h1>



				<h5> <b>Nama: </b><?= $this->session->userdata('nama_pelanggan')  ?></h5>
				<h5> <b>Email: </b><?= $this->session->userdata('email')  ?></h5>
				<?php } ?>
		</div>
		<div class="icon">
			<i class="fas  fa-user"></i>
		</div>
		
	</div>
</div>





	
	</div>
</div>
<br><br><br>