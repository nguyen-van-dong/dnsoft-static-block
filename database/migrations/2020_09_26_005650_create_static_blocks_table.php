<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaticBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_blocks', function (Blueprint $table) {
            $table->id();
            $table->{database_jsonable()}('name');
            $table->string('slug')->index();
            $table->{database_jsonable()}('content');
            $table->longText('css')->nullable();
            $table->longText('script')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('static_blocks');
    }
}
