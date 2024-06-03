<?php

use App\Models\BlogCategory;
use App\Models\User;
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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(BlogCategory::class)->constrained();
            $table->foreignIdFor(User::class)->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->string('banner');
            $table->longText('article');
            $table->string('tags')->nullable();
            $table->string('show_home')->default(0);
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
