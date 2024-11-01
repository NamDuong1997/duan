<form method="POST" action="<?php echo e(route('do-upload')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <input type="file" multiple name="hinh_anh" />
    <button type="submit">Upload</button>
</form><?php /**PATH D:\TTUAN\PHP NC\demo03\resources\views/upload.blade.php ENDPATH**/ ?>