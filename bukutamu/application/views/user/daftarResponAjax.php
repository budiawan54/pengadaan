<table class="table table-responsive">
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Rating</th>
			<th>Isi Respon</th>
		</tr>
	</thead>

	<tbody>
			
		<?php
			foreach ($respon as $key => $value) {
				$i = $key + 1;
		?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $value['created_at'] ?></td>
				<td>
					<?php
						$img = '';

						switch ($value['rating']) {
							case 4:
									$img = 'image/happy.png';
								break;
							case 3:
									$img = 'image/happy.svg';
								break;
							case 2:
									$img = 'image/2000px-Emojione_1F605.svg.png';
								break;
							default:
									$img = 'image/sad.svg';
								break;
						}
					?>
					<img src="<?php echo base_url($img) ?>" style="width: 30px;" class="select_image">
				</td>
				<td><?php echo $value['isi_respon'] ?></td>
			</tr>
		<?php
			}

		?>

	</tbody>
</table>