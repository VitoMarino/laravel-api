<?php
//! TABELLA PONTE TRA PROJECTS E TECHONOLGIES

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('project_technology', function (Blueprint $table) {

            // Dati prima tabella
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');

            // Dati seconda tabella
            $table->unsignedBigInteger('technology_id');
            $table->foreign('technology_id')->references('id')->on('technologies');

            // Aggiungo che la chiave primaria è l'array dell'unione di projects_id e techonolgy_id, in modo che diventano unici
            $table->primary(['project_id', 'technology_id']);


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_technology');
    }
};
