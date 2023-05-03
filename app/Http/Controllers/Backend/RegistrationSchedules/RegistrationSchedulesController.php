<?php

namespace App\Http\Controllers\Backend\RegistrationSchedules;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\JadwalPendaftaran;
use App\Models\RegistrationSchedule;
use App\Models\AcademicYear;

use Carbon\Carbon;

class RegistrationSchedulesController extends Controller
{
	// private $carbon;

	// public function __construct(){
	// 	$this->setCarbon();
	// }

	// public function setCarbon(){
	// 	return $this->carbon = new Carbon();
	// }

	public function convertDate($date)
	{
		return Carbon::createFromFormat("d-m-Y", $date)->toDateString();
	}

	private function convertToDate($dateStr)
	{
		$time = strtotime($dateStr);
		$newformat = date('m/d/Y', $time);

		return $newformat;
	}

	public function index()
	{
		$academic_years = AcademicYear::all();
		$schedules = RegistrationSchedule::paginate(10);
		return view('backend.registration-schedules.index', compact('academic_years', 'schedules'));
	}

	public function create()
	{
		$academic_years = AcademicYear::all();
		return view('backend.registration-schedules.create', compact('academic_years'));
	}

	public function store(Request $request)
	{
		$input = $request->all();
		// \Log::info($input);

		$date_range = explode(" - ", $input['due_date_range']);
		$date_start = $this->convertToDate($date_range[0]);
		$date_end = $this->convertToDate($date_range[1]);


		$date_start = Carbon::createFromFormat('m/d/Y', $date_range[0])->format('Y-m-d');
		$date_end = Carbon::createFromFormat('m/d/Y', $date_range[1])->format('Y-m-d');


		$registration_schedule = RegistrationSchedule
			::whereBetween('date_from', [$date_start, $date_end])
			->orWhereBetween('date_to', [$date_start, $date_end])
			->first();


		if (!empty($registration_schedule)) {
			return
				response()->json(['success' => false, 'message' => 'Jadwal di rentang waktu tersebut sudah ada']);
		}


		if (empty($request->description)) {
			return
				response()->json(['success' => false, 'message' => 'Deskripsi tidak boleh kosong']);
		}

		if (empty($request->due_date_range)) {
			return
				response()->json(['success' => false, 'message' => 'Tanggal Pendaftaran tidak boleh kosong']);
		} else {
			if ($date_end < $date_start) {
				return
					response()->json(['success' => false, 'message' => 'Tanggal akhir tidak boleh melebihi tanggal awal']);
			}
		}


		$schedule = new RegistrationSchedule();
		$schedule->academic_year_id = $request->academic_year_id;
		$schedule->description = $request->description;
		$schedule->date_from = $date_start;
		$schedule->date_to = $date_end;

		if ($schedule->save()) {
			return response()->json(['success' => true, 'message' => 'Jadwal pendaftaran berhasil ditambahkan...']);
		} else {
			return response()->json(['success' => false, 'message' => 'Terjadi Kesalahan Sistem, Jadwal pendaftaran tidak dapat ditambahkan']);
		}
	}

	public function edit($id)
	{
		$academic_years = AcademicYear::all();
		$schedule = RegistrationSchedule::find($id);
		return view('backend.registration-schedules.edit', compact('academic_years', 'schedule'));
	}

	public function update(Request $request)
	{

		$schedule = RegistrationSchedule::find($request->id);

		if (empty($schedule)) {
			return
				response()->json(['success' => false, 'message' => 'Jadwal tidak ditemukan']);
		}


		if (empty($request->description)) {
			return
				response()->json(['success' => false, 'message' => 'Deskripsi tidak boleh kosong']);
		}

		$date_start = "";
		$date_end = "";

		if (empty($request->due_date_range)) {
			return
				response()->json(['success' => false, 'message' => 'Tanggal Pendaftaran tidak boleh kosong']);
		} else {
			$date_range = explode(" - ", $request->due_date_range);
			$date_start = $this->convertToDate($date_range[0]);
			$date_end = $this->convertToDate($date_range[1]);

			$date_start = Carbon::createFromFormat('m/d/Y', $date_range[0])->format('Y-m-d');
			$date_end = Carbon::createFromFormat('m/d/Y', $date_range[1])->format('Y-m-d');

			if ($date_end < $date_start) {
				return
					response()->json(['success' => false, 'message' => 'Tanggal akhir tidak boleh melebihi tanggal awal']);
			}
		}

		$registration_schedule_check = RegistrationSchedule
			::whereBetween('date_from', [$date_start, $date_end])
			->orWhereBetween('date_to', [$date_start, $date_end])
			->first();

		if (!empty($registration_schedule_check) && $registration_schedule_check->id != $schedule->id) {
			return
				response()->json(['success' => false, 'message' => 'Jadwal di rentang waktu tersebut sudah ada']);
		}

		$schedule->description = $request->description;
		$schedule->academic_year_id = $request->academic_year_id;
		$schedule->description = $request->description;
		$schedule->date_from = $date_start;
		$schedule->date_to = $date_end;

		if ($schedule->save()) {
			return response()->json(['success' => true, 'message' => 'Jadwal pendaftaran berhasil diubah']);
		} else {
			return response()->json(['success' => false, 'message' => 'Terjadi Kesalahan Sistem, Jadwal pendaftaran tidak dapat ditambahkan']);
		}
	}

	public function detail($id)
	{
		$jadwal = RegistrationSchedule::find($id);
		return view('pages.admin.jadwal.detail', compact('jadwal'));
	}

	public function delete(Request $request)
	{
		$registration = RegistrationSchedule::find($request->id)->delete();
		return response()->json(['success' => true, 'message' => 'Jadwal pendaftaran berhasil dihapus']);
	}
}
