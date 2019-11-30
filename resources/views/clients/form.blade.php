
<div class="form-group">
<label for="Names" class="control-label">{{'Names'}}</label>
<input type="text" class="form-control {{$errors->has('Names')?'is-invalid':'' }} " 
name="Names" 
id="Names" 
value="{{ isset($client->Names)?$client->Names:old('Names') }}"> 
{!! $errors->first('Names','<div class="invalid-feedback">:message</div>')  !!}
</div>

<div class="form-group">
<label for="LastName" class="control-label">{{'LastName'}}</label>
<input type="text" class="form-control {{$errors->has('LastName')?'is-invalid':'' }}" 
name="LastName" 
id="LastName"   
value="{{ isset($client->LastName)?$client->LastName:old('LastName') }}">
{!! $errors->first('LastName','<div class="invalid-feedback">:message</div>')  !!}
</div>

<div class="form-group">
<label for="Address" class="control-label">{{'Address'}}</label>
<input type="text" class="form-control {{$errors->has('Address')?'is-invalid':'' }}"
name="Address" 
id="Address" 
value="{{ isset($client->Address)?$client->Address:old('Address') }}">
{!! $errors->first('Address','<div class="invalid-feedback">:message</div>')  !!}
</div>

<div class="form-group">
<label for="Cellphone" class="control-label">{{'Cellphone'}}</label>
<input type="text" class="form-control {{$errors->has('Cellphone')?'is-invalid':'' }}"
name="Cellphone" 
id="Cellphone" 
value="{{ isset($client->Cellphone)?$client->Cellphone:old('Cellphone')}}">
{!! $errors->first('Cellphone','<div class="invalid-feedback">:message</div>')  !!}
</div>

<div class="form-group">
<label for="Email" class="control-label">{{'Email'}}</label>
<input type="email" class="form-control {{$errors->has('Email')?'is-invalid':'' }}"
name="Email" 
id="Email" 
value="{{ isset($client->Email)?$client->Email:old('Email')}}">
{!! $errors->first('Email','<div class="invalid-feedback">:message</div>')  !!}
</div>

<div class="form-group">
<label for="Photo" class="control-label">{{'Photo'}}</label>
@if(isset($client->Photo))
<br/>
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$client->Photo}}" alt="" width="150">
<br/>
@endif

<input type="file" class="form-control {{$errors->has('Photo')?'is-invalid':'' }}" name="Photo" id="Photo" value="">
{!! $errors->first('Photo','<div class="invalid-feedback">:message</div>')  !!}
</div>

<input type="submit" class="btn btn-success" value="{{ $Mode=='create' ? 'Add':'Modify' }}">
<a class="btn btn-primary" href="{{ url('clients') }}">Return</a>