<template>
    <div class="wrapper-container container-fluid">
        <router-view></router-view>
    </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import './wrapper.scss';
export default defineComponent({
    name: "wrapper"
})
</script>
