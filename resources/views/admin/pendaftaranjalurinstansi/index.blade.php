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
                <th>Nama Direktur</th>
				<th>Alaman</th>
                <th>Status</th>
                <th>Option</th>
			</thead>
			<tbody>
                @foreach ($data as $data)
                    <tr>
                        <td>{{$data->nama_perusahaan}}</td>
                        <td>{{$data->tanggal_masuk}}</td>
                        <td>{{$data->tanggal_selesai}}</td>
                        <td>{{$data->nama_direktur}}</td>
                        <td>{{$data->alamat_kantor}}</td>
                        <td><label class="badge badge-success">{{ $data->status }}</label></td>
                        <td class="text-center">
                            {{-- <button type="button" class="btn btn-info mr-1 info"
                                data-name="" data-created="">
                                <i class="fas fa-eye"></i>
                            </button> --}}
                            @if ($data->status == "proses")
                                <a href="{{ route('admin.pendaftaranjalurlomba.edit',$data->id) }}" class="btn btn-primary mr-1"><i class="fas fa-edit"></i></a>
                            @endif
                            <form action="{{route('admin.pendaftaranjalurlomba.delete',$data->id )}}" method="post" style="display: inline-block;">
                                @csrf
                                <button type="button" class="btn btn-danger delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
			</tbody>
		</table>
	</x-card>

    <x-slot name="script">
		<script>
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
