<form action="{{ url('/clients/' . $client->id) }} " method="post" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH') }}
            
        <label for="Names">{{'Names'}}</label>
        <input type="text" name="Names" id="Names" value="{{ $client->Names }}">
        <br/>
        
        <label for="LastName">{{'LastName'}}</label>
        <input type="text" name="LastName" id="LastName" value="{{ $client->LastName }}">
        <br/>
        
        <label for="Address">{{'Address'}}</label>
        <input type="text" name="Address" id="Address" value="{{ $client->Address }}">
        <br/>
        
        <label for="Cellphone">{{'Cellphone'}}</label>
        <input type="text" name="Cellphone" id="Cellphone" value="{{ $client->Cellphone }}">
        <br/>
        
        <label for="Email">{{'Email'}}</label>
        <input type="email" name="Email" id="Email" value="{{ $client->Email }}">
        <br/>
        
        <label for="Photo">{{'Photo'}}</label>
        <br/>
        <img src="{{ asset('storage').'/'.$client->Photo}}" alt="" width="200">
        <br/>
        <input type="file" name="Photo" id="Photo" value="">
        <br/>
        <input type="submit" value="Modify">

        <a href="{{ url('clients') }}">Return</a>
       
</form>
