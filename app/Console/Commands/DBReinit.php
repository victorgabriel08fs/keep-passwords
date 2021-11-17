<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DBReinit extends Command
{
    protected $signature = 'db:reinit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retart the previous ready database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo 'Reiniciando DB';
        $this->call('migrate:fresh');
        $this->call('db:seed');
        echo ' ------ DB Reiniciado!!! ------ ';
    }
}
