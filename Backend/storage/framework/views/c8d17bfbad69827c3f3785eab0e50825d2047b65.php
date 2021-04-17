<style>
    body {
        margin: 0;
        padding: 0;
    }

</style>
<?php echo isset($emailStyle) ? $emailStyle : ''; ?>

<div style="max-width: 600px; margin: auto" dir="rtl">
    <table width="100%" style="border-top: 5px solid #456FB1">
        <?php echo $__env->make('emailPartials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <tbody>
        <?php echo $__env->yieldContent('body'); ?>
        </tbody>
        <?php echo $__env->make('emailPartials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </table>
</div>
<?php /**PATH /var/www/Server/Projects/Edite/Backend/resources/views/emailLayouts/default.blade.php ENDPATH**/ ?>