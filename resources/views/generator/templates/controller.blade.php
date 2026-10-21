
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\{{ $json->model }};

class {{ \Illuminate\Support\Str::plural($json->model) }}Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ${{ $json->table }} = {{ $json->model }}::all();
        return view('admin.{{ $json->table }}.index', compact('{{ $json->table }}'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.{{ $json->table }}.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {{$json->model}}::create([
            @foreach($json->fields as $field)
                '{{ $field->name }}' => $request->get('{{ $field->name }}'),
            @endforeach
            ]);
        return redirect()->route('admin.{{ $json->table }}.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       ${{ strtolower($json->model) }} = {{ $json->model }}::find($id);
        return view('admin.{{ $json->table }}.show', compact('{{ strtolower($json->model)  }}'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        ${{ strtolower($json->model) }} = {{ $json->model }}::find($id);
        return view('admin.{{ $json->table }}.edit', compact('{{ strtolower($json->model)  }}'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ${{ strtolower($json->model) }} = {{ $json->model }}::find($id);
        @foreach ($json->fields as $field)
            ${{ strtolower($json->model) }}->{{ $field->name }} = $request->get('{{ $field->name }}');
        @endforeach
        ${{ strtolower($json->model) }}->save();
        return redirect()->route('admin.{{ $json->table }}.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ${{ strtolower($json->model) }} = {{ $json->model }}::find($id);
        ${{ strtolower($json->model) }}->delete();
        return back();
    }
}
