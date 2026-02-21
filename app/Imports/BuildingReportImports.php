<?php

namespace App\Imports;
use App\Models\Post;
use App\Models\BuildingFloorsLcr;
use App\Models\ReportBuilding;
use App\Models\BuildingFloors;
use App\Models\BuildingTasks;
use App\Models\BuildingTasksProgress;
use App\Models\JobOrder;

use Spatie\ResponseCache\Facades\ResponseCache;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
class BuildingReportImports implements WithCalculatedFormulas, ToCollection, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function __construct(int $building_id , $report_type)
	{
		$this->building_id = $building_id;
        $this->report_type = $report_type;
    }

    public function collection(Collection $rows)
    {
      
        //BuildingFloors::where('building_id',$this->building_id)->where('report_type',$this->report_type)->delete();
        //BuildingTasks::where('building_id',$this->building_id)->where('report_type',$this->report_type)->delete();
        //BuildingFloorsLcr::where('building_id',$this->building_id)->where('report_type',$this->report_type)->delete();
        BuildingTasksProgress::where('building_id',$this->building_id)->where('report_type',$this->report_type)->delete();
        
        foreach( $rows as $k=>$row ) {

            //get all tasks in this floors in this building in first row in excel
            if( $k == 0 ){
                foreach( $row as $k=>$task ) {
                    if( $k > 1 ){
                        $task = str_replace(' Planned','' , str_replace(' Actual','' , $task ));
                        BuildingTasks::updateOrCreate(['building_id'=>$this->building_id,'report_type'=>$this->report_type,'title_en'=>$task] , ['title_en'=>$task , 'title_ar'=>$task , 'building_id'=>$this->building_id, 'report_type'=>$this->report_type]);
                    }
                }
               
            }else{
            //get all floors in this building
            $floor_title = $rows[$k][0] ?? null;
            $lcr_title = $rows[$k][1] ?? null;
            if( isset($floor_title) ){
                $floor = BuildingFloors::updateOrCreate(['report_type'=>$this->report_type,'building_id'=>$this->building_id,'title_en'=>$floor_title] , ['title_en'=>$floor_title , 'title_ar'=>$floor_title,'report_type'=>$this->report_type]);
            }

            //get all lcr in each floor in this building
            if( isset($lcr_title) && isset($floor) ){
                $lcr = BuildingFloorsLcr::updateOrCreate(['report_type'=>$this->report_type,'building_id'=>$this->building_id , 'floor_id'=>$floor->id ,'title_en'=>$lcr_title] , ['title_en'=>$lcr_title , 'title_ar'=>$lcr_title , 'building_id'=>$this->building_id , 'floor_id'=>$floor->id ,'report_type'=>$this->report_type]);



                //get value for tasks under every LCR

                for ($x = 2; $x <= count($row); $x++) {
                    $planned = $rows[$k][$x] ?? null;
                    $actual = $rows[$k][$x + 1] ?? null;
                    $task_title = $rows[0][$x] ?? null;
                    //task id
                    $task_title = str_replace(' Planned','' , str_replace(' Actual','' , $task_title ));
                    $lcr_task = BuildingTasks::where('building_id',$this->building_id )->where('title_en',$task_title)->where('report_type',$this->report_type)->first();

                    if($x == 4){
                        //dd($lcr_task);
                    }

                    if( isset($lcr_task) ) {

                    $data['planned'] = $planned;
                    $data['actual'] = $actual;
                    $data['building_id'] =$this->building_id ;
                    $data['report_type'] =$this->report_type ;
                    $data['floor_id'] =$floor->id;
                    $data['lcr_id'] =$lcr->id;
                    $data['task_id'] =$lcr_task->id;

                    BuildingTasksProgress::create($data);
                    $lcr_task = null;
                    $x++;


                   
                    
                    //check job order
                    if(  $planned == $actual && $planned > 0 && $actual > 0 ){
                        
                        $job = JobOrder::where('building_id',$this->building_id)
                        ->where('floor_id',$data['floor_id'])
                        ->where('lcr_id',$data['lcr_id'])
                        ->where('task_id',$data['task_id'])->first();
                        if( isset($job) ){
                        $job->stage_id = 3;
                        $job->save();
                        }
                        

                    }



                    }

                } 

                  
               

            }

            



            }

            





           
        }

        ResponseCache::clear();

    }

    public function startRow(): int
    {
        return 1;
    }


}
