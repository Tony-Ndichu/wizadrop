@extends('layouts.master')
@section('content')
<div id="update">

<div id="changephoto">

<div id="passportchange">
	  @if(Auth::user()->Profileimage == 0) 
    <img src="{{asset('profilepics/images.png')}}" width="100%" height="auto" />
@else
  <img src="{{ asset('profilepics/'.Auth::user()->Profileimage) }}" width="100%" height="auto"/>
@endif

</div>

<a href="{{ route('imagesupload') }}" ><label id="camera">Change Photo</label></a>

</div>
  <form method="post"  id="updateform" action="{{action('PostController@update', Auth::user()->id )}}">
   
      {{csrf_field()}}
       <input name="_method" type="hidden" value="PATCH">


      <label class="change" id="changename">Name:</label>
      
        <input type="text" class="form-control" placeholder="title" name="name" value="{{ Auth::user()->name }}" />
      
   
    
      	<label class="change" id="changeskill">Skill:</label>
      
        <input name="skill" type="text" class="form-control" rows="8" cols="80" value="{{ Auth::user()->Skillset }}" />
    
  
   		<label class="change" id="changecontact">Public contact:</label>

   		<input type="text" class="form-control" name="contact"  value="{{ Auth::user()->Contact }}" />


   		<label class="change" id="changecontact">Bio:</label>
   		<textarea  class="form-control" rows="2" name="bio" >{{ Auth::user()->Bio }}</textarea>


     
      <button type="submit" class="btn btn-primary button" >Update</button>
    
  </form>
</div>
@endsection
