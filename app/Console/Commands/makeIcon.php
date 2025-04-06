<?php

namespace App\Console\Commands;

use App\Models\Package;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class makeIcon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'replaceIcon';

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
      $packages=DB::table('country_package')->select('include_exclude','trip_excludes','id')->get();
      foreach ($packages as $key => $package) {
        $package=DB::table('country_package')->where('id',$package->id)->first();

        $include_exclude = preg_replace('/â/', "✅", $package->include_exclude);
        $exclude = preg_replace('/â/', "❌", $package->trip_excludes);

        $package->include_exclude=$include_exclude;
        $package->trip_excludes=$exclude;

        $package->save();


      }
    }
}
