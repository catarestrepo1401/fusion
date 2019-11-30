
<label for="Names">{{'Names'}}</label>
<input type="text" name="Names" id="Names" value="">
<br/>

<label for="LastName">{{'LastName'}}</label>
<input type="text" name="LastName" id="LastName" value="">
<br/>

<label for="Address">{{'Address'}}</label>
<input type="text" name="Address" id="Address" value="">
<br/>

<label for="Cellphone">{{'Cellphone'}}</label>
<input type="text" name="Cellphone" id="Cellphone" value="">
<br/>

<label for="Email">{{'Email'}}</label>
<input type="email" name="Email" id="Email" value="">
<br/>

<label for="Photo">{{'Photo'}}</label>
<input type="file" name="Photo" id="Photo" value="">
<br/>

<input type="submit" value="Add">

<a href="{{ url('clients') }}">Return</a>