<template>
    <div class="border border-gray-200 dark:border-gray-800 rounded-md p-4 shadow-sm dark:text-gray-300">
        <div class="font-medium text-gray-500">
            <slot name="header" />
        </div>
        <slot />
    </div>
</template>