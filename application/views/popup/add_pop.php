
<div class="modal fade" id="addnewpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add New POP</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			
			<div class="modal-body">
				<div class="col-md-12">
					<form class="form-horizontal form-label-left input_mask" id="addpopform">
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">POP Name</label>
									<input type="text" class="form-control" name="pop" id="exampleFormControlInput1" required="">
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Location</label>
									<input type="text" class="form-control" name="location" id="exampleFormControlInput1" required="">
								</div>
							</div>
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
							<div class="col-md-4 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">K-Electric Bill#</label>
									<input type="text" class="form-control" name="billno" id="exampleFormControlInput1" required="">
								</div>
							</div>
							<div class="col-md-4 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">LA#</label>
									<input type="text" class="form-control" name="la_no" id="exampleFormControlInput1" required="">
								</div>
							</div>
							<div class="col-md-4 col-xs-12">
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
							<div class="col-md-4 col-xs-12">
								<div class="form-group">
									<label for="Category">Category</label>
									<select class="form-control" id="Category" name="Category" required> 
									<option value="">Select city</option>
										<option value="main">Main POP</option>
										<option value="sub">Sub POP</option>
										<option value="rental">Rental POP</option>
									</select>
								</div>
							</div>
							<div class="col-md-2 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Sub Meter</label>
									<input type="hidden" name="submeter" value="no">
									<input type="checkbox" class="form-control" name="submeter" id="exampleFormControlInput1" value="yes">
								</div>
							</div>
							
							<div class="col-md-12"> 
								<button class="btn btn-secondary" style="float: right;" type="submit">Add</button>
							</div>
							
						</div>
						
					</form>
				</div>
				
			</div>
		
		</div>
	</div>
</div>
