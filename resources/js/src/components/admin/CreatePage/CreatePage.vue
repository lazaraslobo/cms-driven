<template>
    <div class="create-cms-page-container container">
        <div class="row mt-5 justify-content-center">
            <div class="col-6 inputs-container">
                <div class="d-flex my-3 justify-content-between">
                    TITLE: <input type="text" v-model="title"/>
                </div>
                <div class="d-flex my-3 justify-content-between">
                    CONTENT: <input type="text" v-model="content"/>
                </div>
                <div class="d-flex my-3 justify-content-between">
                    SLUG: <input type="text" v-model="slug"/>
                </div>
                <div class="d-flex my-3 justify-content-between align-items-center">
                    <button @click="savePageData()">SAVE</button>
                    <router-link :to="adminRoutes.cms_pages_list">Back</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import {defineComponent, PropType} from "vue";
import './styles.scss';
import axios from "axios";
import {adminApis} from "../../../api/api-maps";
import { useRouter } from 'vue-router';
import {adminRoutes} from "../../../routes/paths";

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
    name: "createNewPage",
    setup(){
        const router = useRouter();
        return {
            router,
            adminRoutes
        }
    },
    data(){
        return {
            title: '',
            content: '',
            slug: ''
        }
    },
    methods: {
        savePageData(){
            axios.post(adminApis.updateOrCreatePageData, {title : this.title, content: this.title, slug: this.title})
                .then(({data}) => {
                    console.log("resp ", data);
                    this.router.push(adminRoutes.cms_pages_list);
                }).catch((err) => console.log("error", err));
        }
    }
})
</script>
