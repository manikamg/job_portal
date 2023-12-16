 @extends('admin.page')
 @include('admin.head')
 @include('admin.menu')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
 <h1>
        <small style="font-style: uppercase">{{Request::segment(2)}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{Request::segment(1)}}</a></li>
        <li><a href="#">{{Request::segment(2)}}</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Update</h3>
            </div>
            @if($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{$message}}</p>
            </div>
            @endif
            <form method="post" action="{{ route('formsetting.update', $id)}}">
                   {{csrf_field()}}
                   <input type="hidden" name="_method" value="PATCH" />
              <div class="box-body">
                <input type="hidden" name="id" value="{{ $id }}">
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Filed Place</label>
                  <select type="type" name="place" class="form-control" id="place">
                    <option value="{{$formsetting-> type}}">{{$formsetting-> type}}</option>
                    <option value="general">General Info</option>
                    <option value="family">Family Info</option>
                    <option value="hobbies">Hobbies Info</option>
                    <option value="qulification">Qualification Info</option>
                    <option value="contact">Contact Info</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Field Name</label>
                  <input type="hidden" name="adminid" class="form-control" id="exampleInputEmail1" value="{{ (Auth::guard('admin')->user()->id)}}">
                   <input type="hidden" name="fstatus" class="form-control" id="fstatus" value="1">
                  <input type="type" name="formname" class="form-control" id="formname" value="{{$formsetting->fanme}}" placeholder="Form Heading" required="required">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Field Type</label>
                  <select  class="form-control" id="fieldtype" name="fieldtype">
                  <option value="{{$formsetting-> size}}">{{$formsetting-> size}}</option>
                  <option value="Normal">Normal</option>
                  <option value="large">Large</option>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div align="center"><div class="box-footer">
                <button type="submit" value="Edit" class="btn btn-primary">Submit</button>
              </div></div>
            </form>
          </div>
        </div>
        
      </div>
    </section>
  </div>
@endsection
