<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->timestamps();
        });

        Schema::create('sources', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('author_id');
            $table->text('name');
            $table->timestamps();

            $table->index(["author_id"], 'sources_author_id_index');
        });

        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('source_id')->nullable(true)->default(null);
            $table->text('text');
            $table->text('comments')->nullable(true)->default(null);
            $table->timestamps();

            $table->index(["author_id"], 'quotes_author_id_index');
            $table->index(["source_id"], 'quotes_source_id_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');
        Schema::dropIfExists('sources');
        Schema::dropIfExists('quotes');
    }
}
