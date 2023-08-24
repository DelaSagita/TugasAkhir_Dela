@foreach(['success','primary', 'warning', 'danger'] as $status)
@if (session($status))
<div class="container" >

	<div class="bs-toast toast toast-placement-ex m-2 fade bg-{{$status}} bottom-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">

	<div class="toast-header ">
		<i class="bx bx-bell me-2"></i>
		<div class="me-auto fw-semibold">Notifikasi</div>
		<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
	</div>
	<div class="toast-body">
		{{ session($status) }}
	</div>
</div>

</div>
@endif
@endforeach