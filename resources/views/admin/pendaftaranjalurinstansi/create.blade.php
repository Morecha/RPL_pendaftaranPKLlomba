<x-app-layout>
	<x-slot name="title">New User</x-slot>

	{{-- show alert if there is errors --}}
	<x-alert-error/>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif
	<x-card>
		<form action="{{route('admin.pendaftaranjalurinstansi.store')}}" method="post">
			@csrf
            <div class="row">
				<div class="col-md-6" >
					<x-input text="Nama Perusahaan" name="nama_perusahaan" type="text"/>
				</div>
				<div class="col-md-6">
					<x-input text="Tanggal Pelaksanaan" name="tanggal_masuk" type="date" />
				</div>
			</div>
            <div class="row">
				<div class="col-md-6">
					<x-input text="Tanggal Keluar" name="tanggal_selesai" type="date" />
				</div>
				<div class="col-md-6">
					<x-input text="Nama Direktur" name="nama_direktur" type="text" />
				</div>
			</div>
            <div class="row">
				<div class="col-md-6">
					<x-input text="Alamat Kantor" name="alamat_kantor" type="text" />
				</div>
			</div>

			<x-button type="primary" text="Submit" for="submit" />

		</form>
	</x-card>
</x-app-layout>
