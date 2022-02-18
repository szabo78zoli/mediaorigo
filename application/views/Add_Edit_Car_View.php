<script>
    $(document).ready(function() {
        if($('#category').val() == 1){
            $('.passenger-form').show();
            $('.weight-form').hide();
            $('#weight').val(null);
        }
        if($('#category').val() == 2 || $('#category').val() == 3){
            $('.passenger-form').hide();
            $('#passenger').val(null);
            $('.weight-form').show();
        }

        $('#category').change(function (){
            if($(this).val() == 1){
                $('.passenger-form').show();
                $('.weight-form').hide();
                $('#weight').val(null);
            }
            if($(this).val() == 2 || $(this).val() == 3){
                $('.passenger-form').hide();
                $('#passenger').val(null);
                $('.weight-form').show();
            }
        });
    });
</script>
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
                <div class="form-group">
                    <label for="type">Kategória:</label>
                    <select name="category" id="category" class="form-control" >
                        <option value="0">Kérem, válasszon!</option>
                        <?php foreach($category as $key => $row){?>
                            <option value="<?php echo $key; ?>" <?php if(isset($selectedCategory) && $selectedCategory == $key){echo 'selected';} echo  set_select('category', $key); ?> ><?php echo $row; ?></option>
                        <?php } ?>
                    </select>
                    <span style="color: #ff0000">
					<?php echo form_error('category'); ?>
					</span>
                </div>
                <div class="form-group passenger-form" style="display: none;">
                    <label for="passenger">Utasok száma:</label>
                    <input type="number" name="passenger" id="passenger" class="form-control" placeholder="1" value="<?php if(isset($passenger)){echo $passenger; }else{echo set_value('passenger');} ?>">
                    <span style="color: #ff0000">
					<?php echo form_error('passenger'); ?>
					</span>
                </div>
                <div class="form-group weight-form" style="display: none;">
                    <label for="weight">Teher maximális súlya:</label>
                    <input type="number" name="weight" id="weight"  class="form-control" placeholder="100" value="<?php if(isset($weight)){echo $weight; }else{echo set_value('weight');} ?>">
                    <span style="color: #ff0000">
					<?php echo form_error('weight'); ?>
					</span>
                </div>
				<button type="submit" class="btn btn-primary">Rögzítés</button>
			</form>
		</div>
	</div>
</div>

