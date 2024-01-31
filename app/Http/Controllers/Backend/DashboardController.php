<?php

namespace App\Http\Controllers\Backend;

use App\Models\PPDB;
use App\Models\Auth\Role;
use Illuminate\Http\Request;
use App\Models\Auth\Permission;
use App\Http\Controllers\Controller;
use App\Models\PPDB_system;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (!access()->allow('view-backend')) {
            return redirect(route('frontend.user.dashboard'))->withFlashDanger('You are not authorized to view admin dashboard.');
        }

        $ppdb = PPDB_system::all();

        $confirmation_jgk = $ppdb->where('school_site', 'JGK');

        $confirmation_cnr = $ppdb->where('school_site', 'CNR');

        $confirmation_pml = $ppdb->where('school_site', 'PML');

        $confirmation_waiting = $ppdb->where('document_status', '1');


        $data_not_done = $ppdb->where('document_status', '3');

        $years_now = date("Y");
        $month_now = date("m");

        $date_month_dh = '';
        if ($month_now == 12) {
            $date_month_dh = 'Desember';
        } else if ($month_now == 11) {
            $date_month_dh = 'November';
        } else if ($month_now == 10) {
            $date_month_dh = 'Oktober';
        } else if ($month_now == 9) {
            $date_month_dh = 'September';
        } else if ($month_now == 8) {
            $date_month_dh = 'Agustus';
        } else if ($month_now == 7) {
            $date_month_dh = 'Juli';
        } else if ($month_now == 6) {
            $date_month_dh = 'Juni';
        } else if ($month_now == 5) {
            $date_month_dh = 'Mei';
        } else if ($month_now == 4) {
            $date_month_dh = 'April';
        } else if ($month_now == 3) {
            $date_month_dh = 'Maret';
        } else if ($month_now == 2) {
            $date_month_dh = 'Februari';
        } else if ($month_now == 1) {
            $date_month_dh = 'Januari';
        }

        // for month Jagakarsa

        $query_conf = PPDB_system::query();
        $conf_month_ppdb_jgk = $query_conf->where('document_status', '1')->whereMonth('created_at', $month_now)->where('school_site', 'JGK');

        $query_before_conf = PPDB_system::query();
        $conf_bef_month_ppdb_jgk = $query_before_conf->where('document_status', '0')->whereMonth('created_at', $month_now)->where('school_site', 'JGK');

        $query_student = PPDB_system::query();
        $student_month_ppdb_jgk = $query_student->where('document_status', '7')->whereMonth('created_at', $month_now)->where('school_site', 'JGK');

        // for month Cinere

        $query_conf2 = PPDB_system::query();
        $conf_month_ppdb_cnr = $query_conf2->where('document_status', '1')->whereMonth('created_at', $month_now)->where('school_site', 'CNR');

        $query_before_conf2 = PPDB_system::query();
        $conf_bef_month_ppdb_cnr = $query_before_conf2->where('document_status', '0')->whereMonth('created_at', $month_now)->where('school_site', 'CNR');

        $query_student2 = PPDB_system::query();
        $student_month_ppdb_cnr = $query_student2->where('document_status', '7')->whereMonth('created_at', $month_now)->where('school_site', 'CNR');

        $ppdb_kb  = PPDB_system::where([['school_site', '=', 'PML'], ['stage', '=', 'KB']]);

        $ppdb_tk  = PPDB_system::where([['school_site', '=', 'JGK'], ['stage', '=', 'TK']]);

        $ppdb_sd  = PPDB_system::where('stage', 'SD');

        $ppdb_smp = PPDB_system::where('stage', 'SMP');

        $ppdb_sma = PPDB_system::where('stage', 'SMA');


        // for Year Jagakarsa

        $query_conf4 = PPDB_system::query();
        $conf_year_ppdb_jgk = $query_conf4->where('document_status', '1')->whereYear('created_at', $years_now)->where('school_site', 'JGK');

        $query_before_conf4 = PPDB_system::query();
        $conf_bef_year_ppdb_jgk = $query_before_conf4->where('document_status', '0')->whereYear('created_at', $years_now)->where('school_site', 'JGK');

        $query_student4 = PPDB_system::query();
        $student_year_ppdb_jgk = $query_student4->where('document_status', '7')->whereYear('created_at', $years_now)->where('school_site', 'JGK');

        // for Year Cinere

        $query_conf5 = PPDB_system::query();
        $conf_year_ppdb_cnr = $query_conf5->where('document_status', '1')->whereYear('created_at', $years_now)->where('school_site', 'CNR');

        $query_before_conf5 = PPDB_system::query();
        $conf_bef_year_ppdb_cnr = $query_before_conf5->where('document_status', '0')->whereYear('created_at', $years_now)->where('school_site', 'CNR');

        $query_student5 = PPDB_system::query();
        $student_year_ppdb_cnr = $query_student5->where('document_status', '7')->whereYear('created_at', $years_now)->where('school_site', 'CNR');

        $tk_ppdb_jgk = PPDB_system::where([['school_site', 'JGK'], ['stage', 'TK']]);

        $sd_ppdb_jgk = PPDB_system::where([['school_site', 'JGK'], ['stage', 'SD']]);

        $smp_ppdb_jgk = PPDB_system::where([['school_site', 'JGK'], ['stage', 'SMP']]);

        $sma_ppdb_jgk = PPDB_system::where([['school_site', 'JGK'], ['stage', 'SMA']]);

        $sd_ppdb_cnr = PPDB_system::where([['school_site', 'CNR'], ['stage', 'SD']]);

        $smp_ppdb_cnr = PPDB_system::where([['school_site', 'CNR'], ['stage', 'SMP']]);

        $sma_ppdb_cnr = PPDB_system::where([['school_site', 'CNR'], ['stage', 'SMA']]);

        $kb_ppdb_pml = PPDB_system::where([['school_site', 'PML'], ['stage', 'KB']]);

        $tk_ppdb_al_azhar = PPDB_system::where([['school_site', 'PML'], ['stage', 'TK']]);

        $sd_ppdb_al_azhar = PPDB_system::where([['school_site', 'PML'], ['stage', 'SD']]);


        $query = PPDB_system::query();
        $year_ppdb_cnr = $query->whereYear('created_at', $years_now)->where('school_site', 'CNR');

        $query3 = PPDB_system::query();
        $year_ppdb_jgk = $query3->whereYear('created_at', $years_now)->where('school_site', 'JGK');


        $query_month_1 = PPDB_system::query();
        $month_ppdb_cnr = $query_month_1->whereMonth('created_at', $month_now)->where('school_site', 'CNR');

        $query_month_3 = PPDB_system::query();
        $ppdb_jgk = $query_month_3->whereMonth('created_at', $month_now)->where('school_site', 'JGK');


        $data = [
            'ppdb' => $ppdb,
            'confirmation_cnr' => $confirmation_cnr,
            'confirmation_jgk' => $confirmation_jgk,
            'confirmation_pml' => $confirmation_pml,
            'confirmation_waiting' => $confirmation_waiting,
            'data_not_done'     =>  $data_not_done,
            'year_ppdb_cnr'     => $year_ppdb_cnr,
            'tk_ppdb_jgk'       => $tk_ppdb_jgk,
            'year_ppdb_jgk'     => $year_ppdb_jgk,
            'month_ppdb_cnr'    => $month_ppdb_cnr,
            'ppdb_kb'    => $ppdb_kb,
            'ppdb_jgk'    => $ppdb_jgk,
            'years_now'         => $years_now,
            'month_now'         => $month_now,
            'date_month_dh'     => $date_month_dh,
            'conf_month_ppdb_jgk'     => $conf_month_ppdb_jgk,
            'conf_bef_month_ppdb_jgk' => $conf_bef_month_ppdb_jgk,
            'student_month_ppdb_jgk'  => $student_month_ppdb_jgk,
            'conf_month_ppdb_cnr'     => $conf_month_ppdb_cnr,
            'conf_bef_month_ppdb_cnr' => $conf_bef_month_ppdb_cnr,
            'student_month_ppdb_cnr'  => $student_month_ppdb_cnr,
            'ppdb_tk'     => $ppdb_tk,
            'ppdb_sd' => $ppdb_sd,
            'ppdb_smp'  => $ppdb_smp,
            'ppdb_sma' => $ppdb_sma,

            'conf_year_ppdb_jgk'     => $conf_year_ppdb_jgk,
            'conf_bef_year_ppdb_jgk' => $conf_bef_year_ppdb_jgk,
            'student_year_ppdb_jgk'  => $student_year_ppdb_jgk,
            'conf_year_ppdb_cnr'     => $conf_year_ppdb_cnr,
            'conf_bef_year_ppdb_cnr' => $conf_bef_year_ppdb_cnr,
            'student_year_ppdb_cnr'  => $student_year_ppdb_cnr,
            'sd_ppdb_jgk'     => $sd_ppdb_jgk,
            'smp_ppdb_jgk' => $smp_ppdb_jgk,
            'sma_ppdb_jgk'  => $sma_ppdb_jgk,
            'sd_ppdb_cnr'     => $sd_ppdb_cnr,
            'smp_ppdb_cnr' => $smp_ppdb_cnr,
            'sma_ppdb_cnr'  => $sma_ppdb_cnr,
            'kb_ppdb_pml'  => $kb_ppdb_pml,
            'tk_ppdb_al_azhar' => $tk_ppdb_al_azhar,
            'sd_ppdb_al_azhar' => $sd_ppdb_al_azhar
        ];

        return view('backend.dashboard', $data);
    }

    /**
     * This function is used to get permissions details by role.
     *
     * @param \Illuminate\Http\Request\Request $request
     */
    public function getPermissionByRole(Request $request)
    {
        if ($request->ajax()) {
            $role_id = $request->get('role_id');
            $rsRolePermissions = Role::where('id', $role_id)->first();
            $rolePermissions = $rsRolePermissions->permissions->pluck('display_name', 'id')->all();
            $permissions = Permission::pluck('display_name', 'id')->all();
            ksort($rolePermissions);
            ksort($permissions);
            $results['permissions'] = $permissions;
            $results['rolePermissions'] = $rolePermissions;
            $results['allPermissions'] = $rsRolePermissions->all;
            echo json_encode($results);
            exit;
        }
    }
}
