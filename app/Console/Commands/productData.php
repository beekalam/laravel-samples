<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Product;

class productData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add products data to the database.';

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
       $csvFile = public_path('products.csv');
       if(!file_exists($csvFile)  || !is_readable($csvFile))
            return false;
        
        $header = null;
        $data = array();

        if(($handle = fopen($csvFile,'r')) !== false){
            while(($row = fgetcsv($handle, 1000,',')) !== false){
                if(!$header)
                    $header = $row;
                else 
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        $dataCount = count($data);
        for($i = 0; $i < $dataCount; $i++){
            Product::firstOrCreate($data[$i]);
        }
        echo "Products data added successfully"."\n";
    }
}
