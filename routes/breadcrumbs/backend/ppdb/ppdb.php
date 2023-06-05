<?php

Breadcrumbs::for('admin.ppdb.index', function ($trail) {
    $trail->push(__('labels.backend.access.ppdb.management'), route('admin.ppdb.index'));
});

Breadcrumbs::for('admin.ppdb.create', function ($trail) {
    $trail->parent('admin.ppdb.index');
    $trail->push(__('labels.backend.access.ppdb.management'), route('admin.ppdb.create'));
});

Breadcrumbs::for('admin.ppdb.edit', function ($trail, $id) {
    $trail->parent('admin.ppdb.index');
    $trail->push(__('labels.backend.access.ppdb.management'), route('admin.ppdb.edit', $id));
});

Breadcrumbs::for('admin.ppdb.cekhistory', function ($trail, $id) {
    
    $trail->parent('admin.ppdb.index');
    $trail->push(__('labels.backend.access.ppdb.management'), route('admin.ppdb.cekhistory', $id));
});


Breadcrumbs::for('admin.ppdb.data_siswa', function ($trail) {
    $trail->push('Data Siswa Aktif | ', route('admin.ppdb.data_siswa'));
});


Breadcrumbs::for('admin.ppdb.siswa_tidak_aktif', function ($trail) {
    $trail->push('Data Siswa Tidak Aktif | ', route('admin.ppdb.siswa_tidak_aktif'));
});

Breadcrumbs::for('admin.ppdb.siswa_alumni' , function ($trail) {
    $trail->push('Data Siswa Alumni | ', route('admin.ppdb.siswa_alumni'));
});