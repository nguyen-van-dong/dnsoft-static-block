<?php

namespace Module\StaticBlock;

use DnSoft\Core\Support\BaseModuleServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Event;
use Module\StaticBlock\Facade\StaticBlockRender;
use Module\StaticBlock\Services\StaticBlockService;
use DnSoft\Acl\Facades\Permission;
use DnSoft\Core\Events\CoreAdminMenuRegistered;
use Module\StaticBlock\Repositories\Eloquents\StaticBlockRepository;
use Module\StaticBlock\Repositories\StaticBlockRepositoryInterface;
use Module\StaticBlock\Models\StaticBlock;

class StaticBlockServiceProvider extends BaseModuleServiceProvider
{
    public function getModuleNamespace(): string
    {
        return 'static-block';
    }

    public function register()
    {
        parent::register();

        $this->app->singleton(StaticBlockRepositoryInterface::class, function () {
            return new StaticBlockRepository(new StaticBlock());
        });

        $this->app->singleton('static.block', StaticBlockService::class);
    }

    public function registerPermissions()
    {
        Permission::add('static-block.admin.static-block.index', __('static-block::permission.static-block.index'));
        Permission::add('static-block.admin.static-block.create', __('static-block::permission.static-block.create'));
        Permission::add('static-block.admin.static-block.edit', __('static-block::permission.static-block.edit'));
        Permission::add('static-block.admin.static-block.destroy', __('static-block::permission.static-block.destroy'));
    }

    public function registerAdminMenus()
    {
        Event::listen(CoreAdminMenuRegistered::class, function($menu) {
            $menu->add('Static Block', [
                'route' => 'static-block.admin.static-block.index',
                'parent' => $menu->content->id
            ])->nickname('static_block_root')->data('order', 10)->prepend('<i class="fas fa-th-large"></i>');
        });
    }

    public function boot()
    {
        parent::boot();
        AliasLoader::getInstance()->alias('StaticBlockRender', StaticBlockRender::class);
        $this->registerAdminMenus();
    }
}
