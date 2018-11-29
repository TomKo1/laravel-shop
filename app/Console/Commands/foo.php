<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \DB;

class foo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'foo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lorem opsum';

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
     * @return mixed
     */
    public function handle()
    {
        //
        $this->info('Foo has been fired!');
        if(DB::connection()->getDatabaseName()) {
            // connection is made
            $this->info('Database connection established!'.DB::connection()->getDatabaseName());
        }
    }
}
