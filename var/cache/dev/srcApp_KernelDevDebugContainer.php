<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerErGzNB1\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerErGzNB1/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerErGzNB1.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerErGzNB1\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerErGzNB1\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'ErGzNB1',
    'container.build_id' => '115bdff9',
    'container.build_time' => 1680250032,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerErGzNB1');
