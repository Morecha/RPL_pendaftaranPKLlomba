<x-app-layout>
	<x-slot name="title">Pendaftaran Magang Jalur Instansi</x-slot>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif

	<x-card>
		<x-slot name="title">List Pengajuan {{ Auth::user()->name }}</x-slot>
		<x-slot name="option">
			<a href="{{route('admin.pendaftaranjalurinstansi.create')}}" class="btn btn-success">
				<i class="fas fa-plus"></i>
			</a>
		</x-slot>
		<table class="table table-bordered">
			<thead>
				<th>Nama Perusahaan</th>
				<th>Tanggal Pelaksanaan</th>
				<th>Tanggal Berakhir</th>
				<th style="width:35%">Alamat</th>
                <th>Status</th>
                <th>Info</th>
                <th>Option</th>
			</thead>
			<tbody>
                @foreach ($data as $data)
                    <tr>
                        <td>{{$data->nama_perusahaan}}</td>
                        <td>{{$data->tanggal_masuk}}</td>
                        <td>{{$data->tanggal_selesai}}</td>
                        <td>{{$data->alamat_kantor}}</td>
                        <td><label class="badge badge-success">{{ $data->status }}</label></td>
                        <td>
                            <button type="button" class="btn btn-info mr-1 info"
                                data-name="{{$data->nama_perusahaan}}"
                                data-medsos="{{$data->URL_medsos}}"
                                data-penerima="{{$data->penerima_surat}}"
                                data-jabatan="{{$data->jabatan}}"
                                data-objek="{{$data->objek}}"
                                data-url="{{$data->URL_pkl}}"
                                data-masuk="{{$data->tanggal_masuk}}"
                                data-selesai="{{$data->tanggal_selesai}}">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                        <td class="text-center">
                            @if ($data->status == "proses")
                                <a href="{{ route('admin.pendaftaranjalurinstansi.edit',$data->id) }}" class="btn btn-primary mr-1"><i class="fas fa-edit"></i></a>
                            @endif
                            <form action="{{route('admin.pendaftaranjalurinstansi.delete',$data->id )}}" method="post" style="display: inline-block;">
                                @csrf
                                <button type="button" class="btn btn-danger delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
			</tbody>
		</table>
	</x-card>

    <x-modal>
		<x-slot name="id">infoModal</x-slot>
		<x-slot name="title">Information</x-slot>

		<div class="row mb-2">
			<div class="col-6">
				<b>Name Perusahaan</b>
			</div>
			<div class="col-6" id="name-modal"></div>
		</div>
		<div class="row mb-2">
			<div class="col-6">
				<b>URL Media Sosial</b>
			</div>
			<div class="col-6" id="medsos-modal"></div>
		</div>
		<div class="row mb-2">
			<div class="col-6">
				<b>Penerima Surat</b>
			</div>
			<div class="col-6" id="penerima-modal"></div>
		</div>
		<div class="row mb-2">
			<div class="col-6">
				<b>Jabatan</b>
			</div>
			<div class="col-6" id="jabatan-modal"></div>
		</div>
        <div class="row mb-2">
			<div class="col-6">
				<b>Objek Magang</b>
			</div>
			<div class="col-6" id="objek-modal"></div>
		</div>
        <div class="row mb-2">
			<div class="col-6">
				<b>URL PKL</b>
			</div>
			<div class="col-6" id="url-modal"></div>
		</div>
        <div class="row mb-2">
			<div class="col-6">
				<b>Tanggal Masuk</b>
			</div>
			<div class="col-6" id="masuk-modal"></div>
		</div>
        <div class="row mb-2">
			<div class="col-6">
				<b>Tanggal Selesai</b>
			</div>
			<div class="col-6" id="selesai-modal"></div>
		</div>
	</x-modal>

    <x-slot name="script">
		<script>
            $('.info').click(function(e) {
				e.preventDefault()

				$('#name-modal').text($(this).data('name'))
				$('#medsos-modal').text($(this).data('medsos'))
				$('#penerima-modal').text($(this).data('penerima'))
				$('#jabatan-modal').text($(this).data('jabatan'))
                $('#objek-modal').text($(this).data('objek'))
                $('#url-modal').text($(this).data('url'))
                $('#masuk-modal').text($(this).data('masuk'))
                $('#selesai-modal').text($(this).data('selesai'))

				$('#infoModal').modal('show')
			})

			$('.delete').click(function(e){
				e.preventDefault()
				const ok = confirm('Ingin menghapus Queue?')
				if(ok) {
					$(this).parent().submit()
				}
			})
		</script>
	</x-slot>

</x-app-layout>
