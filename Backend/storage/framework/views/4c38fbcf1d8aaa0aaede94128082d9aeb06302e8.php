<?php $__env->startSection('title', ' مرحبا ' . $firstName); ?>
<?php $__env->startSection('body'); ?>
    <tbody>
    <tr>
        <td style="font:14px/25px arial; color:#333; padding: 24px 0 35px;">

            <p><?php echo e($subject); ?></p>
            <br />
            <?php echo $content; ?>

            <p>فريق <?php echo e(\App\Models\Variable::getVar('العنوان عربي')); ?> | بزنس برو</p>
        </td>
    </tr>
    </tbody>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('emailLayouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/Server/Projects/Edite/Backend/resources/views/emailUsers/emailReplied.blade.php ENDPATH**/ ?>