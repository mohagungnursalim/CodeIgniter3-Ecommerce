<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Data Pelanggan</h3>

			
			<!-- /.card-tools -->
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table class="table table-bordered" id="example1">
				<thead class="text-center">
					<tr>
						<th>No</th>
						<th>Nama Pelanggan</th>
						<th>email</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($pelanggan as $key => $value) { ?>
						<tr>
							<td class="text-center"><?= $no++; ?></td>
							<td><?= $value->nama_pelanggan ?></td>
							<td class="text-center"><?= $value->email ?></td>			
							
						</tr>
						
					<?php } ?>
				</tbody>
			</table>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>
