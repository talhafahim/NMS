<div class="modal fade" id="AVLANP2P_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add VLAN P2P</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form id="vlanP2P_insert_form">
				<div class="modal-body">

					<div class="col-md-12">
						<div class="row">
							
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1"> Corporate Name</label>
									<input type="text" class="form-control" name="name" id="exampleFormControlInput1" required="">
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1"> Sub Corporate</label>
									<input type="text" class="form-control" name="subcorp" id="exampleFormControlInput1" required="">
								</div>
							</div>

						</div>
					</div>


					<div class="col-md-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Location</label>
							<input type="text" class="form-control" name="location" id="exampleFormControlInput1">
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Email</label>
									<input type="email" class="form-control" name="email" id="exampleFormControlInput1" required="" placeholder="fake@gmail.com">
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">POC</label>
									<input type="text" class="form-control" name="poc" id="exampleFormControlInput1" required="" placeholder="03009999999">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">VLAN ID</label>
									<input type="number" min="2" max="4094" class="form-control" name="vlan_id" id="exampleFormControlInput1" required="">
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Package</label>
									<input type="text" class="form-control" name="pkg" id="exampleFormControlInput1" required="">
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Point 1</label>
									<input type="text" class="form-control" name="pripop" id="exampleFormControlInput1" required="">
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Point 2</label>
									<input type="text" class="form-control" name="secpop" id="exampleFormControlInput1" required="">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Longitude</label>
									<input type="text" class="form-control" name="longitude" id="exampleFormControlInput1" required="">
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Latitude</label>
									<input type="text" class="form-control" name="latitude" id="exampleFormControlInput1" required="">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 ">
						<div class="form-group">
							<label for="exampleFormControlInput1">Connected To</label>
							<input type="text" class="form-control" name="connectedto" id="exampleFormControlInput1" required="">
						</div>
					</div>
					<!-- <div class="col-md-12 ">
						<div class="form-group">
							<label for="exampleFormControlInput1">VLAN Range</label>
							<input type="number" class="form-control" name="range" id="exampleFormControlInput1" required="">
						</div>
					</div> -->




					
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="submit">Add</button>
					<!-- <a class="btn btn-primary" href="login.html">Logout</a> -->
				</div>
			</form>
		</div>
	</div>
</div>
