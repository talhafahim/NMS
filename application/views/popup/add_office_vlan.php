<div class="modal fade" id="OVLAN_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add VLAN</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form id="vlan_insert_form">
				<div class="modal-body">

					
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">IP address</label>
									<input type="text" class="form-control" name="ip" id="exampleFormControlInput1" placeholder="192.168.100.1" pattern="[0-9.]*" required="">
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Subnet</label>
									<input type="number" class="form-control" name="subnet" id="exampleFormControlInput1" required="">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">VLAN Name</label>
									<input type="text" class="form-control" name="vlan_name" id="exampleFormControlInput1" required="">
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">VLAN ID</label>
									<input type="number" min="2" max="4094" class="form-control" name="vlan_id" id="exampleFormControlInput1" required="">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 ">
						<div class="form-group">
							<label for="exampleFormControlInput1">Assign To</label>
							<input type="text" class="form-control" name="assignto" id="exampleFormControlInput1" required="">
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