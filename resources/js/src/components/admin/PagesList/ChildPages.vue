<template>
    <div class="child-container">
        <div class="col-12 inputs-container">
            <div class="d-flex my-3 justify-content-between">
                <span>ID: {{data.id}}</span>
                <a :href="data.slug">Open Page</a>
            </div>
            <div class="d-flex my-3 justify-content-between">
                TITLE: <input type="text" :value="data.title" />
            </div>
            <div class="d-flex my-3 justify-content-between">
                CONTENT: <input type="text" :value="data.content" />
            </div>
            <div class="d-flex my-3 justify-content-between">
                SLUG: <input type="text" :value="data.slug" />
            </div>
            <div class="d-flex my-3 justify-content-end">
                <button>SAVE</button>
            </div>
        </div>
        <div class="col-12 inner">
            <child-pages
                v-for="(eachChild, index) in data.children"
                :data="eachChild" :key="index">
            </child-pages>
        </div>
    </div>
</template>

<script lang="ts">
import {defineComponent, PropType} from "vue";
import './styles.scss';

type propDataType = {
    id: number;
    title: string;
    content: string;
    "parent_id": any,
    "slug": string,
    "created_at": any,
    "updated_at": any,
    children: propDataType[];
}

export default defineComponent({
    name: "ChildPages",
    props: {
        data: {
            type:  Object as PropType<propDataType>
        }
    }
})
</script>
