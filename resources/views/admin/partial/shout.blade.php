<script type="text/javascript">
	$(document).ready(function(){
		alert('jo');
		$("#reply").focusout(function(){
			var reply = $("#reply").val().trim();

			if(reply == ""){
			   $("#message").text('Your reply is empty');
			}else{
				$("#message").text('');
			}
		})
		$("#submit").click(function(e){
			alert('jo');
			e.preventDefault();
			
			var reply = $("#reply").val().trim();
			
			if(reply == ""){
				$("#message").text('Your reply is empty');
			}else{
				$("#message").text('');
			}

			if(reply != ""){
				var url = '{{ url("shout") }}';
				var value = $("#form").serialize();
				console.log(value);
				$.ajax({
					type:"POST",
					url:url,
					data:value,
					success:function(res){
						$("#message").html(res);
					}
				});
			}

			setTimeout(function(){
				$("#load").load(location.href + " #load");
			}, 500);
		})
	})


</script>


<div class="col-md-6 col-sm-6">
	<!-- BEGIN PORTLET-->
	@if(count($errors) > 0)
		<p class="error"> {{$errors->all()[0]}} </p>
	@elseif(session('message'))
		<p class="error"> {{ session('message') }} </p>
	@endif
	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption">
				<i class="icon-bubble font-red-sunglo"></i>
				<span class="caption-subject font-red-sunglo bold uppercase">Shout Box</span>
			</div>
			<div class="actions">
				<div class="portlet-input input-inline">
					<div class="input-icon right">
						<i class="icon-magnifier"></i>
						<input type="text" class="form-control input-circle" placeholder="search..."> </div>
				</div>
			</div>
		</div>
		<div class="portlet-body" id="chats">
			<div class="scroller" style="height: 525px;" data-always-visible="1" data-rail-visible1="1">
				<ul class="chats">
				@foreach($shouts as $shout)
					<li class="in">
						<img class="avatar" alt="" src="/backend/layouts/layout/img/user.png" />
						<div class="message">
							<span class="arrow"> </span>
							<a href="javascript:;" class="name">{{$shout->username}}</a>
							</span><span class="datetime pull-right"> [ {{$shout->user_ip}} ] &nbsp; &nbsp;{{$shout->created_at->diffForHumans()}}</span>
							<span class="body">{{$shout->message}}</span>
						</div>
					</li>
					@if(empty($shout->reply))
					<div id="message" style="color:red; text-align:center"></div>
					<form id="form" action="/admin/reply" method="post">
				    {{csrf_field()}}
					
						<div style="text-align:right">
							<a href="/admin/shout/{{$shout->id}}/delete/" onClick="return alert('Are you sure?')" class="btn red icn-only">
								<i class="fa fa-trash-o icon-white"></i>
							</a>
							<a href="#large{{$shout->id}}" data-toggle="modal"  class="btn blue icn-only">
								<i class="fa fa-reply icon-white"></i>
							</a>
						</div>
					</form>
					@include('admin.partial.shout-modal')
					
					@else
					<li class="out">
						<img class="avatar" alt="" src="/backend/layouts/layout/img/admin.png" />
						<div class="message">
							<span class="arrow"> </span>
							<a href="javascript:;" class="name">admin</a>
							<span class="datetime pull-left"> {{$shout->updated_at->diffForHumans()}}</span>
							<span class="body">{{$shout->reply}}</span>
						</div>
					</li>
					
					@endif
				@endforeach
					
				</ul>
			</div>
		</div>
	</div>
	<!-- END PORTLET-->
</div>