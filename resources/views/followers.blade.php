@extends('layouts.master')

@section('content')

<div id="post-data">
	<p style="width:100%;"><h2 style= "text-align: center;" >Followers</h2></p>

	@foreach ($followeers as $followers)


<div class="boxes"  >

<div class="lightblue"> 
	<div class="dp" >
		@if($followers->user->Profileimage != 0 or $followers->user->Profileimage != "")
<img src="{{ asset('profilepics/'.$followers->user->Profileimage) }}"  width="100%" height="auto"/>

    <img src="{{ URL::to('/images/images.png') }}" width="100%" height="auto" />

@endif
		</div>

<div class="name">{{ $followers->user->name }}</div>

</div>
</div>

	@endforeach

</div>

@endsection