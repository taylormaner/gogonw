<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SpiderNovelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'novel:spider';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'spider the novel';

    protected $objClient;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->objClient = new \GuzzleHttp\Client();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("start...");
        $res = $this->objClient->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
        echo $res->getStatusCode();
        echo $res->getHeaderLine('content-type');
        echo $res->getBody();
    }
}
