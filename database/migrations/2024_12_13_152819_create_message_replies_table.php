<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageRepliesTable extends Migration
{
    public function up()
    {
        Schema::create('message_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('message_id')->constrained()->onDelete('cascade'); // References the message the reply belongs to
            $table->text('reply_content');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // References the user who replied
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('message_replies');
    }
}
