<script>
    $(document).ready(function() {

        if($('#cars').val() == 1){
            $('.passenger-form').show();
            $('.weight-form').hide();
            $('#weight').val(null);
        }
        if($('#cars').val() == 2 || $('#cars').val() == 3){
            $('.passenger-form').hide();
            $('#passenger').val(null);
            $('.weight-form').show();
        }

        $('#cars').change(function (){
            $.ajax({
                url: "/index.php/car_property_check/"+$(this).val(),
                cache: false,
                success: function(data){

                    if(data == 1){
                        $('.passenger-form').show();
                        $('.weight-form').hide();
                        $('#weight').val(null);
                    }
                    if(data == 2 || data == 3){
                        $('.passenger-form').hide();
                        $('#passenger').val(null);
                        $('.weight-form').show();
                    }
                }
            });
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
                <?php echo $success;  ?>
			</div>
			<?php }?>

			<?php if(isset($error)) {?>
			<div class="col-12 text-center" style="color: #ff0000">
                <?php echo $error;  ?>
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
					<label for="customer_name">Megrendelő neve:</label>
					<input type="text" name="customer_name" class="form-control" placeholder="John Doe" value="<?php if(isset($customer_name)){echo $customer_name; }else{echo set_value('customer_name');} ?>">
					<span style="color: #ff0000">
					<?php echo form_error('customer_name'); ?>
					</span>
				</div>
				<div class="form-group passenger-form" style="display: none;">
					<label for="passenger">Szállítandó személyek száma:</label>
					<input type="number" name="passenger" class="form-control" placeholder="5" value="<?php if(isset($passenger)){echo $passenger; }else{echo set_value('passenger');} ?>">
					<span style="color: #ff0000">
					<?php echo form_error('passenger'); ?>
					</span>
				</div>
				<div class="form-group weight-form" style="display: none;">
					<label for="weight">Szállítandó teher súlya:</label>
					<input type="number" name="weight" class="form-control" placeholder="1000" value="<?php if(isset($weight)){echo $weight; }else{echo set_value('weight');} ?>">
					<span style="color: #ff0000">
					<?php echo form_error('weight'); ?>
					</span>
				</div>
                <div class="form-group">
                    <label for="place_of_recruitment">Felvétel helye:</label>
                    <input type="text" name="place_of_recruitment" class="form-control" placeholder="4032 Debrecen, Rezeda u. 12." value="<?php if(isset($place_of_recruitment)){echo $place_of_recruitment; }else{echo set_value('place_of_recruitment');} ?>">
                    <span style="color: #ff0000">
					<?php echo form_error('place_of_recruitment'); ?>
					</span>
                </div>
                <div class="form-group">
                    <label for="delivery_date">Szállítás dátuma:</label>
                    <input type="text" name="delivery_date" id="delivery_date" class="form-control" placeholder="2022-02-25" value="<?php if(isset($delivery_date)){echo $delivery_date; }else{echo set_value('delivery_date');} ?>">
                    <span style="color: #ff0000">
					<?php echo form_error('delivery_date'); ?>
					</span>
                </div>
				<button type="submit" class="btn btn-primary">Rögzítés</button>
			</form>
		</div>
	</div>
</div>
