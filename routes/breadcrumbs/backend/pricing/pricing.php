<?php

Breadcrumbs::for('admin.pricing.index', function ($trail) {
    $trail->push('Pricing Management', route('admin.pricing.index'));
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

Breadcrumbs::for('admin.pricing.upload', function ($trail) {
    $trail->push('Pricing Management', route('admin.pricing.index'));
    $trail->push('Pricing Management', route('admin.pricing.indexwave2'));
});

Breadcrumbs::for('admin.pricing.indexwave2', function ($trail) {
    $trail->push('Pricing Management', route('admin.pricing.indexwave2'));
});

Breadcrumbs::for('admin.pricing.check_excel', function ($trail) {
    $trail->push('Pricing Check', route('admin.pricing.check_excel'));
});

Breadcrumbs::for('admin.pricing.check_excel2', function ($trail) {
    $trail->push('Pricing Check', route('admin.pricing.check_excel2'));
});


Breadcrumbs::for('admin.pricing.export_excel', function ($trail) {
    $trail->push('Pricing export_excel', route('admin.pricing.export_excel'));
});