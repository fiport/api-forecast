<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class InitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inicializa configurações iniciais do server';

    /**
     * @return int
     */
    public function handle(): int
    {
        if (app()->environment('local', 'testing')) {
            $this->call('storage:link');
        }

        $this->info('Verifying database connection...');

        try {
            DB::connection()->getPdo();
            $this->info('Database connection is successful.');
        } catch (\Exception $e) {
            $this->error('Failed to connect to the database. Please check your configuration.');
            return 1;
        }

        // Roda migrations
        $this->info('Running migrations...');
        Artisan::call('migrate', ['--force' => true]);
        $this->info(Artisan::output());

        $this->info('Generate project key...');
        Artisan::call('key:generate', ['--force' => true]);
        $this->info(Artisan::output());

        $this->info('System initialization completed successfully!');
        return 0;
    }
}
