<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>KEditor - Kademi Content Editor</title>
        <link rel="stylesheet" type="text/css" href="{{asset('/plugins/bootstrap-3.4.1/css/bootstrap.min.css')}}" data-type="keditor-style" />
        <link rel="stylesheet" type="text/css" href="{{asset('/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" data-type="keditor-style" />
        <!-- Start of KEditor styles -->
        <link rel="stylesheet" type="text/css" href="{{asset('/dist/css/keditor.css')}}" data-type="keditor-style" />
        <link rel="stylesheet" type="text/css" href="{{asset('/dist/css/keditor-components.css')}}" data-type="keditor-style" />
        <!-- End of KEditor styles -->
        <link rel="stylesheet" type="text/css" href="{{asset('/plugins/code-prettify/src/prettify.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('/css/examples.css')}}" />
    </head>
    
    <body>
        <div data-keditor="html">
            <div id="content-area"></div>
            
        </div>
        <div class='text-center' style='padding-bottom:50px;padding-top:30px;'>
        <button class='btn btn-success' id='save'><h1>Create</h1></button>
        </div>
        

        <script type="text/javascript" src="{{asset('/plugins/jquery-1.11.3/jquery-1.11.3.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/plugins/bootstrap-3.4.1/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/plugins/ckeditor-4.11.4/ckeditor.js')}}"></script>
        <script type="text/javascript" src="{{asset('/plugins/formBuilder-2.5.3/form-builder.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/plugins/formBuilder-2.5.3/form-render.min.js')}}"></script>
        <!-- Start of KEditor scripts -->
        <script type="text/javascript" src="{{asset('/dist/js/keditor.js')}}"></script>
        <script type="text/javascript" src="{{asset('/dist/js/keditor-components.js')}}"></script>
        <!-- End of KEditor scripts -->
        <script type="text/javascript" src="{{asset('/plugins/code-prettify/src/prettify.js')}}"></script>
        <script type="text/javascript" src="{{asset('/plugins/js-beautify-1.7.5/js/lib/beautify.js')}}"></script>
        <script type="text/javascript" src="{{asset('/plugins/js-beautify-1.7.5/js/lib/beautify-html.js')}}"></script>
        <script type="text/javascript" src="{{asset('/js/examples.js')}}"></script>
        <script type="text/javascript" data-keditor="script">
            $(function () {
                $('#content-area').keditor();
            });
            $.ajaxSetup({

headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});





$("#save").click(function(e){



e.preventDefault();



var content = $("#content-area").keditor('getContent');


$.ajax({

   type:'POST',

   url:"{{ route('store') }}",

   data:{
       _token: "{{ csrf_token() }}",
       content:content},

   success:function(data){
    window.location.href = "{{ route('owner') }}";
    console.log(data.success);
   },
   error:function(data){

       console.log(data);
   }

});



});
        </script>
    </body>
</html>