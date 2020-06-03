<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Carbon\Carbon;
use Storage;
use Mail;

class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup database in storage directory';

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
		$filename = Carbon::now()->format('Y-m-d_H-i-s') . ".sql";

		$command = "mysqldump --user=" . env('DB_USERNAMEs') ." --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  > " . storage_path() . "/" . $filename;
		
		$returnVar = NULL;
		$output  = NULL;
		//exec command allows you to run terminal commands from php 
		exec($command, $output, $returnVar);

		
		if(!$returnVar){
			$getFile = storage_path() . "/" . $filename;
			Storage::disk('database')->put("backups/" .  $filename, file_get_contents($getFile));
			unlink(storage_path() . "/" . $filename); 
		}else{
			Mail::raw('There has been an error backing up the database.', function ($message) {
				$message->to("ashik24x7@gmail.com", "Ashik")->subject("Backup Error");
			});
		}
	   
	   
	   
	   
	   
    }
}
