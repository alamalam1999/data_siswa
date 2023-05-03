<?php

Breadcrumbs::for('admin.registration-schedules.index', function ($trail) {
    $trail->push(__('labels.backend.access.registration-schedules.management'), route('admin.registration-schedules.index'));
});

Breadcrumbs::for('admin.registration-schedules.create', function ($trail) {
    $trail->parent('admin.registration-schedules.index');
    $trail->push(__('labels.backend.access.registration-schedules.management'), route('admin.registration-schedules.create'));
});

Breadcrumbs::for('admin.registration-schedules.edit', function ($trail, $id) {
    $trail->parent('admin.registration-schedules.index');
    $trail->push(__('labels.backend.access.registration-schedules.management'), route('admin.registration-schedules.edit', $id));
});
