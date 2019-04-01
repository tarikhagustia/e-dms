@extends('layouts.app')
@section('title', __('Category'))
@section('content')
    <div class="row">
        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">
                        <a class="btn text-white btn-success" href="{{route('master.category.add')}}"><i class="fa fa-plus" aria-hidden="true"></i> {{__('Add Category')}}</a>
                    </div>
                    <h4 class="header-title">{{__('Category')}}</h4>
                    <p class="text-muted font-14 mb-4">{{__('List of categories')}}</p>
                    <form method="get">
                        <div class="form-row align-items-center">
                            <div class="col-sm-3 my-1">
                                <label class="sr-only" for="inlineFormInputName">{{__('Search')}}</label>
                                <input type="text" name="q" value="{{Request::get('q')}}" class="form-control" id="inlineFormInputName" placeholder="{{__('Search')}}">
                            </div>
                            <div class="col-auto my-1">
                                <button type="submit" class="btn btn-info">{{__('Search')}}</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Parent')}}</th>
                                <th>{{__('Created At')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->getParentName()}}</td>
                                    <td>{{$category->created_at}}</td>
                                    <td class="text-center">
                                        <a href="{{route('master.category.edit', $category->id)}}" class="btn text-white btn-primary btn-xs btn-rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="{{route('master.category.delete', $category->id)}}" onclick="return confirm('Are you sure?');" class="btn text-white btn-danger btn-xs btn-rounded"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="5">{{__('No records')}}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{$categories->links()}}

                </div>
            </div>
        </div>
    </div>
@endsection
