<?php $__env->startSection('title', __('labels.backend.access.ppdb.management') . ' | ' . __('labels.backend.access.ppdb.edit')); ?>

<?php $__env->startSection('breadcrumb-links'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row mb-4">
        <h1>TESTING</h1>

        {{ var_dump($ppdb) }}

    </div><!-- row -->
<?php $__env->stopSection(); ?>




<?php $__env->startPush('after-scripts'); ?>

@section('pagescript')


@stop

@endpush


<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ppdb\resources\views/backend/ppdb/edit.blade.php ENDPATH**/ ?>