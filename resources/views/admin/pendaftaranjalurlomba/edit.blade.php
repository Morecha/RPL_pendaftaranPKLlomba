<x-app-layout>
	<x-slot name="title">Edit User</x-slot>

	{{-- show alert if there is errors --}}
	<x-alert-error/>

	<x-card>
		<form action="{{ route('admin.pendaftaranjalurlomba.update',$lomba->id) }}" method="post" enctype="multipart/form-data">
			@csrf

			<div class="row">
				<div class="col-md-6">
					<x-input text="Nama Lomba" name="nama_lomba" type="text" value="{{$lomba->nama_lomba}}" />
				</div>
				<div class="col-md-6">
					<x-input text="Jenjang Pelaksanaan" name="jenjang_pelaksanaan" type="text" value="{{$lomba->jenjang_pelaksanaan}}" />
				</div>
			</div>


			<div class="row">
				<div class="col-md-6">
			        <x-input text="Rank" name="rank" type="text" value="{{$lomba->rank}}" />
				</div>
				<div class="col-md-6">
					<x-input text="File" name="data" type="file" value=""/>
				</div>
			</div>

            <div class="row">
				<div class="col-md-6">
			        <x-input text="Tangga Pelaksanaan" name="tanggal_pelaksanaan" type="date" value="{{$lomba->tanggal_pelaksanaan}}"/>
				</div>
			</div>

			<x-button type="primary" text="Submit" for="submit" />

		</form>
	</x-card>
</x-app-layout>
