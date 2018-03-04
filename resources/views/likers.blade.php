@extends('layouts.master')

@section('content')

<div id="post-data">

	<p style="width:100%;"><h2 style= "text-align: center;" >Likers</h2></p>

	@foreach ($likeers as $likers)


<div class="boxes"  >

<div class="lightblue"> 
	<div class="dp" >
		@if($likers->user->Profileimage != 0 or $likers->user->Profileimage != "")
<img src="{{ asset('profilepics/'.$likers->user->Profileimage) }}"  width="100%" height="auto"/>

    <img src="{{ URL::to('/images/images.png') }}" width="100%" height="auto" />

@endif
		</div>

<div class="name">{{ $likers->user->name }}</div>

</div>
</div>

	@endforeach

</div>

@endsection