@extends ('layouts.master')

@section('content')


@foreach($posts as $post)

	<div id="ports2">

<div id="passport">
      @if($post->user->Profileimage == 0) 
    <img  src="{{asset('profilepics/images.png')}}" width="100%" height="auto" />
@else
  <img  src="{{ asset('profilepics/'.$post->user->Profileimage) }}" width="100%" height="auto"/>
@endif
</div>

<div id="floatright">


@if($post->user->name != "")
<label class="portlabel">Name:</label>
<div id="nameport">{{ $post->user->name }}</div>
@endif

@if($post->user->Contact != "")
<label class="portlabel">Public Contact:</label>
<div id="contactport">{{ $post->user->Contact }}</div>
@endif

@if($post->user->Experience != "")
<label class="portlabel">Added by:</label>
<div id="experience">{{ $post->user->Experience}} </div>
@endif

<a href="{{ route('followers', ['id'=>$post->user->id ] ) }}">
<div id="number2">
  
  <span id="show_follow{{ $post->user->id }}" >{{ count($numfollow->where("personid", $post->user->id)) }}</span> follows
 
</div>
</a>

</div>

@if($post->user->Skillset != "")
<label class="portlabel">Skill:</label>
<div id="contactport">{{ $post->user->Skillset }}</div>
@endif

@if($post->user->Bio != "")
<label class="portlabel">Bio:</label>
<div id="skillset">{{ $post->user->Bio  }}</div>
@endif


<form >

  {{ csrf_field() }}


@if( ($numfollow->where("personid", $post->user->id)->where("userid", Auth::user()->id ))->count() > 0)

<button id="approvebutton" type="submit" class="follow"   name="postid"  value= "{{ $post->user->id }}"  style="background-color:#40e0d0;border-color:#40e0d0" >ADDED</button>

@else

<button id="approvebutton" type="submit" class="unfollow"  name="postid" value="{{ $post->user->id }}" style="background-color:#3ccfcf;border-color:#3ccfcf">ADD</button>


@endif

</form>




<a href="{{ route('message.show', ['id'=> $post->user->id ]) }}"><div class="chatbutt">Message</div></a>

</div>

@break

@endforeach


<script type="text/javascript">


  $(document).ready(function() {

      $(".follow").click(function(e){

        e.preventDefault();

        var postid=$(this).val();


var $this = $(this);
$this.toggleClass('follow');
      if($this.hasClass('unfollow')){
        $this.css("border-color","#40e0d0"); 
				$this.css("background-color","#40e0d0");
				$(this).text("ADDED");
      } else {
       $this.css("border-color","#3ccfcf");
				$this.css("background-color","#3ccfcf");
				$this.addClass("unfollow");
				$(this).text("ADD")
      }

          $.ajax({

              url: "{{route('follow')}}",

              type:'post',

              data: {'_token': '{{ csrf_token() }}', postid : postid },

              cache: false,          
       

              success: function(data) {


                    console.log(postid);
                    showfollow(postid);
                  

                  }

              });

          });






       $(".unfollow").click(function(e){

        e.preventDefault();
        var postid=$(this).val();

  var $this = $(this);      
$this.toggleClass('unfollow');
      if($this.hasClass('unfollow')){
        $this.css("border-color","#3ccfcf"); 
				$this.css("background-color","#3ccfcf");
				$(this).text("ADD");
      } else {
        $this.css("background-color","#40e0d0");
				$this.css("border-color","#40e0d0");
				$this.addClass("follow");
				$(this).text("ADDED");	 
      }

          $.ajax({

              url: "{{route('follow')}}",

              type:'post',

              data: {'_token': '{{ csrf_token() }}', postid : postid },

               cache: false,  

              success: function(data) {


                    console.log(postid);
                    showfollow(postid);
                    

                  }

              });

          });

function showfollow(postid){


    $.ajax({
      url: "{{ route('countfollow') }}",

      type: 'post',

      async: true,

      data:{'_token': '{{ csrf_token() }}', postid : postid },

      success: function(response){
        $('#show_follow'+postid).html(response);
 
      }
    });
  }



      }); 


</script>



<div id="post-data3">

	@include('dataview')


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