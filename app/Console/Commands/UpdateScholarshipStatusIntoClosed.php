<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ClaimScholarShip;
use App\Models\Operation;

class UpdateScholarshipStatusIntoClosed extends Command
{
    protected $signature = 'scholarship:update-status-into-closed';
    protected $description = 'Update status of scholarships based on requested close date';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $operation = Operation::query()->where('status', 0)->first();
        
        if($operation) {
            $claimScholarShips = ClaimScholarShip::where('created_at', '<', $operation->date)
                                    ->where('status', 'pending')
                                    ->limit(10)
                                    ->get();
                     
            if($claimScholarShips->count() > 0) {
                foreach ($claimScholarShips as $claimScholarShip) {
                    $claimScholarShip->status = 'closed';
                    $claimScholarShip->save();
                }
    
                $this->info('Scholarship status updated successfully.');
            }else {
                $this->info('Claim not exists!');
            }
            
        }
        else {
            $this->info('Operation not found!');
        }
        
    }
}
