	<style>
	#exordid,#text {
	width:100%;
    height: 30px;
    padding: 9px 10px;
    border: 1px solid #337ab7;
    border-radius: 4px;
    background: #fff;
    font-size: 14px;
    line-height: 20px;
    color: #333;
    -ms-box-sizing: border-box;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-appearance: none;
	margin-bottom:7px;
}
#text{
	height:60px;
	resize:none;
	
}
	
	</style>				
					
					<div class="box box-primary direct-chat direct-chat-primary" style="padding:0px;">
				            <!-- /.box-header -->
							<div id="load">
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
										 <p style="padding:0;text-align: right;font-size: 10px; font-style: italic;color:#fff;"><i class="fa fa-clock-o" style="color:#fff;"></i>{{$key->updated_at}}</p>
					                  </div>
					                  <!-- /.direct-chat-text -->
					                </div>
							@endif
						@endforeach
				                <!-- /.direct-chat-msg -->
				              </div>
				              <!--/.direct-chat-messages-->

				            </div>
				            </div>
							<!-- /.box-body -->
				            <div class="box-footer">
							<div id="message" style="padding:2px 0px 4px; color:red;"></div>
				              <form id="form" action="/shout" method="post">
				              {{csrf_field()}}
				                	<input id="exordid" type="text" name="username" placeholder="Type Your Name/ID" class="form-control">
				                	<br>
				                <div class="input-group" style="width:100%;">
				                  <textarea id="text" type="text" name="message" placeholder="Type Message" class="form-control" ></textarea>
				                      
				                </div>
								<span class="input-group-btn">
				                        <button type="submit" name="submit" id="submit" class="btn btn-primary btn-flat" style="width:100%;">Submit</button>
				                      </span>
				              </form>
				            </div>
				            <!-- /.box-footer-->
				     </div>