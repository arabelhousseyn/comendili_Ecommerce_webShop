<?php

if($sk !== 'error' && $sk !== 'success' && $sk !== 'verification' && $sk !== 'settings' && $sk !== 'verification_number' && $sk !== 'forgot' && $sk !== 'checkout' && $sk !== 'payment' && $sk !== 'approve' && $sk !=='contact' && $sk !== 'about' && !$tog)
{
	?>
	<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3">
						
						
						
						<!-- electronics -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3"><?php echo lang('el'); ?></h3>
							<ul>
								<?php
								$stm = $con->prepare('SELECT * FROM categories');
								$stm->execute();
								$data = $stm->fetchAll();
								foreach ($data as $value) {

								?>
								<li>
									
									<a href="index.php?sk=products&dd=<?php echo $value['ID']; ?>"><span class="span"><?php echo $value['name']; ?></span></a>
								</li>
							<?php } ?>
							
							</ul>
						</div>
						<!-- //electronics -->
						<!-- delivery -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3"><?php echo lang('cash'); ?></h3>
							
						</div>
						<!-- //delivery -->
						<!-- arrivals -->
						
						<!-- //arrivals -->
						<!-- best seller -->
						<div class="f-grid py-2">
							<h3 class="agileits-sear-head mb-3"><?php echo lang('best'); ?></h3>
							<div class="box-scroll">
								<div class="scroll">
									<?php
									
									$stm = $con->prepare('SELECT * FROM  items WHERE rating = ? OR rating = ?  ');
									$stm->execute(array(5,4));
									$data = $stm->fetchAll();
									foreach ($data as $value) {
								
									
									?>
									<div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img src="<?php echo $photos . $value['image']; ?>" alt="" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
											<a href="<?php echo $photos . $value['image']; ?>"><?php echo $value['name'];?></a>
											<a href="" class="price-mar mt-2"><?php echo $value['price'];?></a>
										</div>
									</div>
								<?php } ?>
									
								</div>
							</div>
						</div>
						<!-- //best seller -->
					</div>
                    <!-- //product right -->
                    </div>
			</div>
		</div>
	</div>
	</div>
			</div>
			</div>
	<?php
}

?>