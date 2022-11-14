
<div class="modal fade" id="addnewseg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add New Segment</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form class="form-horizontal form-label-left input_mask" id="addsegform">
				<div class="modal-body">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Segment</label>
									<input type="text" class="form-control" name="segment" id="exampleFormControlInput1" required="">
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
<script type="text/javascript">
  $(document).ready(function() {
    $("#addsegform").submit(function() {
      $.ajax({
        type: "POST",
        url: '<?php echo base_url();?>vlan/add_segment',
        data:$("#addsegform").serialize(),
        success: function (data) {
        	if(data.includes("Success")){
        	snack('#59b35a',data,'check-square-o');
        	$('#addnewseg').modal('hide');
        	$('#addsegform').trigger('reset');
        }else{
        	snack('#d3514d',data,'times');
        }
        },
        error: function(jqXHR, text, error){
// Displaying if there are any errors
$('#output').html(error);
}
});
      return false;
    });
  });
</script>