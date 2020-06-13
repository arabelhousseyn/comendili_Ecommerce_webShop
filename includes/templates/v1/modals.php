


	<!-- log in -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center"><?php echo lang('titleLog'); ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form  method="post">
						<div class="form-group">
							<label class="col-form-label"><?php echo lang('user') .' ' .lang('or') . ' ' .lang('em') ; ?></label>
							<input type="text" class="form-control" placeholder="<?php echo lang('user') .' ' .lang('or') . ' ' .lang('em') ; ?>" name="user" id='user' required>
						</div>
						<div class="form-group">
							<label class="col-form-label"><?php echo lang('pass'); ?></label>
							<input type="password" class="form-control" placeholder="<?php echo lang('pass');  ?>" name="pass" id='pass' required>
						</div>
						<div class="right-w3l">
							<input type="submit" name='login' class="form-control" value="<?php echo lang('titleLog'); ?>">
						</div>
						<div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing">
								<label class="custom-control-label" for="customControlAutosizing"><?php echo lang('rem'); ?></label>
							</div>
							<a href="index.php?sk=forgot&&dd=1" id="forgot_pswd"><?php echo lang('forgot'); ?></a>
						</div>
						<p class="text-center dont-do mt-3"><?php echo lang('dn'); ?>
							<a href="#" data-toggle="modal" data-target="#exampleModal2">
								<?php echo lang('regn'); ?></a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- register -->
	<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><?php echo lang('reg'); ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form  method="post">
						<div class="form-group">
							<label class="col-form-label"><?php echo lang('name'); ?></label>
							<input type="text" class="form-control" placeholder="<?php echo lang('name'); ?>" name="addname" id='addname' required>
						</div>
						<div class="form-group">
							<label class="col-form-label"><?php echo lang('user'); ?></label>
							<input type="text" class="form-control" placeholder="<?php echo lang('user'); ?>" name="adduser" id='adduser' required>
						</div>
						<div class="form-group">
							<label class="col-form-label"><?php echo lang('em'); ?></label>
							<input type="email" class="form-control" placeholder="<?php echo lang('em'); ?>" name="addemail" id='addemail' required>
						</div>
						<div class="form-group">
							<label class="col-form-label"><?php echo lang('phone'); ?></label>
							<input type="number" class="form-control" placeholder="<?php echo lang('phone'); ?>" name="addphone" id='addphone' min ='1' required>
						</div>
						<div class="form-group">
							<label class="col-form-label"><?php echo lang('pass'); ?></label>
							<input type="password" class="form-control" placeholder="<?php echo lang('pass'); ?>" name="addpass" id="password1" required>
						</div>
						<div class="form-group">
							<label class="col-form-label"><?php echo lang('repass'); ?></label>
							<input type="password" class="form-control" placeholder="<?php echo lang('repass'); ?>" name="addpass1" id="password2" required>
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" name='register' value="<?php echo lang('reg'); ?>">
						</div>
						<div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
								<label class="custom-control-label" for="customControlAutosizing2"><?php echo lang('accept'); ?></label>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

