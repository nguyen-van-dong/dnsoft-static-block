@extends('core::v2.admin.master')

@section('title', __('static-block::static-block.create.page_title'))

@section('breadcrumbs')
<div class="title_left" style="margin-bottom: 2em;">
  <div class="page-title-box">
    <div class="page-title-right">
      <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ trans('dashboard::message.index.breadcrumb') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('static-block.admin.static-block.index') }}">{{ trans('static-block::static-block.index.breadcrumb') }}</a></li>
        <li class="breadcrumb-item active">{{ trans('static-block::static-block.create.breadcrumb') }}</li>
      </ol>
    </div>
  </div>
</div>
@endsection

@section('content')
<form action="{{ route('static-block.admin.static-block.store') }}" method="POST">
  @csrf
  <div class="row" style="display: block;">
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
      @include('static-block::v2.admin._fields', ['item' => $item])
      </div>
    </div>
  </div>
</form>
@stop