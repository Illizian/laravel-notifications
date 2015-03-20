<ul class="notifications-list">
@foreach($notifications as $notification)
	<li class="notifications-list--item">
		{{ $notification->message }}
	</li>
@endforeach
</ul>