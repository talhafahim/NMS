
<div class="modal fade" id="addnewModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form class="form-horizontal form-label-left input_mask" id="adduserform">
				<div class="modal-body">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Firstname</label>
									<input type="text" class="form-control" name="f_name" id="exampleFormControlInput1" required="">
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Lastname</label>
									<input type="text" class="form-control" name="l_name" id="exampleFormControlInput1" required="">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Email</label>
									<input type="email" class="form-control" name="email" id="exampleFormControlInput1" required="">
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">CNIC</label>
									<input type="text" class="form-control" name="nic" id="exampleFormControlInput1" required="">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Username</label>
									<input type="text" class="form-control" name="username" id="exampleFormControlInput1" required="">
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Password</label>
									<input type="password" class="form-control" name="password" id="exampleFormControlInput1" required="">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Mobile#</label>
									<input type="text" class="form-control" name="mobile" id="exampleFormControlInput1" required="">
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Address</label>
									<input type="text" class="form-control" name="address" id="exampleFormControlInput1" required="">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Status</label>
									<select class="form-control" required="" name="status">
										<option value="">select status</option>
										<option value="admin">Admin</option>
										<option value="NOC Engineer">NOC Engineer</option>
										<option value="support">Support</option>
									</select>
								</div>
							</div>
							<!-- <div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Address</label>
									<input type="text" class="form-control" name="address" id="exampleFormControlInput1" required="">
								</div>
							</div> -->
						</div>
					</div>

				</div>

		<div class="modal-footer">
			<button class="btn btn-secondary" type="submit">Add</button>
			<!-- <a class="btn btn-primary" href="login.html">Logout</a> -->
		</div>
	</form>
</div>
</div>
</div>