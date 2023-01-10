<?php
namespace Module\StaticBlock\Services;

use Module\StaticBlock\Models\StaticBlock;
use Module\StaticBlock\Repositories\StaticBlockRepositoryInterface;

class StaticBlockService
{
    protected $staticBlock;

    public function __construct(StaticBlockRepositoryInterface $staticBlock)
    {
        $this->staticBlock = $staticBlock;
    }

    public function render($key, $view = null)
    {
        if (is_numeric($key)) {
            $block = $this->staticBlock->getById($key);
        } elseif (is_string($key)){
            $block = $this->staticBlock->findBySlug($key);
        } elseif ($key instanceof StaticBlock) {
            $block = $key;
        }
        if (empty($key)) {
            return view('static-block::static-render.not-found')->with([
                'blockId' => $key,
            ]);
        }

        if (!$view || !view()->exists($view)) {
            if (!$view || !view()->exists($view = "static-block::static-render.{$view}")) {
                $view = 'static-block::static-render.default';
            }
        }

        return view($view)->with([
            'item' => $block,
        ]);
//       return view('static-block::static-block.builder', compact('block'));
    }
}
