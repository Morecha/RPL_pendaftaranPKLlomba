<x-app-layout>
	<x-slot name="title">New User</x-slot>

	{{-- show alert if there is errors --}}
	<x-alert-error/>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif
	<x-card>
		<form action="" method="post" enctype="multipart/form-data">
			@csrf
            <div class="row">
				<div class="col-md-6">
					<x-input text="Nama Lomba" name="nama_lomba" type="text" />
				</div>
				<div class="col-md-6">
					<x-input text="Jenjang Pelaksanaan" name="jenjang_pelaksanaan" type="text" />
				</div>
			</div>
            <div class="row">
				<div class="col-md-6">
					<x-input text="Rank" name="rank" type="text" />
				</div>
				<div class="col-md-6">
					<x-input text="File" name="data" type="file" />
				</div>
			</div>
            <div class="row">
				<div class="col-md-6">
					<x-input text="Tanggal Pelaksanaan" name="tanggal_pelaksanaan" type="date" />
				</div>
			</div>

			<x-button type="primary" text="Submit" for="submit" />

		</form>
	</x-card>
</x-app-layout>
