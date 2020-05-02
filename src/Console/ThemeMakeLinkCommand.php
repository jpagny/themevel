<?php

namespace Shipu\Themevel\Console;

use App;
use File;
use Illuminate\Console\Command;

class ThemeMakeLinkCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'theme:link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make link theme in public folder.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!File::exists(config('theme.symlink_path')) && config('theme.symlink') && File::exists(config('theme.theme_path'))) {
            App::make('files')->link(config('theme.theme_path'), config('theme.symlink_path', public_path('Themes')));
            echo 'This link '.config('theme.theme_path').' is created in '.config('theme.symlink_path').".\n";
        } else {
            echo 'This link '.config('theme.theme_path').' is already linked in '.config('theme.symlink_path').".\n";
        }
    }

}