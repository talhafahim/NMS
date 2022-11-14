<div class="modal fade" id="SWI_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Switch Spark</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form id="switch_insert_form">
				<div class="modal-body">
					<div class="col-md-12">
						
						
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Switch Name</label>
									<input type="text" class="form-control" name="switchname" id="exampleFormControlInput1" required="">
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">IP address</label>
									<input type="text" class="form-control" name="ip" id="exampleFormControlInput1" placeholder="192.168.100.1" pattern="[0-9.]*" required="">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Dealer</label>
									<select class="form-control" name="dealer" id="exampleFormControlSelect1" required="">
										<option value="">select dealer</option>
										<?php foreach($dealer->result() as $value){?>
											<option value="<?php echo $value->username;?>"><?php echo $value->username.' ('.$value->panel.')';?></option>
										<?php } ?>		
									</select>
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Area</label>
									<input type="text" class="form-control" name="area" id="exampleFormControlInput1">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Version</label>
									<input type="text" class="form-control" name="version" id="exampleFormControlInput1" required="">
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Model</label>
									<input type="text" class="form-control" name="model" id="exampleFormControlInput1">
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
											<option value="<?php echo $value->pop_id;?>"><?php echo $value->pop_name.' ('.$value->city_name.')';?></option>
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
											<option value="<?php echo $value->pop_id;?>"><?php echo $value->pop_name.' ('.$value->city_name.')';?></option>
										<?php } ?>		
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleFormControlInput1">Connected To</label>
									<input type="text" class="form-control" name="connect_to" id="exampleFormControlInput1" required="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleFormControlInput1">VLAN</label>
									<input type="number" class="form-control" name="vlan" id="exampleFormControlInput1" required="">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-xs-12">
						<div class="form-group">
							<label for="select-city">Select City</label>
							<select class="form-control" id="city_name" name="city_name">
							<option>Select</option>
							<?php foreach ($cities as $k => $v): ?>
								<option value="<?php echo $v['id'] ?>"><?php echo $v['city_name'] ?></option>
							<?php endforeach ?>
								
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Stack Switch</label>
									<input type="hidden" name="stack" value="no">
									<input type="checkbox" class="form-control" name="stack" id="exampleFormControlInput1" value="yes">
								</div>
							</div>
							<div class="col-md-4 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Ether-Channel</label>
									<input type="hidden" name="ether" value="no">
									<input type="checkbox" class="form-control" name="ether" id="exampleFormControlInput1" value="yes">
								</div>
							</div>
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