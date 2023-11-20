<script>
export default {
  methods: {
    hasPermission(permission) {
      return this.$page.props.user.permissions.includes(permission);
    },
  },
};
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <ApplicationLogo class="block h-12 w-auto" />

            <h1 class="mt-8 text-2xl font-medium text-gray-900">
                Welcome to your Jetstream application!
            </h1>

            <p class="mt-6 text-gray-500 leading-relaxed">
                {{ $page.props }}
            </p>

            <button class="test" v-if="hasPermission('create roles')">Manage Roles</button>
            <button class="test" v-if="hasPermission('create lessons')">Manage Lessons</button>

        </div>
  

    </div>
</template>

<style>
    button.test {
        background-color: rgb(34, 67, 255);
        color: white;
        border: 1px solid black;
        border-radius: 15px;
        padding: 20px;
        margin: 20px;
    }
</style>