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


Breadcrumbs::for('admin.ppdb.discount', function ($trail) {
});