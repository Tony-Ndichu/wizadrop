

<p style="width:100%;"><h2 style= "text-align: center;" >Results</h2></p>


@foreach($posts as $post)



<div class="boxes"  >

<div class="lightblue"> 

	<a href="{{ action('ViewController@show', $post->id) }}">
	<div class="dp" >

@if($post->Profileimage == null)
		<img src="{{ URL::to('/images/images.png') }}" width="100%" height="auto" />
@else
	<img src="{{ asset('profilepics/'.$post->Profileimage) }}"  width="100%" height="auto"/>
@endif
		</div>
	</a>

	<a href="{{ action('ViewController@show', $post->id) }}"><div class="name">{{ $post->name}}</div></a>
</div>

	<div class="line"></div>

	<div class="skill">{{ $post->Skillset}}</div>


</div>


@endforeach



