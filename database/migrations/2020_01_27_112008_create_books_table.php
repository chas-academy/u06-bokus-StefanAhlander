<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('author');
            $table->string('title');
            $table->decimal('price');
            $table->timestamps();
        });
 
        DB::table('books')->insert(['author' => 'Chris Ryan', 'title' => 'The One That Got Away', 'price' => 95]);
        DB::table('books')->insert(['author' => 'Nora Roberts', 'title' => 'Förövarna', 'price' => 169]);
        DB::table('books')->insert(['author' => 'Johanna Elomaa', 'title' => 'Grottdykaren: Mikko Paasi och den dramatiska räddningsoperationen', 'price' => 189]);
        DB::table('books')->insert(['author' => 'Anders Hansen', 'title' => 'Hjärnstark: hur motion och träning stärker din hjärna', 'price' => 53]);
        DB::table('books')->insert(['author' => 'Jo Nesbo', 'title' => 'Kniv', 'price' => 58]);
        DB::table('books')->insert(['author' => 'Heather Morris', 'title' => 'Tatueraren i Auschwitz', 'price' => 59]);
        DB::table('books')->insert(['author' => 'Niklas Natt och Dag', 'title' => '1793', 'price' => 59]);
        DB::table('books')->insert(['author' => 'Andrzej Sapkowski', 'title' => 'Sword of Destiny', 'price' => 106]);
        DB::table('books')->insert(['author' => 'Alex Schulman', 'title' => 'Bränn alla mina brev', 'price' => 59]);
        DB::table('books')->insert(['author' => 'Mari Jungstedt', 'title' => 'Den dubbla tysnaden', 'price' => 59]);
        DB::table('books')->insert(['author' => 'Andrzej Sapkowski', 'title' => 'Blood of Elves', 'price' => 76]);
        DB::table('books')->insert(['author' => 'Stefan Einhorn', 'title' => 'Konsten att vara snäll', 'price' => 49]);
        DB::table('books')->insert(['author' => 'Nina Wähä', 'title' => 'Testamente', 'price' => 49]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
