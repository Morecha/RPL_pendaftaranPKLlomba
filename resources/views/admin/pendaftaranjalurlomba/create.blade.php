<x-app-layout>
	<x-slot name="title">New User</x-slot>

	{{-- show alert if there is errors --}}
	<x-alert-error/>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif
	<x-card>
		<form action="{{route('admin.pendaftaranjalurlomba.store')}}" method="post" enctype="multipart/form-data">
			@csrf
            <div class="row">
				<div class="col-md-6">
					<x-input text="Nama Lomba" name="nama_lomba" type="text" />
				</div>
			</div>
            <div class="row">
                <div class="col-md-6">
					<x-input text="Pembimbing" name="pembimbing" type="text" />
				</div>
            </div>
            <div class="row">
                <div class="col-md-4">
					<x-input text="Jenjang Pelaksanaan" name="jenjang_pelaksanaan" type="text" />
				</div>
				<div class="col-md-4">
					<x-input text="Kategori Lomba" name="kategori_lomba" type="text" />
				</div>
				<div class="col-md-4">
					<x-input text="Penyelenggara" name="penyelenggara" type="text" />
				</div>
			</div>
            <div class="row">
				<div class="col-md-5">
					<x-input text="URL lomba" name="URL_lomba" type="text" />
				</div>
				<div class="col-md-4">
					<x-input text="Tempat pelaksanaan" name="tempat_lomba" type="text" />
				</div>
			</div>
            <div class="row">
				<div class="col-md-5">
					<x-input text="Produk Lomba" name="produk_lomba" type="text" />
				</div>
                <div class="col-md-4">
					<x-input text="Rank" name="rank" type="text" />
				</div>
			</div>
            <div class="row">
				<div class="col-md-3">
					<x-input text="Sumber Dana" name="sumber_dana" type="text" />
				</div>
			</div>
            <div class="row">
				<div class="col-md-3">
					<x-input text="Tanggal Pelaksanaan" name="awal_pelaksanaan" type="date" />
				</div>
				<div class="col-md-3">
					<x-input text="Tanggal berakhir" name="akhir_pelaksanaan" type="date" />
				</div>
			</div>
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
