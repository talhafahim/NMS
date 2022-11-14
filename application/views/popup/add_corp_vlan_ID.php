<div class="modal fade" id="AVLANID_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add VLAN ID</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form id="vlanID_insert_form">
				<div class="modal-body">

					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">ID Number</label>
									<input type="text" class="form-control" name="id_num" id="exampleFormControlInput1" required="">
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1"> Corporate Name</label>
									<input type="text" class="form-control" name="name" id="exampleFormControlInput1" required="">
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
									<label for="exampleFormControlInput1">Primary POP</label>
									<select class="form-control" name="pripop" id="exampleFormControlSelect1" required="">
										<option value="">select pop</option>
										<?php foreach($pops->result() as $value){?>
											<option value="<?php echo $value->pop_id;?>"><?php echo $value->pop_name;?></option>
										<?php } ?>		
									</select>
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Secondary POP</label>
									<select class="form-control" name="secpop" id="exampleFormControlSelect1" required="">
										<option value="">select pop</option>
										<?php foreach($pops->result() as $value){?>
											<option value="<?php echo $value->pop_id;?>"><?php echo $value->pop_name;?></option>
										<?php } ?>		
									</select>
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
