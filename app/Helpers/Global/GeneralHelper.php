<?php

if (! function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (! function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (! function_exists('home_route')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function home_route()
    {
        if (auth()->check()) {
            if (access()->allow('view-backend')) {
                return 'admin.dashboard';
            }

            return 'frontend.user.dashboard';
        }

        return 'frontend.auth.login';
    }
}


if (! function_exists('ppdb_status_label')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function ppdb_status_label($document_status)
    {
        switch ($document_status) {
            case 0: return 'PENDAFTAR BARU'; break;
            case 1: return 'VERIFIKASI FORMULIR'; break;
            case 2: return 'TES SELEKSI'; break;
            case 3: return 'PEMBAYARAN UP & SPP'; break;
            case 4: return 'VER. PEMBAYARAN'; break;
            case 5: return 'DAFTAR ULANG'; break;
            case 6: return 'VER. DAFTAR ULANG'; break;
            case 7: return 'PROSES SELESAI'; break;
            case 6: return ''; break;
            
            default: return ''; break;
        }
    }
}


if (! function_exists('ppdb_status_css')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function ppdb_status_css($document_status)
    {
        switch ($document_status) {
            case 0: return 'ppdb-bg-status-new'; break;
            case 1: return 'ppdb-bg-status-approval_formulir'; break;
            case 2: return 'ppdb-bg-status-interview'; break;
            case 3: return 'ppdb-bg-status-payment'; break;
            case 4: return 'ppdb-bg-status-approval_payment'; break;
            case 5: return 'ppdb-bg-status-re_register'; break;
            case 6: return 'ppdb-bg-status-approval_register'; break;
            case 7: return 'ppdb-bg-status-completed'; break;
            case 6: return ''; break;
            
            default: return ''; break;
        }
    }
}