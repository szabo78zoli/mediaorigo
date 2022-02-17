<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<h1><?php echo $page_title ?></h1>
		</div>
		<div class="col-12 text-center">
			<form action="" method="post">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Típus</th>
							<th>Rendszám</th>
							<th>Forgalomba helyezés éve</th>
							<th>Törlés</th>
						</tr>
					</thead>
					<tbody>
					<?php if(isset($carList) && !empty($carList)){ ?>
					<?php foreach ($carList as $car){ ?>
						<tr>
							<td><?php echo $car['id']; ?></td>
							<td><?php echo $car['type']; ?></td>
							<td><?php echo $car['license_plate']; ?></td>
							<td><?php echo $car['registrarion_year']; ?></td>
                            <td><a href="/index.php/add_edit_car/<?php echo $car['id']; ?>" >Szerkesztés</a></td>
							<td><button type="submit" name="delete" value="<?php echo $car['id']; ?>">Törlés</button></td>
						</tr>
					<?php }?>
					<?php }?>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</div>

