<?php

namespace App\Console\Commands;

use App\Models\Cidade;
use Illuminate\Support\Facades\Http;
use Illuminate\Console\Command;

class LerIBGE extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ler:ibge';

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
     * @return int
     */
    public function handle()
    {
     
       $response = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados/BA/municipios');
       if($response->ok()){
           foreach($response->collect() as $item) {
               $this->info('id'. $item['nome']);
               Cidade::create([
                   'nome'=>$item['nome']
               ]);
           }
       }
      
       $this->info('concluido');
       
    }
}
