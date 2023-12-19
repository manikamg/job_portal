 @extends('admin.page')
 @include('admin.head')
 @include('admin.menu')

@section('content')
  <div class="content-wrapper">
    <section class="content-header">
 <h1>{{ ucwords(Request::segment(2)) }}<small>Report</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{Request::segment(1)}}</a></li>
        <li><a href="#">{{Request::segment(2)}}</a></li>
      </ol>
    </section>
    <div class="row">
      <div class="col-md-1 col-xs-12"></div>
        <div class="col-md-10">
          @if($message = Session::get('delete'))
            <div class="alert alert-danger">
            <p>{{$message}}</p>
            </div>
            @endif
                @if($message = Session::get('update'))
            <div class="alert alert-danger">
            <p>{{$message}}</p>
            </div>
            @endif  
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Report</h3>
                  <div class="box-tools pull-right">
                 
                  </div>
                </div>
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
 
        </div>
      </div>
    </section>
  </div>
  <script>
$(document).ready(function(){
 $('.delete_form').on('submit', function(){
  if(confirm("Are you sure you want to delete it?"))
  {
   return true;
  }
  else
  {
   return false;
  }
 });
});
</script>
  </div></div></div>
@endsection
