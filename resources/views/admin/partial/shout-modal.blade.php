<div class="modal fade bs-modal-sm" id="large{{$shout->id}}" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top:100px;">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">{{$shout->username}}</h4>
			</div>
			<div class="modal-body">
						<div>
							<p>
							{{$shout->message}}
							</p>
						</div>
                
						<!-- BEGIN FORM-->
						   <form role="form" action="/admin/shout/reply" role="form" method="post" enctype="multipart/form-data">
						   {{csrf_field()}}
								<input type="hidden" name="id" value="{{$shout->id}}"/>
                                <div class="form-body">
									<div class="form-group form-md-line-input form-md-floating-label">
                                        <textarea class="form-control" rows="3" name="reply"><?php // echo $chat->reply_text; ?></textarea>
                                        <label for="form_control_1">Reply</label>
										<span class="help-block">Write Something</span>
                                    </div>
                                </div>
                                <div class="form-actions noborder">
                                    <input type="submit" name="submit" class="btn btn-primary pull-right" value="Reply">
                                </div>
                            </form>
			</div>
			<br>
			<div class="modal-footer">
				<button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>