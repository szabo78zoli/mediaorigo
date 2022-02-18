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
					<label for="type">Név:</label>
					<input type="text" name="name" class="form-control" placeholder="John Doe" value="<?php if(isset($name)){echo $name; }else{echo set_value('name');} ?>">
					<span style="color: #ff0000">
					<?php echo form_error('name'); ?>
					</span>
				</div>
				<div class="form-group">
					<label for="license_plate">Születési év:</label>
					<input type="text" name="birth_year" class="form-control" placeholder="1978" value="<?php if(isset($birth_year)){echo $birth_year   ; }else{echo set_value('birth_year');} ?>">
					<span style="color: #ff0000">
					<?php echo form_error('birth_year'); ?>
					</span>
				</div>
				<button type="submit" class="btn btn-primary">Rögzítés</button>
			</form>
		</div>
	</div>
</div>

