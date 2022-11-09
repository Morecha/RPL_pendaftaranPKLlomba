<x-app-layout>
	<x-slot name="title">Pendaftaran Magang Jalur Lomba</x-slot>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif

	<x-card>
		<x-slot name="title">Your List</x-slot>
		<x-slot name="option">
			<a href="{{ route('admin.member.create') }}" class="btn btn-success">
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
                <th>Data</th>
                <th>Option</th>
			</thead>
			<tbody>
				@forelse($users as $user)
				<tr>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td></td>
                    <td></td>
                    <td>
                        @if(!empty($user->getRoleNames()))
				        @foreach($user->getRoleNames() as $v)
				           <label class="badge badge-success">{{ $v }}</label>
				        @endforeach
				      @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-info mr-1 info"
						data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-roles="{{ $user->getRoleNames() }}" data-created="{{ $user->created_at->format('d-M-Y H:m:s') }}">
							<i class="fas fa-eye"></i>
						</button>
                    </td>
					<td class="text-center">
						<a href="{{ route('admin.member.edit', $user->id) }}" class="btn btn-primary mr-1"><i class="fas fa-edit"></i></a>
						<form action="{{ route('admin.member.delete', $user->id) }}" style="display: inline-block;" method="POST">
							@csrf
							<button type="button" class="btn btn-danger delete"><i class="fas fa-trash"></i></button>
						</form>
					</td>
				</tr>
				@empty
				<tr>
					<td colspan="3" class="text-center">No Member</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</x-card>

	<x-modal>
		<x-slot name="id">infoModal</x-slot>
		<x-slot name="title">Information</x-slot>

		<div class="row mb-2">
			<div class="col-6">
				<b>Name</b>
			</div>
			<div class="col-6" id="name-modal"></div>
		</div>
		<div class="row mb-2">
			<div class="col-6">
				<b>Email</b>
			</div>
			<div class="col-6" id="email-modal"></div>
		</div>
		<div class="row mb-2">
			<div class="col-6">
				<b>Roles</b>
			</div>
			<div class="col-6" id="roles-modal"></div>
		</div>
		<div class="row mb-2">
			<div class="col-6">
				<b>Created</b>
			</div>
			<div class="col-6" id="created-modal"></div>
		</div>
	</x-modal>

	<x-slot name="script">
		<script>
			$('.info').click(function(e) {
				e.preventDefault()

				$('#name-modal').text($(this).data('name'))
				$('#email-modal').text($(this).data('email'))
				$('#roles-modal').text($(this).data('roles'))
				$('#created-modal').text($(this).data('created'))

				$('#infoModal').modal('show')
			})

			$('.delete').click(function(e){
				e.preventDefault()
				const ok = confirm('Ingin menghapus user?')

				if(ok) {
					$(this).parent().submit()
				}
			})
		</script>
	</x-slot>
</x-app-layout>
