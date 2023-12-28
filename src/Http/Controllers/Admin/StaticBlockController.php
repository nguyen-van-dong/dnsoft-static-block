<?php

namespace Module\StaticBlock\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Module\StaticBlock\Http\Requests\StaticBlockRequest;
use Module\StaticBlock\Repositories\StaticBlockRepositoryInterface;

class StaticBlockController extends Controller
{
  /**
   * @var StaticBlockRepositoryInterface
   */
  protected $staticBlockRepository;

  public function __construct(StaticBlockRepositoryInterface $staticBlockRepository)
  {
    $this->staticBlockRepository = $staticBlockRepository;
  }

  public function index(Request $request)
  {
    if (request('keyword')) {
      $items = $this->staticBlockRepository->paginateWithSearch('name', 10);
    } else {
      $items = $this->staticBlockRepository->paginate($request->input('max', 10));
    }
    return view("static-block::admin.index", compact('items'));
  }

  public function create()
  {
    \MenuAdmin::activeMenu('static_block_root');
    $item = [];

    return view("static-block::admin.create", compact('item'));
  }

  public function store(StaticBlockRequest $request)
  {
    $item = $this->staticBlockRepository->create($request->all());

    if ($request->input('continue')) {
      return redirect()
        ->route('static-block.admin.static-block.edit', $item->id)
        ->with('success', __('static-block::message.notification.created'));
    }

    return redirect()
      ->route('static-block.admin.static-block.index')
      ->with('success', __('static-block::message.notification.created'));
  }

  public function edit($id)
  {
    \MenuAdmin::activeMenu('static_block_root');
    $item = $this->staticBlockRepository->find($id);

    return view("static-block::admin.edit", compact('item'));
  }

  public function update(StaticBlockRequest $request, $id)
  {
    $item = $this->staticBlockRepository->updateById($request->all(), $id);

    if ($request->input('continue')) {
      return redirect()
        ->route('static-block.admin.static-block.edit', $item->id)
        ->with('success', __('static-block::message.notification.updated'));
    }

    return redirect()
      ->route('static-block.admin.static-block.index')
      ->with('success', __('static-block::message.notification.updated'));
  }

  public function destroy($id, Request $request)
  {
    $this->staticBlockRepository->delete($id);

    if ($request->ajax()) {
      Session::flash('success', __('static-block::message.notification.deleted'));
      return response()->json([
        'success' => true,
      ]);
    }

    return redirect()
      ->route('static-block.admin.static-block.index')
      ->with('success', __('static-block::message.notification.deleted'));
  }
}
