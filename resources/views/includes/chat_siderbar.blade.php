
@foreach ($friendsList as $user)
    <p>This is user {{ $user }}</p>
@endforeach
<div class="chat-sidebar">
	<div class="sidebar-name">
		<!-- Pass username and display name to register popup -->
		<a
			href="javascript:register_popup('narayan-prusty', 'Narayan Prusty');">
			<img width="30" height="30"
			src="{{ asset("img/default_avatar.png") }}" />
			<span>Narayan Prusty</span>
		</a>
	</div>
	<div class="sidebar-name">
		<a href="javascript:register_popup('qnimate', 'QNimate');"> <img
			width="30" height="30"
			src="{{ asset("img/default_avatar.png") }}" />
			<span>QNimate</span>
		</a>
	</div>
	<div class="sidebar-name">
		<a href="javascript:register_popup('qscutter', 'QScutter');"> <img
			width="30" height="30"
			src="{{ asset("img/default_avatar.png") }}" />
			<span>QScutter</span>
		</a>
	</div>
	<div class="sidebar-name">
		<a href="javascript:register_popup('qidea', 'QIdea');"> <img
			width="30" height="30"
			src="{{ asset("img/default_avatar.png") }}" />
			<span>QIdea</span>
		</a>
	</div>
	<div class="sidebar-name">
		<a href="javascript:register_popup('qazy', 'QAzy');"> <img width="30"
			height="30"
			src="{{ asset("img/default_avatar.png") }}" />
			<span>QAzy</span>
		</a>
	</div>
	<div class="sidebar-name">
		<a href="javascript:register_popup('qblock', 'QBlock');"> <img
			width="30" height="30"
			src="{{ asset("img/default_avatar.png") }}" />
			<span>QBlock</span>
		</a>
	</div>
</div>
<div id = "chat-box-wrap">
</div>

<script id="chat-box-hidden-template" type="text/x-custom-template">
    @include('includes/chat_box')
</script>
