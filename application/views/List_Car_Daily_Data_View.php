<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<h1><?php echo $page_title ?></h1>
		</div>
        <form action="" method="post" class="form-inline" style="width: 100%;">
            <div class="col-5 text-center">
                <div class="form-group">
                    <label for="cars_filter">Autó:</label>
                    <select name="cars_filter" id="cars_filter" class="form-control" >
                        <option value="0">Kérem, válasszon!</option>
                        <?php foreach($carsFilter as $key => $row){?>
                            <option value="<?php echo $key; ?>" <?php if(isset($selectedCar) && $selectedCar == $key){echo 'selected';} echo  set_select('carsFilter', $key); ?> ><?php echo $row; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-5 text-center">
                <div class="form-group">
                    <label for="date_filter">Dátum:</label>
                    <input type="text" name="date_filter" id="date_filter" class="form-control" placeholder="2022-02-22" value="<?php if(isset($dateFilter)){echo $dateFilter; }else{echo set_value('dateFilter');} ?>">
                </div>
            </div>
            <div class="col-2 text-center" style="margin: auto;">
                <div class="form-group" style="margin-bottom: 0">
                    <button type="submit" class="btn btn-primary">Keresés</button>
                </div>
            </div>
        </form>
		<div class="col-12 text-center">
			<form action="" method="post">
				<table class="table table-bordered table-striped">
					<thead>
                    <form action="" method="post">
						<tr>
							<th>Autó</th>
							<th>Sofőr</th>
							<th>Szállítás</th>
							<th>Szállítás dátum</th>
						</tr>
                    </form>
					</thead>
					<tbody>
					<?php if(isset($carDailyDataList) && !empty($carDailyDataList)){ ?>
					<?php foreach ($carDailyDataList as $data){ ?>
                    <tr>
                        <td>
                            Sofőr neve: <?php echo $data['drivers_name']; ?><br/>
                            Sofőr születési éve: <?php echo $data['drivers_birth_year']; ?><br/>
                            Sofőr jogosítványa: <?php echo $data['driving_license_name']; ?>
                        </td>
                        <td>
                            Autó típusa: <?php echo $data['car_type']; ?><br/>
                            Autó rendszáma: <?php echo $data['car_license_plate']; ?><br/>
                            Autó forgalomba elyezése: <?php echo $data['car_registrarion_year']; ?><br/>
                            Szállítható személyek: <?php echo $data['car_passenger']; ?><br/>
                            Szállítható súly: <?php echo $data['car_weight']; ?>
                        </td>
                        <td>
                            Szállítást megrendelő neve: <?php echo $data['customer_name']; ?><br/>
                            Szállítandó személyek száma: <?php echo $data['delivery_passenger']; ?> db<br/>
                            Szállítandó súly: <?php echo $data['delivery_passenger']; ?> kg<br/>
                            Felvétel helye: <?php echo $data['place_of_recruitment']; ?><br/>
                        </td>
                        <td>
                            Szállítás dátuma: <?php echo $data['delivery_date']; ?>
                        </td>
                    </tr>
					<?php }?>
					<?php }?>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</div>

