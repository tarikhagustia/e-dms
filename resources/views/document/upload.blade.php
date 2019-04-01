@extends('layouts.app')
@section('title', __('Upload Document'))
@section('content')
    <div class="row">
        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{__('Document')}}</h4>
                    <p class="text-muted font-14 mb-4">{{__('Input new document')}}</p>
                    @include('lib.msg')
                    <form method="post" action="{{route('document.upload')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-form-labe">{{__('Select Category')}}</label>
                            <select class="form-control" name="category">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{(old('category') == $category->id) ? 'selected' : null}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('category') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                        <label for="title" class="col-form-label ">{{__('Title')}}</label>
                            <input class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" type="text"
                                   name="title" id="title" placeholder="Title" value="{{old('title')}}">
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{__('Description')}}</label>
                            <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" placeholder="{{__('Optional')}}">{{old('description')}}</textarea>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                          <label class="control-label">{{__('Select Document')}}</label>
                          <input type="file" class="form-control {{ $errors->has('document') ? ' is-invalid' : '' }}" name="document">
                          <span class="help-block">*only allowed pdf, docx, doc, xls, xlsx, ptpx, ptp</span>
                          @if ($errors->has('document'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('document') }}</strong>
                              </span>
                          @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">{{__('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
