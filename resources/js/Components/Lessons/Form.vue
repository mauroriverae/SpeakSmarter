<script>
export default {
    name: 'LessonForm'
}
</script>

<script setup>
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import CollectionSelector from '../Common/CollectionSelector.vue';

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
    },
    categories: {
        type: Object,
        required: true,
    },
    levels: {
        type: Object,
        required: true,
    }
})

defineEmits(['submit'])
</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>{{ updating ? 'Edit - Lesson' : 'New - Lesson' }}</template>
        <template #description>{{ updating ? 'Updated the selected lesson' : 'Create a new lesson from Scratch' }}</template>
        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="name" value="name"/>
                <TextInput id="name" v-model="form.name" type="text" autocomplete="name" class="mt-1 block w-full"/>
                <InputError :message="$page.props.errors.name" />

                <InputLabel for="description" value="description"/>
                <TextInput id="description" v-model="form.description" type="text" autocomplete="description" class="mt-1 block w-full"/>
                <InputError :message="$page.props.errors.description"/>

                <InputLabel for="content_uri" value="content_uri"/>
                <TextInput id="content_uri" v-model="form.content_uri" type="text" autocomplete="content_uri" class="mt-1 block w-full"/>
                <InputError :message="$page.props.errors.content_uri"/>

                <InputLabel value="PDF"/>
                <SecondaryButton class="mt-2 mr-2" type="button">Upload PDF</SecondaryButton>
                <InputError :message="$page.props.errors.pdf_uri"/>

                <InputLabel for="level_id" value="level"/>
                <select name="level_id" id="level_id">
                    <option v-for="level in levels" :value="level.id">{{ level.name }}</option>
                </select>
                <InputError :message="$page.props.errors.level_id"/>

                <CollectionSelector :collection="categories"></CollectionSelector>
            </div>
        </template>

        <template #actions>
            <PrimaryButton>
                {{ updating ? 'Update' : 'Create' }}
            </PrimaryButton>
        </template>
    </FormSection>    
</template>