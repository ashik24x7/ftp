<div class="box-body">
				              <!-- Conversations are loaded here -->
				              <div class="direct-chat-messages">
				                <!-- Message. Default to the left -->
				        @foreach($shout as $key)
				                <div class="direct-chat-msg">
				                  <div class="direct-chat-info clearfix">
				                    <span class="direct-chat-name pull-left">{{$key->username}}</span>
				                    <span class="direct-chat-timestamp pull-right">IP: {{$key->user_ip}}</span>
				                  </div>
				                  <!-- /.direct-chat-info -->
				                  <!--<img class="direct-chat-img" src="pic/user.png" alt="Message User Image"> /.direct-chat-img -->
				                  <div class="direct-chat-text" style="width:225px;margin-right:0px;">
				                  {{$key->message}}
				                  <br>
				                    <p style="padding:0;text-align: right;font-size: 10px;
    font-style: italic;"><i class="fa fa-clock-o"></i>{{$key->created_at}}</p>
									
				                  </div>
								  
				                  <!-- /.direct-chat-text -->
				                </div>
				                <!-- /.direct-chat-msg -->
							@if(trim($key->reply) != "")
					                <!-- Message to the right -->
					                <div class="direct-chat-msg right">
					                  <div class="direct-chat-info clearfix">
					                    <span class="direct-chat-name pull-right">Administrator</span>
					                    
					                  </div>
					                  <!-- /.direct-chat-info 
					                  <img class="direct-chat-img" src="pic/support-icon.png" alt="Message User Image"><!-- /.direct-chat-img -->
					                  <div class="direct-chat-text">
					                    {{$key->reply}}
										 <p style="padding:0;text-align: right;font-size: 10px; font-style: italic;color:#fff;"><i class="fa fa-clock-o" style="color:#fff;"></i>{{$key->created_at}}</p>
					                  </div>
					                  <!-- /.direct-chat-text -->
					                </div>
							@endif
						@endforeach
	<!-- /.direct-chat-msg -->
  </div>
  <!--/.direct-chat-messages-->

</div>
<!-- /.box-body -->