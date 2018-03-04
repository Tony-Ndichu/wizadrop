@extends('layouts.master')

@section('content')



<div id="updatecrop">

      

    <form action="{{ route('imagesuploaded') }}" id="form" method="post"  enctype="multipart/form-data">
      {{ csrf_field() }}
    
<label id="camera2"><i class="fa fa-camera fa-lg" aria-hidden="true"></i>    
<input type="file"  style="display:none;" id="uploadFile" name="uploadFile" value="Choose a file">
</label>

<div id="upload-demo"></div>
<input type="hidden" id="imagebase64" name="imagebase64">

<button type="submit" id="done" class="upload-result" name='submitImage' value="Upload Image">Done</button>

</form>


          
          
        </div>

        <script type="text/javascript">
$( document ).ready(function() {
var $uploadCrop;

function readFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();          
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            });
            $('.upload-demo').addClass('ready');
        }           
        reader.readAsDataURL(input.files[0]);
    }
}

$uploadCrop = $('#upload-demo').croppie({
    viewport: {
        width: 150,
        height: 150,
        type: 'circle'
    },
    boundary: {
        width: 250,
        height: 250
    },
  enableExif: true,
  quality: 0
});

$('#uploadFile').on('change', function () { readFile(this); });
$('.upload-result').on('click', function (ev) {
    $uploadCrop.croppie('result', {
        type: 'canvas',
        size: 'original'
    }).then(function (resp) {
        $('#imagebase64').val(resp);
        $('#form').submit();
    });
});

});
</script>

@endsection