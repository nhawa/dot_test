<?php

namespace App\Console\Commands;

use App\Http\Controllers\RajaOngkirController;
use Illuminate\Console\Command;



/**
 * Class deletePostsCommand
 *
 * @category Console_Command
 * @package  App\Console\Commands
 */
class getDataRO extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = "get_data_ro";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "get all data province and city from raja ongkir";


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $res = (new RajaOngkirController())->saveToDB();
        $this->info($res['message']);
        return;
    }
}