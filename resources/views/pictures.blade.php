@extends ('layouts.master')

@section ('content')

<div id="skilladd">
 <form  id="addform" action="{{ route('photosuploading') }}" method="post" enctype="multipart/form-data">

      {{ csrf_field() }}

      <label id="camera2"><i class="fa fa-camera fa-lg" aria-hidden="true"></i>

      <input  id="skillpic" type="file" id="uploadFile" name="uploadFile" onchange="preview_image2(event)" />

  </label>
  
  <div id="full">

      <img id="disp" />

      	<script type='text/javascript'>
function preview_image2(event)
{
var reader=new FileReader();
reader.onload=function()
{
	var output=document.getElementById('disp');
	output.src=reader.result;
	}
	reader.readAsDataURL(event.target.files[0]);
	}
	</script>

</div>

      
      <div id="captiontag"> Caption: </div> <textarea class="form-control" rows="3" name="caption"/></textarea>

      <input  type="submit"  id="uploadimage" class="btn btn-success" name='submitImage' value="Upload Image"/>

  </form>
</div>



@endsection