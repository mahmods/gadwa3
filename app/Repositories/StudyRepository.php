<?php
/**
 * Created by PhpStorm.
 * User: mustafa
 * Date: 21/08/17
 * Time: 04:51 م
 */

namespace App\Repositories;

use App\Status;
use Request;
use App\Study;
use Auth;
use DB;
use Session;

/**
 * Class StudyRepository
 * @package App\Repositories
 */
class StudyRepository extends BaseRepository
{
    /**
     * @var Study
     */
    protected $study;

    /**
     * StudyRepository constructor.
     */
    public function __construct()
    {
        $this->study = new Study();
    }

    /**
     * @return array of all Studies
     */
    public function getAllStudies()
    {
        if (Request::route()->getName() == "apiGetAllStudies") {
            $studies = $this->getAllItems($this->study);
            if (count($studies) != 0) {
                return response()->json(['status_code' => 200, 'studies' => $studies]);
            } else {
                return response()->json([
                    'error' => [
                        'message' => 'Not Found',
                        'status_code' => 404
                    ]
                ]);
            }
        }
        return $this->getAllItems($this->study);
    }

    /**
     * @param $data
     * @param $study
     * @return \Illuminate\Http\JsonResponse
     */
    public function postAddStudy($data, $study = NULL)
    {
        if (Request::route()->getName() == "apiPostAddStudy") {
            $request = \Illuminate\Http\Request::capture();
            $obj = Study::firstOrNew([
                'id' => $request->input('studyId'),
            ]);
            $obj->fill($request->except("id"));
            $obj->fill(['working_capital_months' => $request->working_capital_months]);
            $obj->save();
            return response()->json(['status_code' => 200]);
        }
        $this->addItem($data, $study);
    }

    public function postAddStudyStatus()
    {
        if (Request::route()->getName() == "apiPostAddStudyStatus") {
            $request = \Illuminate\Http\Request::capture();
            $req=$request->get('study_status');
                if (Status::find($req['id'])) {
                    $obj = Status::firstOrNew([
                        'id' => $req['id']
                    ]);
                } else {
                    $obj = new Status();
                }
                    $obj->fill([
                        'step_one' => $req['step_one'],
                        'step_two' => $req['step_two'],
                        'step_three' => $req['step_three'],
                        'step_four' => $req['step_four'],
                        'step_five' => $req['step_five'],
                        'step_six' => $req['step_six'],
                        'is_completedthis.studyId' => $req['is_completed'],
                        'study_id' => $request->get('sid')
                    ]);
                    $obj->save();

            }
            return response()->json(['status_code' => 200]);
        }

    public function getStatusByStudyId($study_id)
    {
        if (Request::route()->getName() == "apiGetStatusByStudyId") {
            $status = Status::where('study_id',$study_id)->first();
            if (count($status) != 0) {
                return response()->json(['status_code' => 200, 'study_status' => $status]);
            } else {
                return response()->json([
                    'error' => [
                        'message' => 'Not Found',
                        'status_code' => 404
                    ]
                ]);
            }
        }
        //
    }

    /**
     * @param $studyId
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function getStudyById($studyId)
    {
        if (Request::route()->getName() == "apiGetStudyById") {
            $study = $this->getItemById($studyId, $this->study);
            if (count($study) != 0) {
                return response()->json(['status_code' => 200, 'study' => $study]);
            } else {
                return response()->json([
                    'error' => [
                        'message' => 'Not Found',
                        'status_code' => 404
                    ]
                ]);
            }
        }
        return $this->getItemById($studyId, $this->study);
    }

    public function getStudyByUserId($userId = 0)
    {
        if (Request::route()->getName() == "apiGetStudyByUserId") {
            $study = Study::where('user_id', $userId)->first();
            if ($study) {
                return response()->json(['status_code' => 200, 'study' => $study]);
            } else {
                $study = new Study();
                $study->fill(['user_id' => $userId])->save();
                DB::table('study_status')->insert(['study_id' => $study->id]);
                DB::table('studies_assets')->insert(['study_id' => $study->id]);
                DB::table('studies_competitors')->insert(['study_id' => $study->id]);
                DB::table('studies_expenses')->insert(['study_id' => $study->id]);
                DB::table('studies_finance_investments')->insert(['study_id' => $study->id]);
                DB::table('studies_four_analyze')->insert(['study_id' => $study->id]);
                DB::table('studies_increases_rate')->insert(['study_id' => $study->id]);
                DB::table('studies_marketing')->insert(['study_id' => $study->id]);
                DB::table('studies_products')->insert(['study_id' => $study->id]);
                DB::table('studies_raw_materials')->insert(['study_id' => $study->id]);
                DB::table('studies_sectors')->insert(['study_id' => $study->id]);

                return response()->json(['status_code' => 200, 'study' => $study]);
            }
        }

    }

    /**
     * @param $studyId
     * @param $data
     * @param $study
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function updateStudy($studyId, $data, $study)
    {
        if (Request::route()->getName() == "apiUpdateStudyById") {
            $this->updateItemById($studyId, (array)$data, $study);
            return response()->json(['status_code' => 200]);
        }
        return $this->updateItemById($studyId, (array)$data, $study);
    }

    /**
     * @param $studyId
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteStudyById($studyId)
    {
        $this->deleteItemById($studyId, $this->study);
        return response()->json(['status_code' => 200]);
    }

    static public function getAllStudiesView()
    {
        return Study::all();
    }

    public function getStudiesByUserId($userId)
    {
        return Study::orderBy('id', 'desc')->where('user_id', $userId)->paginate(8);
    }
}