<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->text('image')->nullable();
            $table->text('video')->nullable();
            $table->string('hint_step')->nullable();
            $table->string('step_name',100)->nullable();
            $table->string('hint_order')->default('1')->nullable();
            $table->string('content_type',30)->default('page')->nullable();
            $table->timestamps();
        });

        Schema::create('contents_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('content_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title',255)->nullable();
            $table->text('description',30)->nullable();
            $table->timestamps();
            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents_translations');
        Schema::dropIfExists('contents');
    }
}
