<script setup>
import { ref } from 'vue';
defineProps({
    collection: {
        type: Array,
        required: true,
    },
})
const handleAddToSelection = () => {
    selection.value.push(currentSelection);    
}

const currentSelection = ref(1);
const selection = ref([]);
</script>

<template>
    <select v-model="currentSelection">
        <option v-for="(item, index) in collection" :key="index">{{ item?.name }}</option>
    </select>
    <button @click="handleAddToSelection">Add</button>
    <div>
        <ul>
            <li v-for="(item, index) in selection" :key="index">
                {{ item }}
            </li>
        </ul>
    </div>
</template>