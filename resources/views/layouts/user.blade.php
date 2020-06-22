@extends('layouts.app')

@section('content')
	
	<div class="row">
		<div class="col-12">
			@if(isset($errors))
				@if ($errors->any())
			        <div class="alert alert-danger">
			          <ul>
			            @foreach ($errors->all() as $error)
			            <li>{{ $error }}</li>
			            @endforeach
			          </ul>
			        </div>
			    @endif
		    @endif
		</div>
	    @include('user.sidebar')

	    @yield('user.content')
	</div>

@endsection


@section('stylesheets')
  <link href="{{ asset('assets/plugins/dropzone.css') }}" rel="stylesheet">
@endsection


@section('javascripts')
    <script src="{{ asset('assets/plugins/dropzone.js') }}" type="text/javascript"></script>
    <script>
	  var uploadedDocumentMap = {}
	  Dropzone.options.documentDropzone = {
	    url: "{{ route('posting.media.store') }}",
	    maxFilesize: 2, // MB
	    addRemoveLinks: true,
	    headers: {
	      'X-CSRF-TOKEN': "{{ csrf_token() }}"
	    },
	    success: function (file, response) {
	      $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
	      uploadedDocumentMap[file.name] = response.name
	    },
	    removedfile: function (file) {
	      file.previewElement.remove()
	      var name = ''
	      if (typeof file.file_name !== 'undefined') {
	        name = file.file_name
	      } else {
	        name = uploadedDocumentMap[file.name]
	      }
	      $('form').find('input[name="images[]"][value="' + name + '"]').remove()
	    },
	    init: function () {
	      @if(isset($hasFiles))
	        var files = window.files
	        for (var i in files) {
	          var file = files[i]
	          this.options.addedfile.call(this, file)
	          this.options.thumbnail.call(this, file, file.url);//uploadsfolder is the folder where you have all those uploaded files

	          file.previewElement.classList.add('dz-complete')
	          $('form').append('<input type="hidden" name="images[]" value="' + file.file_name + '">')
	        }
	      @endif
	    }
	  }
	</script>
@endsection

