@extends('template.master')
@section('title') Blog Create @stop
@section('content')

    <div class="container">
        <div class="row my-5 justify-content-center">
            <div class="col-8">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif

                <div class="">
                    <form method="get" action="{{route('blog.index')}}">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="{{request('keyword')}}" placeholder="Search Post" aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword">
                            <button class="btn btn-outline-primary" type="submit" id="button-addon2">Search</button>
                        </div>

                    </form>
                </div>
                <table class="table table-bordered align-middle">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>title</th>
                        {{--                       <th>Description</th>--}}
                        <th>Controls</th>
                        <th>Created</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blogs as $blog)
                        <tr>
                            <td>{{$blog->id}}</td>
                            <td class="small mb-0">
                                <span class="fw-bold">{{Str::words($blog->title,5) }}</span>
                                <br>
                                <span class="text-black-50">{{Str::words($blog->description,5) }}</span>

                            </td>

                            <td class="text-center">
                                <a href="{{route('blog.edit',$blog->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                                <form action="{{route('blog.destroy',$blog->id)}}" method="post" class="d-inline-block">
                                    @csrf
                                    @method("delete")
                                    <button class="btn btn-outline-danger">Del</button>
                                </form>
                            </td>
                            <td>{{$blog->created_at}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="">
{{--                    {{$blogs->appends(request()->query())->links()}}--}}

                    {{$blogs->links()}}



                </div>
            </div>
        </div>
    </div>

@stop
