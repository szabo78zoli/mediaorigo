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
                                <button class="order_btn" type="submit" name="OrderBtn" value="car_type">
                                    <?php if(isset($order) && $order == 'car_type'){?>
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
                            <th>Megrendelő
                                <button class="order_btn" type="submit" name="OrderBtn" value="customer_name">
                                    <?php if(isset($order) && $order == 'customer_name'){?>
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
                            <th>Szállítandó személyek száma
                                <button class="order_btn" type="submit" name="OrderBtn" value="passenger">
                                    <?php if(isset($order) && $order == 'passenger'){?>
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
                            <th>Szállítandó teher súlya
                                <button class="order_btn" type="submit" name="OrderBtn" value="weight">
                                    <?php if(isset($order) && $order == 'weight'){?>
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
                            <th>Felvétel helye
                                <button class="order_btn" type="submit" name="OrderBtn" value="place_of_recruitment">
                                    <?php if(isset($order) && $order == 'place_of_recruitment'){?>
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
							<th>Szállítás dátuma
                                <button class="order_btn" type="submit" name="OrderBtn" value="delivery_date">
                                    <?php if(isset($order) && $order == 'delivery_date'){?>
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
							<th>Szerkesztés</th>
							<th>Törlés</th>
						</tr>
                    </form>
					</thead>
					<tbody>
					<?php if(isset($deliveryList) && !empty($deliveryList)){ ?>
					<?php foreach ($deliveryList as $delivery){ ?>
                    <tr>
                        <td><?php echo $delivery['id']; ?></td>
                        <td><?php echo $delivery['car_type']; ?></td>
                        <td><?php echo $delivery['customer_name']; ?></td>
                        <td><?php echo $delivery['passenger']; ?></td>
                        <td><?php echo $delivery['weight']; ?></td>
                        <td><?php echo $delivery['place_of_recruitment']; ?></td>
                        <td><?php echo $delivery['delivery_date']; ?></td>
                        <td><a href="/index.php/add_edit_delivery/<?php echo $delivery['id']; ?>" >Szerkesztés</a></td>
                        <td><button type="submit" name="delete" value="<?php echo $delivery['id']; ?>" onclick="return window.confirm('Biztosan törli az elemet?');" >Törlés</button></td>
                    </tr>
					<?php }?>
					<?php }?>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</div>

