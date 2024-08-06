<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('user_type');
            $table->integer('status');
            $table->timestamps();
        });
        Schema::create('topic', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing integer primary key called 'id'
            $table->string('name', 255)->notNull(); // Creates a varchar column called 'name' with a maximum length of 255
            $table->string('description', 255)->nullable(); // Creates a varchar column called 'description' with a maximum length of 255, allowing null values
            $table->string('thumbnail_url', 255)->nullable(); // Creates a varchar column called 'thumbnail_url' with a maximum length of 255, allowing null values
            $table->integer('created_by'); // Creates an integer column called 'created_by'
            $table->integer('updated_by'); // Creates an integer column called 'updated_by'
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); // Creates a timestamp column for the creation time with a default value of the current timestamp
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')); // Creates a timestamp column for the update time with a default value of the current timestamp and updates on modification
        });
        Schema::create('game', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing integer primary key called 'id'
            $table->string('name', 255)->notNull(); // Creates a varchar column called 'name' with a maximum length of 255 and not null
            $table->text('description')->nullable(); // Creates a text column called 'description' allowing null values
            $table->text('cover_img')->nullable(); // Creates a text column called 'cover_img' allowing null values
            $table->foreignId('topic_id')->constrained('topic')->onDelete('cascade'); // Foreign key 'topic_id' referencing 'id' on 'topic' table
            $table->text('qr_code')->nullable(); // Creates a text column called 'qr_code' allowing null values
            $table->foreignId('created_by')->constrained('user')->onDelete('cascade'); // Foreign key 'created_by' referencing 'id' on 'user' table
            $table->foreignId('deleted_by')->nullable()->constrained('user')->onDelete('set null'); // Foreign key 'deleted_by' referencing 'id' on 'user' table, nullable, and set to null on user deletion
            $table->timestamp('start_time')->nullable(); // Creates a timestamp column called 'start_time' allowing null values
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); // Creates a timestamp column for creation time with a default value of the current timestamp
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')); // Creates a timestamp column for update time with a default value of the current timestamp and updates on modification
            $table->timestamp('deleted_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')); // Creates a timestamp column for deletion time with a default value of the current timestamp and updates on modification
            $table->timestamp('end_time')->nullable(); // Creates a timestamp column called 'end_time' allowing null values
            $table->foreignId('updated_by')->nullable()->constrained('user')->onDelete('set null'); // Foreign key 'updated_by' referencing 'id' on 'user' table, nullable, and set to null on user deletion
        });
        Schema::create('question', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing integer primary key called 'id'
            $table->foreignId('game_id')->constrained('game')->onDelete('cascade'); // Foreign key 'game_id' referencing 'id' on 'game' table
            $table->text('content')->notNull(); // Creates a text column called 'content' which cannot be null
            $table->integer('countdown_time')->notNull(); // Creates an integer column called 'countdown_time' which cannot be null
            $table->json('correct_answer'); // Creates a JSON column called 'correct_answer'
            $table->integer('score')->notNull(); // Creates an integer column called 'score' which cannot be null
            $table->foreignId('created_by')->nullable()->constrained('user')->onDelete('set null'); // Foreign key 'created_by' referencing 'id' on 'user' table, nullable, and set to null on user deletion
            $table->foreignId('updated_by')->nullable()->constrained('user')->onDelete('set null'); // Foreign key 'updated_by' referencing 'id' on 'user' table, nullable, and set to null on user deletion
            $table->foreignId('deleted_by')->nullable()->constrained('user')->onDelete('set null'); // Foreign key 'deleted_by' referencing 'id' on 'user' table, nullable, and set to null on user deletion
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); // Creates a timestamp column for creation time with a default value of the current timestamp
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')); // Creates a timestamp column for update time with a default value of the current timestamp and updates on modification
            $table->timestamp('deleted_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')); // Creates a timestamp column for deletion time with a default value of the current timestamp and updates on modification
        });
        Schema::create('answer', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing integer primary key called 'id'
            $table->foreignId('question_id')->constrained('question')->onDelete('cascade'); // Foreign key 'question_id' referencing 'id' on 'question' table
            $table->json('answer_content'); // Creates a JSON column called 'answer_content'
            $table->json('correct_answer'); // Creates a JSON column called 'correct_answer'
            $table->foreignId('created_by')->nullable()->constrained('user')->onDelete('set null'); // Foreign key 'created_by' referencing 'id' on 'user' table, nullable, and set to null on user deletion
            $table->foreignId('updated_by')->nullable()->constrained('user')->onDelete('set null'); // Foreign key 'updated_by' referencing 'id' on 'user' table, nullable, and set to null on user deletion
            $table->foreignId('deleted_by')->nullable()->constrained('user')->onDelete('set null'); // Foreign key 'deleted_by' referencing 'id' on 'user' table, nullable, and set to null on user deletion
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); // Creates a timestamp column for creation time with a default value of the current timestamp
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')); // Creates a timestamp column for update time with a default value of the current timestamp and updates on modification
        });
        Schema::create('user_answer', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing integer primary key called 'id'
            $table->foreignId('user_id')->constrained('user')->onDelete('cascade'); // Foreign key 'user_id' referencing 'id' on 'user' table
            $table->foreignId('game_id')->constrained('game')->onDelete('cascade'); // Foreign key 'game_id' referencing 'id' on 'game' table
            $table->foreignId('question_id')->constrained('question')->onDelete('cascade'); // Foreign key 'question_id' referencing 'id' on 'question' table
            $table->json('selected_answer'); // Creates a JSON column called 'selected_answer'
            $table->integer('score'); // Creates an integer column called 'score'
            $table->integer('time_taken'); // Creates an integer column called 'time_taken'
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); // Creates a timestamp column for creation time with a default value of the current timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
        Schema::dropIfExists('game');
        Schema::dropIfExists('answer');
        Schema::dropIfExists('question');
        Schema::dropIfExists('topic');
    }
};
