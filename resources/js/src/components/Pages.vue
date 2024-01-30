<template>
    <h1>
        Lobo test :) {{test}}
    </h1>
</template>

<script lang="ts">
import {defineComponent} from "vue";

export default defineComponent({
    data(){
        return {
            test: 'hi'
        }
    }
})
</script>
