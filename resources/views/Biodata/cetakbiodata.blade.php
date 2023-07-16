<table class="table table-bordered mb-0">
    <thead>
        <th>ID</th>
        <th>nama</th>
        <th>Foto</th>
        <th>age</th>
        <th>bhirtday</th>
        <th>no telpon</th>
        <th>jenis</th>
        
    </thead>
    <tbody>
        {{-- loping user --}}
        @foreach ($users as $user)
        @if ($user->user)
        <tr>
            <td>{{  $user->id }}</td>
            <td>{{  $user->user->nama }}</td>
            <td class="{{  $user->foto ? "" : 'text-danger' }}"><img src="images/{{ $user->foto }}" style="width:50px;height:50px;" ></td>
            <td class="{{  $user->age ? "" : 'text-danger' }}">{{  $user->age ? $user->age : 'kosong' }}</td>
            <td class="{{  $user->bhirtday ? "" : 'text-danger' }}">{{  $user->bhirtday ? $user->bhirtday : 'kosong' }}</td>
            <td class="{{  $user->phone ? "" : 'text-danger' }}">{{  $user->phone ? $user->phone : 'kosong' }}</td>
            <td class="{{  $user->gender ? "" : 'text-danger' }}">{{  $user->gender ? $user->gender : 'kosong' }}</td>
            
        </tr>
        @endif
        @endforeach
    </tbody>
</table>