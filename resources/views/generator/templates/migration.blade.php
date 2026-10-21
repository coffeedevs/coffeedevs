
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create{{ \Illuminate\Support\Str::plural($json->model) }}Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('{{ $json->table }}', function (Blueprint $table) {
            $table->increments('id');
            @foreach($json->fields as $field)
                $table->{{ $field->type }}('{{ $field->name }}');
            @endforeach
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
        Schema::drop('{{ $json->table }}');
    }
}
