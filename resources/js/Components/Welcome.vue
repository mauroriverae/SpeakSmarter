<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <h1>Hello world</h1>
            {{ $page.props.user.permissions }}
        </div>
    </div>
</template>
