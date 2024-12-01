<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearLogCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        exec('echo "" > ' . storage_path('logs/laravel.log'));
        $this->info('Logs have been cleared');

    }
}
