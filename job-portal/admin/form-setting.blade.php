 @extends('admin.page')
 @include('admin.head')
 @include('admin.menu')

 @section('content')
  <div class="content-wrapper">
    <section class="content-header">
 <h1><small style="font-style: uppercase">{{Request::segment(2)}}</small></h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{Request::segment(1)}}</a></li>
        <li><a href="#">{{Request::segment(2)}}</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Setting</h3>
            </div>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
            </ul><br/>
            </div>
            @endif
            @if($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{$message}}</p>
            </div>
            @endif
            <form method="POST" action="{{ url('admin/formsetting') }}">
                   {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Filed Place</label>
                  <select type="type" name="place" class="form-control" id="place">
                    <option value="general">General Info</option>
                    <option value="family">Family Info</option>
                    <option value="hobbies">Hobbies Info</option>
                    <option value="qulification">Qualification Info</option>
                    <option value="contact">Contact Info</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Field Name</label>
                  <input type="hidden" name="adminid" class="form-control" id="exampleInputEmail1" value="{{ 
                  (Auth::guard('admin')->user()->id)}}">
                   <input type="hidden" name="fstatus" class="form-control" id="fstatus" value="1">
                  <input type="type" name="formname" class="form-control" id="formname" placeholder="Form Heading" required="required">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Field Type</label>
                  <select  class="form-control" id="fieldtype" name="fieldtype">
                  <option value="normal">Normal</option>
                  <option value="large">Large</option>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div align="center"><div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div></div>
            </form>
          </div>
        </div> 
        <div class="col-md-6">
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
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Form Field List</h3>
            </div>
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <table class="table table-fixedheader table-bordered table-striped">
    <thead>
      <tr>
        <th><small>sno.</small></th>
        <th>Field</th>
        <th>Tag Name</th>
        <th>Size</th>
        <th>Edit</th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody id="myTable" style="height:500px">
      <!-- SELECT `id`, `adminid`, `type`, `fanme`, `size`, `status`, `created_at`, `updated_at` FROM `formsetting` WHERE 1 -->
      @foreach($formsetting  as $index =>$row)
   <tr>
    <td>{{$index+1}}</td>
    <td>

    @if($row['type']=='general')
        <span class="label label-primary">{{$row['type']}}</span>
        @elseif($row['type']=='family')
        <span class="label label-right bg-green">{{$row['type']}}</span>
        @elseif($row['type']=='contact')
        <span class="label label-warning">{{$row['type']}}</span>
        @elseif($row['type']=='hobbies')
        <span class="label label-default">{{$row['type']}}</span>
        @endif</td>
    <td><b>{{$row['fanme']}}</b></td>
    <td>{{$row['size']}}</td>
    <td><a href="{{ route('formsetting.edit', $row['id'])}}" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>
    <td>   
      <form method="post" class="delete_form" action="{{ route('formsetting.destroy', $row['id'])}}">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
     </form></td>
   </tr>
   @endforeach
    
    </tbody>
  </table>
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
@endsection
