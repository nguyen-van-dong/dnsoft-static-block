@extends('core::admin.master')

@section('meta_title', __('static-block::static-block.index.page_title'))

@section('breadcrumbs')
<div class="row">
  <div class="col-12">
    <div class="page-title-box">
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ trans('dashboard::message.index.breadcrumb') }}</a></li>
          <li class="breadcrumb-item active">{{ trans('static-block::static-block.index.breadcrumb') }}</li>
        </ol>
      </div>
      <h4 class="page-title">
        {{ __('static-block::static-block.index.page_title') }}
      </h4>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card-box">
        <div class="mb-2">
          <form>
            <div class="row">
              <div class="col-2 form-inline">
              <a id="demo-btn-addrow" class="btn btn-primary" href="{{ route('static-block.admin.static-block.create') }}"><i class="mdi mdi-plus-circle mr-2"></i> Add New Block</a>
              </div>
              <div class="col-4">
                <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off" name="keyword" value="{{ request('keyword') }}">
              </div>
              <div class="col-2">
                <input type="submit" value="Search" class="btn btn-secondary">
              </div>
            </div>
          </form>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-centered table-striped table-bordered mb-0 toggle-circle">
            <thead>
              <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('static-block::static-block.name') }}</th>
                <th>{{ __('static-block::static-block.slug') }}</th>
                <th>{{ __('static-block::static-block.is_active') }}</th>
                <th>@translatableHeader</th>
                <th>{{ __('static-block::static-block.created_at') }}</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($items as $item)
              <tr>
                <td>{{ $item->id }}</td>
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
                  <a href="{{ route('static-block.admin.static-block.edit', $item->id) }}" class="btn btn-success-soft btn-sm mr-1" style="background-color: rgb(211 250 255); color: #0fac04; width: 32px;border-color: rgb(167 255 247); border: 1px solid">
                    <i class="fas fa-pencil-alt" style="font-size: 15px; margin-left: -5px; margin-top: 5px"></i>
                  </a>
                  @endadmincan

                  @admincan('static-block.admin.static-block.destroy')
                  <x-button-delete-v1 url="{{ route('static-block.admin.static-block.destroy', $item->id) }}" />
                  @endadmincan
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <div class="float-right">
            {{ $items->links() }}
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
@stop