<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\ExampleMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\EmailQueue;

class send_email extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send_email';

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
	$emails = EmailQueue::where(['e_sent' => 0])->limit(15)->get();
	echo "EMAILS ".$emails->count()." ";

	foreach($emails as $email)
	{
		$details = [
			'to'	=>   $email->e_to,
			'subject' => $email->e_subject,
			'body'	=>   $email->e_body,
		];
		try{
		        Mail::to($email->e_to)->send(new ExampleMail($details));
	
	        	print_r($details);
			$email->e_sent = 1;
			$email->e_success = 1;
			$email->e_sent_date = date('Y-m-d H:i:s');
			
		}catch(\Exception $e)
		{
			$email->e_sent = 1;
			echo $e->getMessage();
		}
		$email->e_attempt_date = date('Y-m-d H:i:s');
		$email->update();	
		sleep(10);
	}
    }
}
