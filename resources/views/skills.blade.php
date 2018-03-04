@extends ('layouts.master')

@section('content')



<div id="post-data">

	@include('data')


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

