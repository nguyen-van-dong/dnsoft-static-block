@extends('core::admin.master')

@section('meta_title', __('static-block::static-block.create.page_title'))

@section('content-header')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ trans('dashboard::message.index.breadcrumb') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('static-block.admin.static-block.index') }}">{{ trans('static-block::static-block.index.breadcrumb') }}</a></li>
                            <li class="breadcrumb-item active">{{ trans('static-block::static-block.create.breadcrumb') }}</li>
                        </ol>
                </div>
                <h4 class="page-title">
                    {{ __('static-block::static-block.create.page_title') }}
                </h4>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <form action="{{ route('static-block.admin.static-block.store') }}" method="POST">
        @csrf

        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="fs-17 font-weight-600 mb-2">
                            {{ __('static-block::static-block.create.page_title') }}
                        </h4>
                        @translatableAlert
                    </div>
                    <div class="text-right">
                        <div class="btn-group">
                            <button class="btn btn-success" type="submit">{{ __('core::button.save') }}</button>
                            <button class="btn btn-primary" name="continue" value="1" type="submit">{{ __('core::button.save_and_edit') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('static-block::admin._fields', ['item' => $item])
            </div>
            <div class="card-footer text-right">
                <div class="btn-group">
                    <button class="btn btn-success" type="submit">{{ __('core::button.save') }}</button>
                    <button class="btn btn-primary" name="continue" value="1" type="submit">{{ __('core::button.save_and_edit') }}</button>
                </div>
            </div>
        </div>
    </form>
@stop
