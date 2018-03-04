@extends ('layouts.master')

@section('content')



<div id="ports2">

<div id="passport">
      @if(Auth::user()->Profileimage == 0) 
    <img  src="{{asset('profilepics/images.png')}}" width="100%" height="auto" />
@else
  <img  src="{{ asset('profilepics/'.Auth::user()->Profileimage) }}" width="100%" height="auto"/>
@endif
</div>

<div id="floatright">


@if(Auth::user()->name != "")
<label class="portlabel">Name:</label>
<div id="nameport">{{ Auth::user()->name }}</div>
@endif

@if(Auth::user()->Contact != "")
<label class="portlabel">Public Contact:</label>
<div id="contactport">{{ Auth::user()->Contact }}</div>
@endif

@if(Auth::user()->Experience != "")
<label class="portlabel">Added by:</label>
<div id="experience">{{ Auth::user()->Experience}} </div>
@endif

</div>

@if(Auth::user()->Skillset != "")
<label class="portlabel">Skill:</label>
<div id="contactport">{{ Auth::user()->Skillset }}</div>
@endif

@if(Auth::user()->Bio != "")
<label class="portlabel">Bio:</label>
<div id="skillset">{{ Auth::user()->Bio  }}</div>
@endif
</div>



<div id="post-data">

		@include('datatwo')

	</div>





	<p><img  class="ajax-load text-center" id="hide" src="{{asset('images/material-loader2.gif')}}"  style="width:100px; height:auto;"/></p>




<script type="text/javascript">

	var page = 1;

	$(window).scroll(function() {

	    if($(window).scrollTop() + $(window).height() >= $(document).height()) {

	        page++;

	        loadMoreData(page);

	    }

	});


	function loadMoreData(page){

	  $.ajax(

	        {

	            url: '?page=' + page,

	            type: "get",

	            beforeSend: function()

	            {

	                $('.ajax-load').show();

	            }

	        })

	        .done(function(data)

	        {

	            if(data.html == ""){

	                $('.ajax-load').html("No more records found");

	                return;

	            }

	            $('.ajax-load').hide();

	            $("#post-data").append(data.html);

	        })

	        .fail(function(data)

	        {
	        	 $('.ajax-load').hide();
	              alert('No More Posts...');


	        });

	}


</script>




@endsection