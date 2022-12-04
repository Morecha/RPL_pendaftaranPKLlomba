<x-app-layout>
	<x-slot name="title">New User</x-slot>

	{{-- show alert if there is errors --}}
	<x-alert-error/>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif
	<x-card>
        <x-slot name="title">Tahap ke-2 {{$id}}</x-slot>
		<form action="{{route('admin.pendaftaranjalurlomba.store')}}" method="post" enctype="multipart/form-data">
			@csrf
            <div class="row">
                <div class="col-md-5">
					<x-input text="Proposal" name="proposal" type="file" />
				</div>
            </div>
            <div class="row">
				<div class="col-md-5">
					<x-input text="Serifikat" name="data" type="file" />
				</div>
			</div>
			<x-button type="primary" text="Submit" for="submit" />
		</form>
	</x-card>
</x-app-layout>
