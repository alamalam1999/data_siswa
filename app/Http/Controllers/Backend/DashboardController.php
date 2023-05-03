<?php

namespace App\Http\Controllers\Backend;

use App\Models\PPDB;
use App\Models\Auth\Role;
use Illuminate\Http\Request;
use App\Models\Auth\Permission;
use App\Http\Controllers\Controller;

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
        if (! access()->allow('view-backend') ) {
            return redirect(route('frontend.user.dashboard'))->withFlashDanger('You are not authorized to view admin dashboard.');
        }


        $ppdb = PPDB::all();

        $confirmation = $ppdb->where('document_status','0');

        $confirmation_waiting = $ppdb->where('document_status','1');

        $data_not_done = $ppdb->where('document_status','3');

        $years_now = date("Y");
        $month_now = date("m");

        $date_month_dh = '';
        if ($month_now == 12) { $date_month_dh = 'Desember';
        } else if ($month_now == 11) { $date_month_dh = 'November';
        } else if ($month_now == 10) { $date_month_dh = 'Oktober';
        } else if ($month_now == 9) { $date_month_dh = 'September';
        } else if ($month_now == 8) { $date_month_dh = 'Agustus';
        } else if ($month_now == 7) { $date_month_dh = 'Juli';
        } else if ($month_now == 6) { $date_month_dh = 'Juni';
        } else if ($month_now == 5) { $date_month_dh = 'Mei';
        } else if ($month_now == 4) { $date_month_dh = 'April';
        } else if ($month_now == 3) { $date_month_dh = 'Maret';
        } else if ($month_now == 2) { $date_month_dh = 'Februari';
        } else if ($month_now == 1) { $date_month_dh = 'Januari';
        }

        // for month Jagakarsa

        $query_conf = PPDB::query();
        $conf_month_ppdb_jgk = $query_conf->where('document_status','1')->whereMonth('created_at',$month_now)->where('school_site','JGK');

        $query_before_conf = PPDB::query();
        $conf_bef_month_ppdb_jgk = $query_before_conf->where('document_status','0')->whereMonth('created_at',$month_now)->where('school_site','JGK');

        $query_student = PPDB::query();
        $student_month_ppdb_jgk = $query_student->where('document_status','7')->whereMonth('created_at',$month_now)->where('school_site','JGK');

        // for month Cinere

        $query_conf2 = PPDB::query();
        $conf_month_ppdb_cnr = $query_conf2->where('document_status','1')->whereMonth('created_at',$month_now)->where('school_site','CNR');

        $query_before_conf2 = PPDB::query();
        $conf_bef_month_ppdb_cnr = $query_before_conf2->where('document_status','0')->whereMonth('created_at',$month_now)->where('school_site','CNR');

        $query_student2 = PPDB::query();
        $student_month_ppdb_cnr = $query_student2->where('document_status','7')->whereMonth('created_at',$month_now)->where('school_site','CNR');

        // for month Pamulang

        $query_conf3 = PPDB::query();
        $conf_month_ppdb_pml = $query_conf3->where('document_status','1')->whereMonth('created_at',$month_now)->where('school_site','PML');

        $query_before_conf3 = PPDB::query();
        $conf_bef_month_ppdb_pml = $query_before_conf3->where('document_status','0')->whereMonth('created_at',$month_now)->where('school_site','PML');

        $query_student3 = PPDB::query();
        $student_month_ppdb_pml = $query_student3->where('document_status','7')->whereMonth('created_at',$month_now)->where('school_site','PML');


         // for Year Jagakarsa

         $query_conf4 = PPDB::query();
         $conf_year_ppdb_jgk = $query_conf4->where('document_status','1')->whereYear('created_at',$years_now)->where('school_site','JGK');
 
         $query_before_conf4 = PPDB::query();
         $conf_bef_year_ppdb_jgk = $query_before_conf4->where('document_status','0')->whereYear('created_at',$years_now)->where('school_site','JGK');
 
         $query_student4 = PPDB::query();
         $student_year_ppdb_jgk = $query_student4->where('document_status','7')->whereYear('created_at',$years_now)->where('school_site','JGK');
 
         // for Year Cinere
 
         $query_conf5 = PPDB::query();
         $conf_year_ppdb_cnr = $query_conf5->where('document_status','1')->whereYear('created_at',$years_now)->where('school_site','CNR');
 
         $query_before_conf5 = PPDB::query();
         $conf_bef_year_ppdb_cnr = $query_before_conf5->where('document_status','0')->whereYear('created_at',$years_now)->where('school_site','CNR');
 
         $query_student5 = PPDB::query();
         $student_year_ppdb_cnr = $query_student5->where('document_status','7')->whereYear('created_at',$years_now)->where('school_site','CNR');
 
         // for Year Pamulang
 
         $query_conf6 = PPDB::query();
         $conf_year_ppdb_pml = $query_conf6->where('document_status','1')->whereYear('created_at',$years_now)->where('school_site','PML');
 
         $query_before_conf6 = PPDB::query();
         $conf_bef_year_ppdb_pml = $query_before_conf6->where('document_status','0')->whereYear('created_at',$years_now)->where('school_site','PML');
 
         $query_student6 = PPDB::query();
         $student_year_ppdb_pml = $query_student6->where('document_status','7')->whereYear('created_at',$years_now)->where('school_site','PML');

        //month and year

        $query = PPDB::query();
        $year_ppdb_cnr = $query->whereYear('created_at',$years_now)->where('school_site','CNR');

        $query2 = PPDB::query();
        $year_ppdb_pml = $query2->whereYear('created_at',$years_now)->where('school_site','PML');

        $query3 = PPDB::query();
        $year_ppdb_jgk = $query3->whereYear('created_at',$years_now)->where('school_site','JGK');


        $query_month_1 = PPDB::query();
        $month_ppdb_cnr = $query_month_1->whereMonth('created_at',$month_now)->where('school_site','CNR');

        $query_month_2 = PPDB::query();
        $month_ppdb_pml = $query_month_2->whereMonth('created_at',$month_now)->where('school_site','PML');

        $query_month_3 = PPDB::query();
        $month_ppdb_jgk = $query_month_3->whereMonth('created_at',$month_now)->where('school_site','JGK');


        $data = [
            'ppdb' => $ppdb,
            'confirmation' => $confirmation,
            'confirmation_waiting' => $confirmation_waiting,
            'data_not_done'     =>  $data_not_done,
            'year_ppdb_cnr'     => $year_ppdb_cnr,
            'year_ppdb_pml'     => $year_ppdb_pml,
            'year_ppdb_jgk'     => $year_ppdb_jgk,
            'month_ppdb_cnr'    => $month_ppdb_cnr,
            'month_ppdb_pml'    => $month_ppdb_pml,
            'month_ppdb_jgk'    => $month_ppdb_jgk,
            'years_now'         => $years_now,
            'month_now'         => $month_now,
            'date_month_dh'     => $date_month_dh,
            'conf_month_ppdb_jgk'     => $conf_month_ppdb_jgk,
            'conf_bef_month_ppdb_jgk' => $conf_bef_month_ppdb_jgk,
            'student_month_ppdb_jgk'  => $student_month_ppdb_jgk,
            'conf_month_ppdb_cnr'     => $conf_month_ppdb_cnr,
            'conf_bef_month_ppdb_cnr' => $conf_bef_month_ppdb_cnr,
            'student_month_ppdb_cnr'  => $student_month_ppdb_cnr,
            'conf_month_ppdb_pml'     => $conf_month_ppdb_pml,
            'conf_bef_month_ppdb_pml' => $conf_bef_month_ppdb_pml,
            'student_month_ppdb_pml'  => $student_month_ppdb_pml,
            
            'conf_year_ppdb_jgk'     => $conf_year_ppdb_jgk,
            'conf_bef_year_ppdb_jgk' => $conf_bef_year_ppdb_jgk,
            'student_year_ppdb_jgk'  => $student_year_ppdb_jgk,
            'conf_year_ppdb_cnr'     => $conf_year_ppdb_cnr,
            'conf_bef_year_ppdb_cnr' => $conf_bef_year_ppdb_cnr,
            'student_year_ppdb_cnr'  => $student_year_ppdb_cnr,
            'conf_year_ppdb_pml'     => $conf_year_ppdb_pml,
            'conf_bef_year_ppdb_pml' => $conf_bef_year_ppdb_pml,
            'student_year_ppdb_pml'  => $student_year_ppdb_pml
        ];

        return view('backend.dashboard',$data);
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
