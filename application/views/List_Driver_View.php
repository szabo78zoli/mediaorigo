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
							<th>Id</th>
							<th>Név
                                <button class="order_btn" type="submit" name="OrderBtn" value="name">
                                    <?php if(isset($orderDriver) && $orderDriver == 'name'){?>
                                        <?php if($orderWayDriver == 'ASC'){?>
                                            <i class="fa fa-sort-asc"></i>
                                        <?php }?>
                                        <?php if($orderWayDriver == 'DESC'){?>
                                            <i class="fa fa-sort-desc"></i>
                                        <?php }?>
                                    <?php }else{?>
                                    <i class="fa fa-sort"></i>
                                    <?php }?>
                                </button>
                            </th>
							<th>Születési év
                                <button class="order_btn" type="submit" name="OrderBtn" value="birth_year">
                                    <?php if(isset($orderDriver) && $orderDriver == 'birth_year'){?>
                                        <?php if($orderWayDriver == 'ASC'){?>
                                            <i class="fa fa-sort-asc"></i>
                                        <?php }?>
                                        <?php if($orderWayDriver == 'DESC'){?>
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
					<?php if(isset($driverList) && !empty($driverList)){ ?>
					<?php foreach ($driverList as $car){ ?>
                    <tr>
                        <td><?php echo $car['id']; ?></td>
                        <td><?php echo $car['name']; ?></td>
                        <td><?php echo $car['birth_year']; ?></td>
                        <td><a href="/index.php/add_edit_driver/<?php echo $car['id']; ?>" >Szerkesztés</a></td>
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

