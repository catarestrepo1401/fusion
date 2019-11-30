

@if(Session::has('Message')){{
    Session::get('Message')
}}
@endif

<a href="{{ url('clients/create') }}">Add Client</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Names</th>
            <th>LastName</th>
            <th>Address</th>
            <th>Cellphone</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($clients as $client)
        <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    
                <img src="{{ asset('storage').'/'.$client->Photo}}" alt="" width="200">

                </td>
                <td>{{ $client->Names}}</td>
                <td>{{ $client->LastName}}</td>
                <td>{{ $client->Address}}</td>
                <td>{{ $client->Cellphone}}</td>
                <td>{{ $client->Email}}</td>
                <td>

                    <a href="{{ url('/clients/'.$client->id.'/edit') }}">
                    Edit
                    </a>

                    <form method="post" action="{{ url('/clients/'.$client->id) }}" >
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" onclick="return confirm('¿Delete?');">Delete</button>
                    
                </form>

                </td>  
            </tr>  
        @endforeach 
    </tbody>
</table>