<?php

namespace Module\StaticBlock\Models;

use DnSoft\Core\Traits\AttributeAndTranslatableTrait;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Activitylog\Traits\LogsActivity;

class StaticBlock extends Model
{
  use AttributeAndTranslatableTrait;
  // use LogsActivity;

  // protected static $logName = 'static-block';

  protected $table = 'static_blocks';

  protected $casts = [
    'is_active' => 'boolean',
  ];

  protected $fillable = [
    'name',
    'slug',
    'content',
    'css',
    'script',
    'is_active',
  ];

  protected $appends = ['render_code'];

  public $translatable = [
    'name',
    'content'
  ];

  /**
   * @return string
   */
  public function getRenderCodeAttribute(): string
  {
    return '{!! \StaticBlockRender::render("' . $this->slug . '") !!}';
  }
}
