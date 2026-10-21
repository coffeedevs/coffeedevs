<?php

namespace App\Console\Commands;

use Spatie\ImageOptimizer\OptimizerChain;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class OptimizeImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coffee:images';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize images';
    protected $optimizer;
    protected $filesystem;

    /**
     * Create a new command instance.
     *
     * @param OptimizerChain $optimizer
     */
    public function __construct(OptimizerChain $optimizer, Filesystem $filesystem)
    {
        parent::__construct();
        $this->optimizer = $optimizer;
        $this->filesystem = $filesystem;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach ($this->filesystem->allFiles(public_path('images/projects/resized')) as $image) {
            $this->optimizer->optimize($image);
        }
    }
}
