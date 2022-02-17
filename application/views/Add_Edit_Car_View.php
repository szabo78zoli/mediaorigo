<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<h1><?php echo $page_title ?></h1>
		</div>
			<?php if(isset($success)){ ?>
			<div class="col-12 text-center" style="color: #009900">
				Sikeres adatrögzítés!
			</div>
			<?php }?>

			<?php if(isset($error)) {?>
			<div class="col-12 text-center" style="color: #ff0000">
				Hiba történt az adatrögzítés során
			</div>
			<?php }?>
		</div>
		<div class="col-12 text-center">
			<form action="" method="post">
				<div class="form-group">
					<label for="type">Típus:</label>
					<input type="text" name="type" class="form-control" placeholder="Lada" value="<?php if(isset($type)){echo $type; }else{echo set_value('type');} ?>">
					<span style="color: #ff0000">
					<?php echo form_error('type'); ?>
					</span>
				</div>
				<div class="form-group">
					<label for="license_plate">Rendszám:</label>
					<input type="text" name="license_plate" class="form-control" placeholder="AAA-123" value="<?php if(isset($license_plate)){echo $license_plate; }else{echo set_value('license_plate');} ?>">
					<span style="color: #ff0000">
					<?php echo form_error('license_plate'); ?>
					</span>
				</div>
				<div class="form-group">
					<label for="registrarion_year">Forgalomba helyezés éve:</label>
					<input type="number" name="registrarion_year" class="form-control" placeholder="2022" value="<?php if(isset($registrarion_year)){echo $registrarion_year; }else{echo set_value('registrarion_year');} ?>">
					<span style="color: #ff0000">
					<?php echo form_error('registrarion_year'); ?>
					</span>
				</div>
				<button type="submit" class="btn btn-primary">Rögzítés</button>
			</form>
		</div>
	</div>
</div>

