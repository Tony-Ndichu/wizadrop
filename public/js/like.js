

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

          
       

              success: function(data) {


                    console.log(postid);

                  }

              });

          });






       $(".unlike").click(function(e){

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

              type:'Post',

              data: {'_token': '{{ csrf_token() }}', postid : postid },

              

              success: function(data) {


                    console.log(postid);

                  }

              });

          });





      }); 

</script>
