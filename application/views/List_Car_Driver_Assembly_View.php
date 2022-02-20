<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<h1><?php echo $page_title ?></h1>
		</div>
		<div class="col-12 text-center">
			<form action="" method="post">
				<table class="table table-bordered table-striped">
					<thead>
                    <form action="" method="post">
						<tr>
							<th>Id
                                <button class="order_btn" type="submit" name="OrderBtn" value="id">
                                    <?php if(isset($order) && $order == 'id'){?>
                                        <?php if($orderWay == 'ASC'){?>
                                            <i class="fa fa-sort-asc"></i>
                                        <?php }?>
                                        <?php if($orderWay == 'DESC'){?>
                                            <i class="fa fa-sort-desc"></i>
                                        <?php }?>
                                    <?php }else{?>
                                        <i class="fa fa-sort"></i>
                                    <?php }?>
                                </button>
                            </th>
							<th>Autó
                                <button class="order_btn" type="submit" name="OrderBtn" value="carType">
                                    <?php if(isset($order) && $order == 'carType'){?>
                                        <?php if($orderWay == 'ASC'){?>
                                            <i class="fa fa-sort-asc"></i>
                                        <?php }?>
                                        <?php if($orderWay == 'DESC'){?>
                                            <i class="fa fa-sort-desc"></i>
                                        <?php }?>
                                    <?php }else{?>
                                        <i class="fa fa-sort"></i>
                                    <?php }?>
                                </button>
                            </th>
							<th>Sofőr
                                <button class="order_btn" type="submit" name="OrderBtn" value="driverName">
                                    <?php if(isset($order) && $order == 'driverName'){?>
                                        <?php if($orderWay == 'ASC'){?>
                                            <i class="fa fa-sort-asc"></i>
                                        <?php }?>
                                        <?php if($orderWay == 'DESC'){?>
                                            <i class="fa fa-sort-desc"></i>
                                        <?php }?>
                                    <?php }else{?>
                                    <i class="fa fa-sort"></i>
                                    <?php }?>
                                </button>
                            </th>
							<th>Dátum
                                <button class="order_btn" type="submit" name="OrderBtn" value="date">
                                    <?php if(isset($order) && $order == 'date'){?>
                                        <?php if($orderWay == 'ASC'){?>
                                            <i class="fa fa-sort-asc"></i>
                                        <?php }?>
                                        <?php if($orderWay == 'DESC'){?>
                                            <i class="fa fa-sort-desc"></i>
                                        <?php }?>
                                    <?php }else{?>
                                        <i class="fa fa-sort"></i>
                                    <?php }?>
                                </button>
                            </th>
							<th>Törlés</th>
						</tr>
                    </form>
					</thead>
					<tbody>
					<?php if(isset($carList) && !empty($carList)){ ?>
					<?php foreach ($carList as $car){ ?>
                    <tr>
                        <td><?php echo $car['id']; ?></td>
                        <td><?php echo $car['carType']; ?></td>
                        <td><?php echo $car['driverName']; ?></td>
                        <td><?php echo $car['date']; ?></td>
                        <td><a href="/index.php/add_edit_car_driver_assembly/<?php echo $car['id']; ?>" >Szerkesztés</a></td>
                        <td><button type="submit" name="delete" value="<?php echo $car['id']; ?>" onclick="return window.confirm('Biztosan törli az elemet?');" >Törlés</button></td>
                    </tr>
					<?php }?>
					<?php }?>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</div>

