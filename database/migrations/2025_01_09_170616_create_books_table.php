<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  // database/migrations/xxxx_xx_xx_xxxxxx_create_books_table.php

public function up()
{
    Schema::create('books', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        $table->text('description');
        $table->string('image')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('books');
}

};
