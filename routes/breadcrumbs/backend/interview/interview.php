<?php

Breadcrumbs::for('admin.interview.index', function ($trail) {
    $trail->push('Tes Seleksi Siswa', route('admin.interview.index'));
});

Breadcrumbs::for('admin.interview.detail', function ($trail, $id) {
    $trail->parent('admin.interview.index');
    $trail->push('Detail Tes Seleksi Siswa', route('admin.interview.detail', $id));
});


Breadcrumbs::for('admin.interview.rnd', function ($trail) {
    $trail->push('Tes Seleksi Siswa', route('admin.interview.index'));
});


Breadcrumbs::for('admin.interview.submit', function ($trail) {
    $trail->push('Tes Seleksi Siswa', route('admin.interview.index'));
});

Breadcrumbs::for('admin.interview.report', function ($trail) {
    $trail->push('Tes Seleksi Siswa', route('admin.interview.index'));
});
