<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RelastateSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::select("
        INSERT INTO `test`.`realstates` (`name`, `realstate_number`, `floors_number`, `unit_number`, `instrument_number`, `instrument_date`, `spectator_id`, `spectator_number`, `spectator_date`, `agent_id`, `agent_number`, `agent_date`, `address`, `national_address`, `map_address`, `electricity_account_number`, `electricity_service_number`, `water_account_number`, `note`, `unit_id`, `owner_id`, `subarea_id`, `province_id`, `created_at`, `updated_at`) VALUES ('hello jks a', '132123', '123', '123', '123', '2023-05-20', '1', '123', '2023-05-12', '1', '123', '2023-05-20', '123', '123123', '123', '150', '150', '1220', '<div>\r\n<div>ClientControllerAbstract</div>\r\n</div>', '1', '1', '1', '4', '2023-05-24 16:11:17', '2023-05-24 16:11:17');
        ");
    }
}
