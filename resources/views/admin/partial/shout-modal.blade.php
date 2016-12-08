<div class="modal fade bs-modal-sm" id="large<?php //echo $chat->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title"><?php //echo ucwords($chat->exordid); ?></h4>
			</div>
			<div class="modal-body"> 
                <div class="portlet box yellow">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-gift"></i>Update shout</div>
						<div class="tools">
							<a href="javascript:;" class="remove"> </a>
						</div>
					</div>
					<div class="portlet-body form">
						<!-- BEGIN FORM-->
						   <form role="form" action="action/editshout.php" role="form" method="post" enctype="multipart/form-data">
                                <div class="form-body">
																		
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <input type="text" class="form-control" id="form_control_1" name="exordID" value="<?php //echo $chat->exordid; ?>" />
                                        <input type="text" name="id" value="<?php //echo $chat->id; ?>" style="display:none;" />
                                        <label for="form_control_1">User name</label>
                                        <span class="help-block">you can change username</span>
                                    </div>
                                
									<div class="form-group form-md-line-input form-md-floating-label">
                                        <textarea class="form-control" rows="3" name="text"><?php // echo $chat->text; ?></textarea>
                                        <label for="form_control_1">Details</label>
										<span class="help-block">Movie Request</span>
                                    </div>
									
									<div class="form-group form-md-line-input form-md-floating-label">
                                        <textarea class="form-control" rows="3" name="reply_text"><?php // echo $chat->reply_text; ?></textarea>
                                        <label for="form_control_1">Reply</label>
										<span class="help-block">Reply</span>
                                    </div>
                                </div>
                                <div class="form-actions noborder">
                                    <input type="submit" name="submit" class="btn btn-primary" value="submit">
                                </div>
                            </form>
						<!-- END FORM-->
					</div>
    			</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>