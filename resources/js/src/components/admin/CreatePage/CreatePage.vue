<template>
    <div class="create-cms-page-container container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-lg-6 inputs-container">
                <div class="d-flex my-3 justify-content-center mb-5">
                    <h2 v-if="parentRouteId">Creat new sub page for ID : {{parentRouteId}}</h2>
                    <h2 v-else>Create new parent page</h2>
                </div>
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
import {useRoute, useRouter} from 'vue-router';
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
        const route = useRoute();
        const parentRouteId = route.params.parentId;

        return {
            router,
            adminRoutes,
            parentRouteId
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
            let payload = {
                title : this.title,
                content: this.content,
                slug: this.slug
            }

            if(this.parentRouteId){
                payload['parent_id'] = this.parentRouteId
            }

            axios.post(adminApis.updateOrCreatePageData, payload).then(({data}) => {
                    console.log("resp ", data);
                    this.router.push(adminRoutes.cms_pages_list);
                }).catch((err) => console.log("error", err));
        }
    }
})
</script>
