<x-app-layout>
	<x-slot name="title">Pendaftaran Magang Jalur Lomba</x-slot>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif

	<x-card>
		<x-slot name="title">List Pengajuan {{ Auth::user()->name }}</x-slot>
		<x-slot name="option">
			<a href="{{ route('admin.pendaftaranjalurlomba.create') }}" class="btn btn-success">
				<i class="fas fa-plus"></i>
			</a>
		</x-slot>
		<table class="table table-bordered">
			<thead>
				<th>Nama Lomba</th>
				<th>Tanggal Pelaksanaan</th>
				<th>Jenjang</th>
                <th>Ranking</th>
				<th>Status</th>
                <th style="width: 5%">Data</th>
                <th style="width: 5%">Proposal</th>
                <th>Option</th>
			</thead>
			<tbody>
                @foreach ($queue as $queue)
                    <tr>
                        <td>{{$queue->nama_lomba}}</td>
                        <td>{{$queue->awal_pelaksanaan}}</td>
                        <td>{{$queue->jenjang_pelaksanaan}}</td>
                        <td>{{$queue->rank}}</td>
                        <td><label class="badge badge-success">{{ $queue->status }}</label></td>
                        <td>
                            <a href="{{ route('admin.pendaftaranjalurlomba.show',$queue->id) }}" target="_blank" class="btn btn-info mr-1 info">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.pendaftaranjalurlomba.proposal',$queue->id) }}" target="_blank" class="btn btn-info mr-1 info">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            @if ($queue->status == "proses" || $queue->status == "revisi")
                                <a href="{{ route('admin.pendaftaranjalurlomba.kelompok',$queue->id) }}" class="btn btn-primary mr-1"><i class="fas fa-users"></i></a>
                                <a href="{{ route('admin.pendaftaranjalurlomba.edit',$queue->id) }}" class="btn btn-primary mr-1"><i class="fas fa-edit"></i></a>
                            @endif
                            <form action="{{route('admin.pendaftaranjalurlomba.delete',$queue->id )}}" method="post" style="display: inline-block;">
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
