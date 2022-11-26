<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->foreignId("secteur_activite_id")->constrained();
            $table->foreignId("type_offre_id")->nullable()->constrained();
            $table->boolean("publish");
            $table->foreignId("entreprise_id")->constrained();
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
        Schema::table(function(Blueprint $table){
            $table->dropConstrainedForeignId("secteur_activite_id");
            $table->dropConstrainedForeignId("type_offre_id");
            $table->dropConstrainedForeignId("entreprise_id");
        });
        Schema::dropIfExists('offres');
    }
};
