<x-app-layout>
	<x-slot name="title">New User</x-slot>

	{{-- show alert if there is errors --}}
	<x-alert-error/>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif
	<x-card>
		<form action="{{route('admin.pendaftaranjalurlomba.storekelompok',$queue->id)}}" method="post" enctype="multipart/form-data">
			@csrf
            <div class="row">
                @for ($i=1; $i<4; $i++)
                <div class="col-md-4">
					<x-input text="Nama Mahasiswa {{$i}}" name="nama_mahasiswa{{$i}}" type="text" />
				</div>
                @endfor
			</div>
            <div class="row">
                @for ($i=1; $i<4; $i++)
                <div class="col-md-4">
					<x-input text="NIM Mahasiswa" name="nim_mahasiswa{{$i}}" type="number" />
				</div>
                @endfor
			</div>
            <div class="row">
                @for ($i=1; $i<4; $i++)
                <div class="col-md-4">
					<x-input text="e-mail" name="email_mahasiswa{{$i}}" type="email" />
				</div>
                @endfor
			</div>
            <div class="row">
                @for ($i=1; $i<4; $i++)
                <div class="col-md-4">
					<x-input text="no HP" name="no_hp_mahasiswa{{$i}}" type="number" />
				</div>
                @endfor
			</div>
			<x-button type="primary" text="Submit" for="submit" />
		</form>
	</x-card>
</x-app-layout>
