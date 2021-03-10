@extends('front_end.layout.master')

@section('content')


    <br>
    <br>
    <br>
{{--    @include('front_end.admin.partials.header')--}}

    <!-- Main -->
    <div class="container-fluid bootstrap snippet" style="min-height: 500px">

        <!-- upper section -->
        <div class="row">
            @include('front_end.admin.partials.sidebar')
            <div class="col-md-9">
                <!-- column 2 -->
                <a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i> My Dashboard</strong></a>
                <hr>
                <div class="row">
                    <div class="row">
                        <div class="col-md-4">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            @if ($message = Session::get('failed'))
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <form action="{{ route('store.doctortype') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Doctor Type</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Enter category name">
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </form>
                        </div>
                        <div class="col-md-8">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($categories->count())
                                @foreach($categories  as $type)
                                <tr>
                                    <th scope="row"></th>
                                    <td>{{ $type->name }}</td>
                                    <td>
                                        <form action="{{ route('destroy.doctortype', $type->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete" data-placement="top">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                                 @endforeach

                                </tbody>
                                @else
                                    <h6>Sorry Data Not found</h6>
                                @endif
                            </table>


                        </div>

                    </div>

                </div><!--/row-->
            </div><!--/col-span-9-->
        </div><!--/row-->
        <!-- /upper section -->
    </div><!--/container-->
    <!-- /Main -->




@endsection
@push('style-css')
    <style>

    </style>
@endpush
