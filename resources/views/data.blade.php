
@foreach($posters as $posted)

<div class="boxes"  >

<div class="lightblue">
  <a href="{{ action('ViewController@show', $posted->user->id) }}"> 
	<div class="dp" >

@if($posted->user->Profileimage == 0 or $posted->user->Profileimage == "")
<img src="{{ asset('/images/images.png') }}" width="100%" height="auto" />
@else
 <img src="{{ asset('profilepics/'.$posted->user->Profileimage) }}"  width="100%" height="auto"/>
   

@endif
		</div>
  </a>

	<a href="{{ action('ViewController@show', $posted->user->id) }}"><div class="name">{{ $posted->user->name}}</div></a>
  
	<div class="time">{{ $posted->created_at->diffForHumans() }}</div>
</div>

	<div class="line"></div>

	<div class="skill">
    @if(strlen($posted->Skill) > 200)
            {{substr($posted->Skill,0,200)}}

          <span class="read-more-show hide_content">...More <i class="fa fa-angle-down"></i></span>
            <span class="read-more-content"> {{substr($posted->Skill,200,strlen($posted->Skill))}} 
            <span class="read-more-hide hide_content">Less <i class="fa fa-angle-up"></i></span> </span>
            @else
    {{ $posted->Skill}}
    @endif
            
          </div>


@if($posted->Profilepic != null )
	<div class="pic"><img src="{{ asset('portfolios/'.$posted->Profilepic) }}" width="100%" height="auto" /></div>
@endif


<form >

  {{ csrf_field() }}



@if( ($num->where("postid", $posted->ID)->where("userid", Auth::user()->id ))->count() > 0)

<button id="likebutton" type="submit" class="like"   name="postid"  value= "{{ $posted->ID }}"  style="background-color:#32cd32;border-color:#32cd32" ></button>


@else


<button id="likebutton" type="submit" class="unlike"  name="postid" value="{{ $posted->ID }}" style="background-color:#40E0D0;border-color:#40E0D0"></button>

@endif


</form>

<a href="{{ route('likers', ['id'=>$posted->ID] ) }}">
<div id="number">
  
  <span id="show_like{{ $posted->ID }}" >{{ count($num->where("postid", $posted->ID)) }}</span> likes
 
</div>
</a>


</div>


@endforeach

 


<script type="text/javascript">


  $(document).ready(function() {

      $(".like").click(function(e){

        e.preventDefault();

        var postid=$(this).val();


var $this = $(this);
$this.toggleClass('like');
      if($this.hasClass('like')){
        $this.css("border-color","#32cd32"); 
        $this.css("background-color","#32cd32");
      } else {
        $this.css("border-color","#40E0D0");
        $this.css("background-color","#40E0D0");
        $this.addClass("unlike"); 
      }

          $.ajax({

              url: "{{route('like')}}",

              type:'post',

              data: {'_token': '{{ csrf_token() }}', postid : postid },

              cache: false,          
       

              success: function(data) {


                    console.log(postid);
                    showLike(postid);
                  

                  }

              });

          });






       $(".unlike").click(function(e){

        e.preventDefault();
        var postid=$(this).val();

  var $this = $(this);      
$this.toggleClass('unlike');
      if($this.hasClass('unlike')){
        $this.css("border-color","#40E0D0"); 
        $this.css("background-color","#40E0D0");
      } else {
        $this.css("border-color","#32cd32");
        $this.css("background-color","#32cd32");
        $this.addClass("like"); 
      }

          $.ajax({

              url: "{{route('like')}}",

              type:'post',

              data: {'_token': '{{ csrf_token() }}', postid : postid },

               cache: false,  

              success: function(data) {


                    console.log(postid);
                    showLike(postid);
                    

                  }

              });

          });

function showLike(postid){


    $.ajax({
      url: "{{ route('count') }}",

      type: 'post',

      async: true,

      cache: false,

      data:{'_token': '{{ csrf_token() }}', postid : postid },

      success: function(response){
        $('#show_like'+postid).html(response);
 
      }
    });
  }



      }); 


</script>



