<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginRegisterationModel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="LoginModalLabel">Login into your account</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col">
							<form id="LoginForm" method="post" action="<?= __DIR__ ?>/functions/login.php">
								<div class="form-group">
									<label for="Email">Your Email Address</label>
									<input required class="form-control" type="email" name="Email" id="loginEmail">
								</div>

								<div class="form-group">
									<label for="Password">Your Password</label>
									<input required class="form-control" type="password" name="Password" id="loginPassword">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> &nbsp;&nbsp;
				<input type="submit" form="LoginForm" name="LoginSubmit" id="LoginSubmitBtn" value="Login" class="btn btn-primary">
			</div>
		</div>
	</div>
</div>