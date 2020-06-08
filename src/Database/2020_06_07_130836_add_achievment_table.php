<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAchievmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable(true)->comment('Achievment name');
            $table->string('description', 512)->nullable(true)->comment('Achievment description');
            $table->string('image', 255)->nullable(true)->comment('Achievment image');
            $table->bigInteger('type_id')->unsigned()->nullable(false)->default(0)->comment('Achievment type');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('achievment_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable(false)->comment('Achievment type name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('achievments', function (Blueprint $table) {
            $table->foreign('type_id', 'achievment_types_id_fk')->references('id')->on('achievment_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('achievments', function (Blueprint $table) {
            $table->dropForeign('achievment_types_id_fk');
        });
        Schema::dropIfExists('achievments');
        Schema::dropIfExists('achievment_types');
    }
}
