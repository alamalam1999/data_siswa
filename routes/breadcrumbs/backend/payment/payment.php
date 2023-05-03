<?php

Breadcrumbs::for('admin.payment.index', function ($trail) {
    $trail->push('Payment Management', route('admin.payment.index'));
});

