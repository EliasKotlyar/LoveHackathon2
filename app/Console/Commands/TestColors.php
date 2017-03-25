<?php

namespace App\Console\Commands;

use App\BusinessLogic\UserProcessor;
use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\Table;

class TestColors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'amour:testcolors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $moodGenerator = new UserProcessor();
        $user = $moodGenerator->getUser('');
        foreach($user->retrieveMoods() as $mood){
            $colorValue = $mood->getColorValue();
            $url = sprintf("http://192.168.168.24/mood?color=%s", $colorValue);
            echo $mood->getName()."\r\n";
            $request = \Requests::get($url);
            sleep(10);
            echo $colorValue."\r\n";

        }


    }


}
