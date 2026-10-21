<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class Generate extends Command
{
    protected $signature = 'coffee:generate {--json=} {--m|migrate}';

    protected $description = 'Scaffold views for AdminLTE';

    protected $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        parent::__construct();
        $this->filesystem = $filesystem;
    }

    public function handle()
    {
        if ($this->option('json')) $file = $this->filesystem->get(base_path() . '/' . $this->option('json'));
        else $file = $this->filesystem->get(base_path() . '/schema.json');
        $schemas = json_decode($file);
        foreach ($schemas as $json) {
            $this->generateModel($json);
            if ($this->option('migrate')) $this->generateMigration($json);
            $this->generateController($json);
            $this->generateViews($json);
        }
    }

    private function generateModel($json)
    {
        $content = view('generator.templates.model', compact('json'))->render();
        $this->filesystem->put(app_path() . '/' . $json->model . '.php', "<?php \n" . $content);
    }

    private function generateMigration($json)
    {
        $content = view('generator.templates.migration', compact('json'))->render();
        $this->filesystem->put(base_path() . '/database/migrations/' . date('Y_m_d_His') . '_create_' . $json->table . '_table.php', "<?php \n" . $content);
    }

    private function generateController($json)
    {
        $content = view('generator.templates.controller', compact('json'))->render();
        $this->filesystem->put(app_path() . '/Http/Controllers/Admin/' . \Illuminate\Support\Str::plural($json->model) . 'Controller.php', "<?php \n" . $content);
    }

    private function generateViews($json)
    {
        if (!$this->filesystem->exists(resource_path() . '/views/admin/' . $json->table))
            $this->filesystem->makeDirectory(resource_path() . '/views/admin/' . $json->table, 0777);

        $content = view('generator.templates.views.create', compact('json'))->render();
        $this->filesystem->put(resource_path() . '/views/admin/' . $json->table . '/create.blade.php', $content);

        $content = view('generator.templates.views.edit', compact('json'))->render();
        $this->filesystem->put(resource_path() . '/views/admin/' . $json->table . '/edit.blade.php', $content);

        $content = view('generator.templates.views.index', compact('json'))->render();
        $this->filesystem->put(resource_path() . '/views/admin/' . $json->table . '/index.blade.php', $content);

        if (!$this->filesystem->exists(resource_path() . '/views/admin/' . $json->table . '/includes'))
            $this->filesystem->makeDirectory(resource_path() . '/views/admin/' . $json->table . '/includes', 0777);

        $content = view('generator.templates.views.includes.fields', compact('json'))->render();
        $this->filesystem->put(resource_path() . '/views/admin/' . $json->table . '/includes/' . 'fields.blade.php', $content);

        $content = view('generator.templates.views.includes.scripts', compact('json'))->render();
        $this->filesystem->put(resource_path() . '/views/admin/' . $json->table . '/includes/' . 'scripts.blade.php', $content);
    }
}
