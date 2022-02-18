<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<h1><?php echo $page_title ?></h1>
		</div>
			<?php if(isset($success)){ ?>
			<div class="col-12 text-center" style="color: #009900">
                <?php echo $success; ?>
			</div>
			<?php }?>

			<?php if(isset($error)) {?>
			<div class="col-12 text-center" style="color: #ff0000">
                <?php echo $error; ?>
			</div>
			<?php }?>
		</div>
		<div class="col-12 text-center">
			<form action="" method="post">
				<div class="form-group">
                    <label for="type">Autó:</label>
                    <select name="cars" id="cars" class="form-control" >
                        <option value="0">Kérem, válasszon!</option>
                        <?php foreach($cars as $key => $row){?>
                        <option value="<?php echo $key; ?>" <?php if(isset($selectedCar) && $selectedCar == $key){echo 'selected';} echo  set_select('cars', $key); ?> ><?php echo $row; ?></option>
                        <?php } ?>
                    </select>
                    <span style="color: #ff0000">
					<?php echo form_error('cars'); ?>
					</span>
                </div>
                <div class="form-group">
                    <label for="type">Sofőr:</label>
                    <select name="drivers" id="drivers" class="form-control" >
                        <option value="0">Kérem, válasszon!</option>
                        <?php foreach($drivers as $key => $row){?>
                            <option value="<?php echo $key; ?>" <?php if(isset($selectedDriver) && $selectedDriver == $key){echo 'selected';} echo  set_select('drivers', $key); ?> <?php echo  set_select('drivers', $key); ?> ><?php echo $row; ?></option>
                        <?php } ?>
                    </select>
                    <span style="color: #ff0000">
					<?php echo form_error('drivers'); ?>
					</span>
				</div>
				<div class="form-group">
					<label for="registrarion_year">Munkanap:</label>
					<input type="text" name="date" class="form-control" placeholder="2022" value="<?php if(isset($date)){echo $date; }else{echo set_value('date');} ?>">
					<span style="color: #ff0000">
					<?php echo form_error('date'); ?>
					</span>
				</div>
				<button type="submit" class="btn btn-primary">Rögzítés</button>
			</form>
		</div>
	</div>
</div>

