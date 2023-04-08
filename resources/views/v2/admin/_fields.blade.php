<div class="col-md-9 col-sm-9">
  @input(['name' => 'name', 'label' => __('static-block::static-block.name')])
  @slug(['name' => 'slug', 'label' => __('static-block::static-block.slug'), 'field_slug' => 'name'])
  @ckeditor(['name' => 'content', 'label' => __('static-block::static-block.content')])
  @input(['name' => 'css', 'label' => __('static-block::static-block.css')])
  @input(['name' => 'script', 'label' => __('static-block::static-block.js')])
  @checkbox(['name' => 'is_active', 'label' => '' , 'default' => true, 'placeholder' => __('static-block::static-block.is_active')])
</div>
<div class="col-md-3 col-sm-3">
  <div class="alert alert-info" role="alert">
    @translatableAlert
  </div>
  @translatable
  <hr>
  <x-button-save-edit />
</div>