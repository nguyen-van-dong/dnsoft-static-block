@extends('core::v2.admin.master')

@section('title', __('static-block::static-block.index.page_title'))

@section('breadcrumbs')
<div class="title_left">
  <div class="page-title-box">
    <div class="page-title-right">
      <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ trans('dashboard::message.index.breadcrumb') }}</a></li>
        <li class="breadcrumb-item active">{{ trans('static-block::static-block.index.breadcrumb') }}</li>
      </ol>
    </div>
  </div>
</div>
@endsection

@section('search')
<div class="title_right">
  <div class="col-md-5 col-sm-5 form-group pull-right top_search">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div>
  </div>
</div>
@endsection

@section('content')

<div class="row" style="display: block;">
  <div class="clearfix"></div>
  <div class="col-md-12 col-sm-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Static block</h2>
        <div class="clearfix text-right">
          <x-button-create url="{{ route('static-block.admin.static-block.create') }}" />
          <x-button-reload url="{{ route('static-block.admin.static-block.index') }}" />
        </div>
        <span>
        </span>
      </div>

      <div class="x_content">
        <div class="table-responsive">
          <table class="table table-striped jambo_table bulk_action">
            <thead>
              <tr class="headings">
                <th>
                  <input type="checkbox" id="check-all" class="flat">
                </th>
                <th>{{ __('static-block::static-block.name') }}</th>
                <th>{{ __('static-block::static-block.slug') }}</th>
                <th>{{ __('static-block::static-block.is_active') }}</th>
                <th>@translatableHeader</th>
                <th>{{ __('static-block::static-block.created_at') }}</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @foreach($items as $key => $item)
              <tr class="{{ $key % 2 == 0 ? 'odd' : 'even' }} pointer">
                <td class="a-center ">
                  <input type="checkbox" class="flat" name="table_records">
                </td>
                <td>
                  <a href="{{ route('static-block.admin.static-block.edit', $item->id) }}">
                    {{ $item->name }}
                  </a>
                </td>
                <td>
                  <code>{{ $item->render_code }}</code>
                </td>
                <td>
                  @if($item->is_active)
                  <i class="fa fa-check text-success"></i>
                  @else
                  <i class="fa fa-times text-inverse"></i>
                  @endif
                </td>
                <td>
                  @translatableStatus(['editUrl' => route('static-block.admin.static-block.edit', $item->id)])
                </td>
                <td>{{ $item->created_at }}</td>
                <td class="text-right">
                  @admincan('static-block.admin.static-block.edit')
                  <x-button-edit url="{{ route('static-block.admin.static-block.edit', $item->id) }}" title="Edit profile" icon="fa fa-pencil-square-o" />
                  @endadmincan
                  @admincan('static-block.admin.static-block.destroy')
                  <x-button-delete url="{{ route('static-block.admin.static-block.destroy', $item->id) }}" />
                  @endadmincan
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@stop