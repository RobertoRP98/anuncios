<?php

namespace App\Console\Commands;

use App\Models\Municipio;
use Illuminate\Support\Str;
use Illuminate\Console\Command;

class CorregirSlugsMunicipios extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:corregir-slugs-municipios';

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
        $municipios = Municipio::whereNull('slug')
        ->orWhere('slug', 'null')
        ->get();

    foreach ($municipios as $municipio) {
        $slug = Str::slug($municipio->name);
        $municipio->slug = $slug;
        $municipio->save();

        $this->info("✅ Slug corregido: {$municipio->name} => {$slug}");
    }

    $this->info("🎉 Slugs corregidos con éxito.");
    }
}
