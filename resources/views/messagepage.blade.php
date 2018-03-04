 @extends ('layouts.mastermessagepage')

 @section ('content')



 <div id="post-data">

@foreach ($messagers as $senders)

<div class="boxes"  >

<div class="lightblue"> 
	<div class="dp" >
		@if($senders->usere->Profileimage != 0 or $senders->usere->Profileimage != "")
<img src="{{ asset('profilepics/'.$senders->usere->Profileimage) }}"  width="100%" height="auto"/>
@else
    <img src="{{ URL::to('/images/images.png') }}" width="100%" height="auto" />

@endif
		</div>

<a href="{{ route('message.show', ['id'=> $senders->usere->id ]) }}"><div class="name">{{ $senders->usere->name }}</div></a>


@if($senders->readstatus==0) 


<div class="newmess"> New message </div>

@endif

</div>
</div>

@endforeach

</div>

 @endsection

