<div class="modal fade" id="AVLAN_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						
						<div class="form-group">
							<label for="exampleFormControlSelect1">Segment</label>
							<select class="form-control" name="segment" id="exampleFormControlSelect1" required="">
								<option value="">select segment</option>
								<?php foreach ($segment->result() as $key => $value) { ?>	
									<option value="<?= $value->segment;?>"><?= $value->segment;?></option>
									<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Dynamic IP address</label>
									<input type="text" class="form-control" name="ip" id="exampleFormControlInput1" placeholder="192.168.100.1" pattern="[0-9.]*" required="">
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Subnet</label>
									<input type="number" max="24" min="16" class="form-control" name="subnet" id="exampleFormControlInput1" required="">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleFormControlInput1">NAS|Server</label>
									<select class="form-control" name="nas" id="exampleFormControlSelect1" required="">
										<option value="">select NAS</option>
										<?php foreach($nas->result() as $value){?>
											<option value="<?php echo $value->id;?>"><?php echo $value->tag;?></option>
										<?php } ?>		
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleFormControlInput1">Reseller ID</label>
									<select class="form-control" name="reseller" id="exampleFormControlSelect1" required="">
										<option value="">select reseller</option>
										<option>Logonbroadband</option>
										<option>Sparkbroadband</option>
										<option>TES Sparkbroadband</option>
										<option>BlackOptic</option>
											
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleFormControlInput1">Dealer ID</label>
									<select class="form-control" name="dealer" id="exampleFormControlSelect1" required="">
										<option value="">select dealer</option>
										<?php foreach($dealer->result() as $value){?>
											<option value="<?php echo $value->username;?>"><?php echo $value->username;?></option>
										<?php } ?>		
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleFormControlInput1">Sub Dealer ID</label>
									<input type="text" class="form-control" name="subdealer" id="exampleFormControlInput1">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Area</label>
							<input type="text" class="form-control" name="area" id="exampleFormControlInput1">
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
							<label for="exampleFormControlInput1">VLAN Range</label>
							<input type="number" class="form-control" name="range" id="exampleFormControlInput1" required="">
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