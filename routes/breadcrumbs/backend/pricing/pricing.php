<?php

Breadcrumbs::for('admin.import.index', function ($trail) {
    $trail->push('Pricing Management', route('admin.import.index'));
});

Breadcrumbs::for('admin.master.class', function ($trail) {
    $trail->push('Master Kelas', route('admin.master.class'));
});

Breadcrumbs::for('admin.masterupdate.class', function ($trail) {
    $trail->push('Master Kelas', route('admin.master.class'));
});

Breadcrumbs::for('admin.masterstore.class', function ($trail) {
    $trail->push('Master Kelas Tambah', route('admin.masterstore.class'));
});

Breadcrumbs::for('admin.import.upload', function ($trail) {
    $trail->push('Pricing Management', route('admin.import.index'));
    $trail->push('Pricing Management', route('admin.import.indexwave2'));
});

Breadcrumbs::for('admin.import.indexwave2', function ($trail) {
    $trail->push('Pricing Management', route('admin.import.indexwave2'));
});

Breadcrumbs::for('admin.import.check_excel', function ($trail) {
    $trail->push('Data Check', route('admin.import.check_excel'));
});

Breadcrumbs::for('admin.import.check_excel2', function ($trail) {
    $trail->push('Data Check', route('admin.import.check_excel2'));
});


Breadcrumbs::for('admin.import.export_excel', function ($trail) {
    $trail->push('Data export_excel', route('admin.import.export_excel'));
});

Breadcrumbs::for('admin.import.check_payment', function ($trail) {
    $trail->push('Data check_payment', route('admin.import.check_payment'));
});