@extends ('layouts.master')

@section('content')
<div class="container scroll" >

<div id="post-data">

		<div id="ports">

<div id="passport">


      @if($posts->Profileimage == 0) 
    <img  src="{{asset('profilepics/images.png')}}" width="100%" height="auto" />
@else
  <img  src="{{ asset('profilepics/'.$posts->Profileimage) }}" width="100%" height="auto"/>
@endif
</div>

<div id="floatright">


@if($posts->name != "")
<label class="portlabel">Name:</label>
<div id="nameport">{{ $posts->name }}</div>
@endif

@if($posts->Contact != "")
<label class="portlabel">Public Contact:</label>
<div id="contactport">{{ $posts->Contact }}</div>
@endif

@if($posts->Experience != "")
<label class="portlabel">Added by:</label>
<div id="experience">{{ $posts->Experience}} </div>
@endif

</div>

@if($posts->Skillset != "")
<label class="portlabel">Skill:</label>
<div id="contactport">{{ $posts->Skillset }}</div>
@endif

@if($posts->Bio != "")
<label class="portlabel">Bio:</label>
<div id="skillset">{{ $posts->Bio  }}</div>
@endif
</div>

	</div>

</div>




@endsection