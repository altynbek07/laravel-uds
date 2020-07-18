<?php

namespace Altynbek07\Uds\Commands;

use Illuminate\Console\Command;

class UdsCommand extends Command
{
    public $signature = 'uds';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
