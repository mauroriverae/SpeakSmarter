<script>
export default {
    name: 'CategoriesForm'
}
</script>

<script setup>
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    form: {
        type: Object,
        required: true
    },
    // set updating true when you want to update a category
    updating: {
        type: Boolean,
        required: false,
        default: false,
    }
})

defineEmits(['submit'])
</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>{{ updating ? 'Edit - Category' : 'New - Category' }}</template>
        <template #description>{{ updating ? 'Updated the selected category' : 'Create a new category from Scratch' }}</template>
        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="name" value="name"/>
                <TextInput id="name" v-model="form.name" type="text" autocomplete="name" class="mt-1 block w-full"/>
                <InputError :message="$page.props.errors.name" />
            </div>
        </template>

        <template #actions>
            <PrimaryButton>
                {{ updating ? 'Update' : 'Create' }}
            </PrimaryButton>
        </template>
    </FormSection>    
</template>